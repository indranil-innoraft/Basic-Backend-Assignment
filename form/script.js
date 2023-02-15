
function liveTyping(){
  document.getElementById('target').value = document.getElementById('typingFirstName').value;
  document.getElementById('target').value += " " + document.getElementById('typingLastName').value;
}

document.getElementById('typingFirstName').addEventListener("keyup",liveTyping);
document.getElementById('typingLastName').addEventListener("keyup",liveTyping);

