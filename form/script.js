
function liveTyping(){
  document.getElementById('target').value = document.getElementById('typingFirstName').value;
  document.getElementById('target').value += " " + document.getElementById('typingLastName').value;
}