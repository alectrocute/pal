<!-- OH A SUH DOOOO AYY LMAO -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/assets/style.css" rel="stylesheet">
    <style>
    	h2 {
    		text-align: center;
  color: white;
  font-size: 1.5em;
  padding: 0.8em;
  border-radius: 4px;
  font-family: "Inter", sans-serif;
  font-weight: 300;
  pointer-events: none;
}

    	h3 {
    		text-align: center;
  border: 1px solid #222;
  color: white;
  background: black;
  font-size: 1.5em;
  padding: 1em;
  border-radius: 4px;
  font-family: "Inter", sans-serif;
  font-weight: 500;
  text-decoration: none !important;
}

h3:hover {
  transform: scale(1.08);
}

a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

a:active {
  text-decoration: underline;
}

svg {
	fill: white;
	margin-left: 0.5em;
}

</style>
</head>
<body>
  <script>
  var timeleft = 60;
  var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = "in " + timeleft + " seconds";
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "now"
  }
}, 1000);
</script>

    <footer>
        <span>
            <div class="avatar">
                <img src="/avatar/muse.png">
            </div>
        </span>
    </footer>
    <article>
        <h2>Video is will begin streaming <span id="countdown">in 60 seconds</span>!</h2>
        <a href="/w/<?php if(strlen($todo_key) == 0) { echo "invalid"; } else { echo $todo_key; }; ?>"><h3><?php if(strlen($todo_key) == 0) { echo "invalid"; } else { echo $todo_key; } ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.723 18.654l-3.61 3.609c-2.316 2.315-6.063 2.315-8.378 0-1.12-1.118-1.735-2.606-1.735-4.188 0-1.582.615-3.07 1.734-4.189l4.866-4.865c2.355-2.355 6.114-2.262 8.377 0 .453.453.81.973 1.089 1.527l-1.593 1.592c-.18-.613-.5-1.189-.964-1.652-1.448-1.448-3.93-1.51-5.439-.001l-.001.002-4.867 4.865c-1.5 1.499-1.5 3.941 0 5.44 1.517 1.517 3.958 1.488 5.442 0l2.425-2.424c.993.284 1.791.335 2.654.284zm.161-16.918l-3.574 3.576c.847-.05 1.655 0 2.653.283l2.393-2.389c1.498-1.502 3.94-1.5 5.44-.001 1.517 1.518 1.486 3.959 0 5.442l-4.831 4.831-.003.002c-1.438 1.437-3.886 1.552-5.439-.002-.473-.474-.785-1.042-.956-1.643l-.084.068-1.517 1.515c.28.556.635 1.075 1.088 1.528 2.245 2.245 6.004 2.374 8.378 0l4.832-4.831c2.314-2.316 2.316-6.062-.001-8.377-2.317-2.321-6.067-2.313-8.379-.002z"/></svg></h3></a>
    </article>
</body>
</html>