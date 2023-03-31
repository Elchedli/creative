<?php
/**
 * video.php - The First Entry Point
**/
session_start();
// Get Token
$token = $_GET['vid'];
// Get Current Session ID
$prev= session_id();
// Test the session variable token is set
$_SESSION['setToken'] = true;
if(isset($_SESSION['setToken']))
{
  // This was a one time token and this is your security
  unset($_SESSION['setToken']);
  // Now we will re-encrypt the token
  $token = openssl_decrypt($token, "AES-128-CTR", session_id());
  // Now Regenerate the session id
  session_regenerate_id();
  // Now re-encrypt the token with a key combination of both new and old ids
  $token = openssl_encrypt($token, "AES-128-CTR", $prev.session_id());
}
else
{
  // If token was not matched, we have changed the id therefore the next script will not be able to decrypt the token
  session_regenerate_id(true);
}
$token = urlencode($token);
header("Location: access.php?id=".$prev."&vid=".$token);
?>