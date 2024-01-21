
<?php
//TODO Make a custom url instead of video.php
//TODO See async function to get the url, like that it always load
//TODO Make it extremely optimised and check if there is 
//TODO remove error : Warning: openssl_encrypt(): Using an empty Initialization Vector (iv) is potentially insecure and not recommended in C:\Users\Shidono\Desktop\projects\creative\encrypt_video_php\index.php on line 23
/**
 * index.php - The Entry File
**/

// Start the session
session_start();
// It is really important to regenerate id on every click...
session_regenerate_id();

// We will tell the next file that we have a token set using session
$_SESSION['setToken'] = true;

// The filename... You can get that from a $_GET variable and store it here

/* Sample data 
  https://gist.github.com/jsturgis/3b19447b304616f18657
  https://gist.github.com/SeunghoonBaek/f35e0fd3db80bf55c2707cae5d0f7184
*/
$token = "https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4";

// We will be encrypting the video name using session id as key ans AES128 as the algorithm
$token_encrypted = openssl_encrypt($token, "AES-128-CTR", session_id());
$token = urlencode($token_encrypted);
// header("Location: video.php?vid=$token");
//$token = openssl_decrypt($token_encrypted, "AES-128-CTR", session_id());
?>
<link href="https://cdn.jsdelivr.net/npm/video.js@5.20.5/dist/video-js.min.css" rel="stylesheet">
<body style="background-image:url('hot.png');background-size:cover">
<div style="display:table;margin:0 auto;margin-top:100px"> 
  <video id="video" width="1200px" class="video-js vjs-big-play-centered" poster="../pages/wallpaper.png" controls data-setup='{}' preload="auto" autoplay>
    <source src="video.php?vid=<?php echo $token; ?>" type="video/mp4" label="HD" res="720"/>
</video>
        <script src='https://cdn.jsdelivr.net/npm/video.js@5.20.5/dist/video.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-resolution-switcher/0.4.2/videojs-resolution-switcher.js"></script>
        <script>
            videojs('video').videoJsResolutionSwitcher();
        </script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-hotkeys@0.2.25/videojs.hotkeys.min.js"></script>
        <script>
    // Fetch the video URL dynamically using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'video.php', true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var videoUrl = xhr.responseText;
        var video = document.getElementById('video');
        var source = document.createElement('source');
        source.src = videoUrl;
        source.type = 'video/mp4';
        video.appendChild(source);
      }
    };
    xhr.send();

    // Other video setup and initialization
    videojs('video').videoJsResolutionSwitcher();
  </script>
</div>

</body>



