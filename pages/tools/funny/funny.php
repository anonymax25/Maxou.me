<script type="text/javascript" src="./pages/tools/funny/funny.js"></script>

<img src="images/irlenny.png" class="mt-5 col-md-4 offset-4">
<div id="ytplayer" class="col-md-10 offset-1 mt-5"></div>

<script>
  // Load the IFrame Player API code asynchronously.
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;
  function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
      height: '1080',
      width: '1920',
      videoId: 'dQw4w9WgXcQ',
      events: {
        'onReady': onPlayerReady
      }
    });
  }

  function onPlayerReady(event) {
    event.target.playVideo();
  }
</script>
