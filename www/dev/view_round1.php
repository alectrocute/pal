<!-- OH A SUH DOOOO AYY LMAO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/plyr@3/dist/plyr.css" rel="stylesheet">
    <link href="/assets/style.css" rel="stylesheet">
    <title>live room /w/
        <?php echo htmlspecialchars($_GET["key"]); ?>
    </title>
</head>

<body>
    <footer>
        <span>
            <div class="avatar">
               <div class="avatar-live">
               </div>
               <img src="/avatar/muse.png">
            </div>
            <p><?php echo htmlspecialchars($_GET["key"]); ?></p>
         </span>
    </footer>
    <article>
        <video id="live" width="100%" height=auto poster="/assets/static.gif" autoplay controls crossorigin playsinline data-plyr-config='{ "title": "Live", "controls": ["mute", "volume","captions", "pip", "airplay", "fullscreen"], "blankVideo": "https://cdn.plyr.io/static/blank.mp4", "disableContextMenu": "true"  }'></video>
        <div id="loading">Please wait for video to start...</div>
    </article>
    <script src="https://unpkg.com/plyr"></script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const source = 'http://pal.is/hls/<?php echo htmlspecialchars($_GET["key"]); ?>/index.m3u8';
            const video = document.querySelector('video');
            const player = new Plyr(video, {
                clickToPlay: false,
                captions: {
                    active: true,
                    update: true,
                    language: 'en'
                }
            });

            var config = {
                debug: false
            };

            const hls = new Hls(config);
            window.hls = hls;

            function checkForSource() {
                var http = new XMLHttpRequest();
                http.open('HEAD', source, false);
                http.send();
                if (http.status == 404) {
                    setTimeout(function() {
                        checkForSource();
                    }, 4000);
                } else {
                    hls.loadSource(source);
                    hls.attachMedia(video);
                    document.getElementById("loading").style.opacity = 0;
                    player.play()
                }
            }
            checkForSource();
            window.player = player;
            hls.on(Hls.Events.MANIFEST_PARSED, function() {
                document.getElementById("loading").style.opacity = 0;
                player.play();
            })
        })
    </script>
</body>

</html>