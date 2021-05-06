<body onload=display_ct()>
<div class='panel'>
<input class='searchbar' autofocus type='text' id='find' value="" onkeydown="if (event.keyCode == 13) {
  window.location.href='gseek.php?q='+document.getElementById('find').value;
}">
<span class='time' id='ct'></span>
<input type=button class='south' value='<' onclick="window.location.href='menu.php'">
</div>
