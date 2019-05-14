var counter = 0;
var runState = 0;
$(document).ready(function() {
  setInterval(timestamp, 1000);
});

function timestamp() {
  $.ajax({
    url: 'ajaxPhpScripts/timestamp.php',
    dataType: "text",
    type: 'get',
    success: function(data) {

      $('#timestamp').html(data);
      if(runState==1){
        $('#counter').html("Temps écoulé: " + counter++ + " seconds");
      }else if (runState==2) {
        $('#counter').html("Temps réstant: " + counter-- + " seconds");
        if(counter<-1){
          runState=0;
          displayAlarm();
        }
      }
      console.log("Sec: " + counter + " R: " + runState);
    },
  });
}
function startCounter(){
  runState=1;
}
function pause(){
  runState=0;
}

function startTimer(div){
  var seconds = $('#timer').val();
  counter = seconds;
  runState=2;
}
function pause(){
  runState=0;
}

function resetCounter(){
  $('#counter').html("0 seconds");
  counter=0;
}

function displayAlarm(){
  var sound = new Audio("../../sounds/moon.mp3");
  sound.play();
  $('#counter').html("Fin du Timer de " + $('#timer').val() + " secondes");
}
