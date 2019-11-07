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

if($configurationFile['gateway-info']['initial-setup'] == 0) {
  //Send to first time setup
  header("Location: firstTimeSetup.php");
}


?>

<div class="row align-items-center">
   <div class="text-center">
     <h1>4G Module Configuration Tool</h1>
   </div>
</div>
<div class="row align-items-center">
   <div class="text-center">
     <h4>4G Module Configuration</h4>
     <h4>This page allows you to configure the settings for the 4G module.
     </div>

</div>
<br>


<br/><br/>

<div class="row">
  <div class="coulumn">
     <h1 class="ui top attached block header">Edit config file - 4G Module</h1>
     <form action="update4G.php" method="post" class="ui form">
         <div class="ui bottom attached segment">

           <div class="field">
             <label for="gps"  >Enable 4G Module:</label> Enables the 4G Module.
             <br/><br/>
             <div class="ui slider checkbox">
              <input type="checkbox" name="gps"  class="form-control" <?php if($jsonDecoded['gps'] == "true") { echo "checked";}?> >
              <label>Enable 4G Module</label>
             </div>
            </div>
            <br/>


         <div class="field">
          <label for="gatewayId">APN:</label> Latitude of the gateway's location.
          <input type="text" id="latitude" name="latitude" class="form-control" required />
         </div>
         <br/>
         <div class="field">
          <label for="longitude">Number:</label> Longitude of the gateway's location.
          <input type="text" id="longitude" name="longitude" class="form-control" required />
         </div>
         <br/>
         <div class="field">
          <label for="altitude">Username:</label> Approximate altitude of the gateway in meters.
          <input type="text" id="altitude" name="altitude" class="form-control" required />
         </div>
         <br/>

         <div class="field">
          <label for="altitude">Password:</label> Approximate altitude of the gateway in meters.
          <input type="text" id="altitude" name="altitude" class="form-control" required />
         </div>
         <br/>


          <br/>
          <input type="submit" class="ui primary button" value="Update Configuration" >
          </div>
         </form>
       </div>
     </div>
    </div>
    </div>

<script src="js/configurePkt.js"></script>

<?php
include('inc/footer.php');
?>