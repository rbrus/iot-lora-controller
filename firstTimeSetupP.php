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


//Check email address
$emailAddress = $_POST['emailAddr'];
$emailAddress_c = $_POST['emailConfirm'];

if($emailAddress != $emailAddress_c || $emailAddress == null)
{
  echo("<h1>Email Addresses Do Not Match</h1>");
  include('inc/footer.php');
  exit();
}

//Check password
$password = $_POST['password'];
$password_c = $_POST['confirmPassword'];

if($password != $password_c || $password == null)
{
  echo("<h1>Passwords Do Not Match</h1>");
  include('inc/footer.php');
  exit();
}

//Model
if($_POST['model'] == "nebraSmart") {
  $model = 1;
}
else {
  $model = 0;
}

//GPS
if($_POST['gps']) {
  $gps = 1;
}
else {
  $gps = 0;
}

$gatewayID = $_POST['gatewayId'];
$description = $_POST['description'];

//Build the configuration file

//Gateway Info Section
$configurationFile['gateway-info']['initial-setup'] = 1;
$configurationFile['gateway-info']['gateway-type'] = $model;
$configurationFile['gateway-info']['gatway-friendly-name'] = $gatewayID;
$configurationFile['gateway-info']['gatway-description'] = $description;

//User Section
$configurationFile['user']['email-address'] = $emailAddress;
$configurationFile['user']['password'] = $password;

$idHash = substr(hash(sha512, $gatewayID), -14);

$eui1 = $idHash + "01";
$eui2 = $idHash + "01";
$configurationFile['packet-forwarder-1']['packet-forwarder-eui'] = $emailAddress;
$configurationFile['packet-forwarder-2']['packet-forwarder-eui'] = $password;


yaml_emit_file('/opt/iotloragateway/config/gateway_configuration.yml',$configurationFile);

echo("
<h2>First Time Setup Complete</h2>
<p>You can now continue to configure the rest of the gateway</p>

");

include('inc/footer.php');
 ?>
