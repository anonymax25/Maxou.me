
<div class="container pl-0 pr-0 mt-4">
  <div class="row jumbotron text-center h1" style="background-image: linear-gradient(-90deg, #60d394, #d3d160);" id="timestamp">Time goes here</div>
  <div class="row jumbotron text-center h1" style="background-image: linear-gradient(-90deg, #60c2d3, #c060d3);" id="counter">0 seconds</div>
  <div class="row m-2 border border-rounded bg-light">
    <div class="col-md-6">
      <h1 class="display-4">Chronometre:</h1>
      <button class="btn btn-outline-primary text-center h1" onclick="startCounter();"><p class="fas fa-play m-0"></p></button>
      <button class="btn btn-outline-primary text-center h1" onclick="pause();"><p class="fas fa-pause m-0"></p></button>
      <button class="btn btn-outline-primary text-center h1" onclick="resetCounter();"><p class="fas fa-redo m-0"></p></button>
    </div>
    <div class="col-md-6">
      <h1 class="display-4">Timer(secondes):</h1>
      <form class="m-2" action="" method="post">
        <input type="number" min="5" name="" value="6" id="timer">
      </form>
      <button class="btn btn-outline-primary text-center h1" onclick="startTimer();"><p class="fas fa-play m-0"></p></button>
      <button class="btn btn-outline-primary text-center h1" onclick="pause();"><p class="fas fa-pause m-0"></p></button>
      <button class="btn btn-outline-primary text-center h1" onclick="resetCounter();"><p class="fas fa-redo m-0"></p></button>
    </div>
  </div>
</div>

<script type="text/javascript" src="pages/tools/clock.js"></script>
