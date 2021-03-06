<?php
/*
*IoT LoRa Gateway Controller
*Copyright (C) 2018-2019  Nebra LTD. T/a Pi Supply

*This program is free software: you can redistribute it and/or modify
*it under the terms of the GNU General Public License as published by
*the Free Software Foundation, either version 3 of the License, or
*(at your option) any later version.
*
*This program is distributed in the hope that it will be useful,
*but WITHOUT ANY WARRANTY; without even the implied warranty of
*MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*GNU General Public License for more details.
*
*You should have received a copy of the GNU General Public License
*along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/



include('inc/header.php');
//Run command and then add a 60 Second timer for the user to wait.

//Get the command ran



?>

<script>
<?php

?>

var restartCounter = 0;
var countdownTimer = window.setInterval(function () {
  restartCounter = restartCounter + 1;
  $('#progressBar').progress({percent: restartCounter,text: {
      active  : '{percent}%'
    }});
  if(restartCounter == 99) {
     clearInterval(countdownTimer);
     window.location.replace("index.php");
  }
  $('#progressBar').progress({percent: restartCounter,text: {
      active  : '{percent}%'
    }});
}, timePerTick);
</script>

<h1>IoT LoRa Gateway Command</h1>
<pre>
<?php
echo(shell_exec('echo "$USER"'));
echo(shell_exec('/opt/iotloragateway/diagnostics.sh'));




 ?>
</pre>

<div class="ui indicating progress" id="progressBar">
  <div class="bar"></div>

  <div class="label">0%</div>
</div>

<?php
include("inc/footer.php");



 ?>
