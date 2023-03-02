
function countdown() {
    var seconds = 59;
    function tick() {
      var counter = document.getElementById("counter");
      seconds--;
      counter.innerHTML = "You have only : " + "0:"  + (seconds < 10 ? "0" : "") + String(seconds) + " s left";
      if (seconds > 0) {
        setTimeout(tick, 1000);
      }
       else {
        window.location.href = 'index.php';
      }
    }
    tick();
  }
  countdown();