<!-- OH A SUH DOOOO AYY LMAO -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="/assets/style.css" rel="stylesheet">
    <title>live room /w/<?php echo htmlspecialchars($_GET["key"]); ?></title>
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
        <video id="live" height="720" width="1280" poster="/assets/static.gif" autoplay crossorigin controls></video>
        <div id="loading">Please wait for video to start...</div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        const source = 'http://pal.is/hls/<?php echo htmlspecialchars($_GET["key"]); ?>/index.m3u8';
        const video = document.getElementById('live');
        const loading = document.getElementById('loading');

        function checkForSource() {
            var http = new XMLHttpRequest();
            http.open('HEAD', source, false);
            http.send();
            if (http.status == 404) {
                setTimeout(function() {
                    checkForSource();
                }, 2000);
            } else {
                if (Hls.isSupported()) {
                    var hls = new Hls();
                    hls.loadSource(source);
                    hls.attachMedia(video);
                    hls.on(Hls.Events.MANIFEST_PARSED, function() {
                    		new Audio('/assets/load.mp3').play();
                    		loading.style.opacity = 0;
                    		video.play();
                    });
                } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                    video.src = source;
                    video.addEventListener('loadedmetadata', function() {
                    		new Audio('/assets/load.mp3').play();
                    		loading.style.opacity = 0;
                    		video.play();
                    });
                }
            }
        }
        checkForSource();
    </script>
</body>

</html>