<?php
session_start();
$token = openssl_decrypt($_GET['vid'], "AES-128-CTR", $_GET['id'].session_id());
$file_headers = @get_headers($token);
if($file_headers){
    session_regenerate_id(true);
    header("Location: $token");
}else{
    ?>
    <div style="display:table;margin:0 auto;">gotchu homie</div>
    <?php
    
}
