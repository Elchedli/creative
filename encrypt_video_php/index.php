<?php
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
$token = "https://www.w3schools.com/html/mov_bbb.mp4";

// We will be encrypting the video name using session id as key ans AES128 as the algorithm
$token_encrypted = openssl_encrypt($token, "AES-128-CTR", session_id());
$token = urlencode($token_encrypted);
//header("Location: video.php?vid=$token");
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
        //block menu
            $('.dropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.dropdown-menu').slideToggle(200);
        });
        $('.dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').slideUp(200);
        });
        $('.dropdown .dropdown-menu li').click(function () {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        });
        //block menu
        videojs('video').ready(function() {
            this.hotkeys({
            volumeStep: 0.1,
            seekStep: 5,
            enableMute: true,
            enableFullscreen: true,
            enableNumbers: false,
            enableVolumeScroll: true,
            enableHoverScroll: true,

            seekStep: function(e) {
                if (e.ctrlKey && e.altKey) {
                return 5*60;
                } else if (e.ctrlKey) {
                return 60;
                } else if (e.altKey) {
                return 10;
                } else {
                return 5;
                }
            },

            fullscreenKey: function(e) {
                return ((e.which === 70) || (e.ctrlKey && e.which === 13));
            },

            // Custom Keys
            customKeys: {

                // Add new simple hotkey
                simpleKey: {
                key: function(e) {
                    return (e.which === 83);
                },
                handler: function(player, options, e) {
                    // Example
                    if (player.paused()) {
                    player.play();
                    } else {
                    player.pause();
                    }
                }
                },
                complexKey: {
                key: function(e) {
                    // Toggle something with CTRL + D Key
                    return (e.ctrlKey && e.which === 68);
                },
                handler: function(player, options, event) {
                    // Example
                    if (options.enableMute) {
                    player.muted(!player.muted());
                    }
                }
                },
                numbersKey: {
                key: function(event) {
                    return ((event.which > 47 && event.which < 59) || (event.which > 95 && event.which < 106));
                },
                handler: function(player, options, event) {
                    if (options.enableModifiersForNumbers || !(event.metaKey || event.ctrlKey || event.altKey)) {
                    var sub = 48;
                    if (event.which > 95) {
                        sub = 96;
                    }
                    var number = event.which - sub;
                    player.currentTime(player.duration() * number * 0.1);
                    }
                }
                },

                emptyHotkey: {
                // Empty
                },

                withoutKey: {
                handler: function(player, options, event) {
                    console.log('withoutKey handler');
                }
                },

                withoutHandler: {
                key: function(e) {
                    return true;
                }
                },

                malformedKey: {
                key: function() {
                    console.log('I have a malformed customKey. The Key function must return a boolean.');
                },
                handler: function(player, options, event) {
                    //Empty
                }
                }
            }
            });
        });
        </script>
</div>

</body>



