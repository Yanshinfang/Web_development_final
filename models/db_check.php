<?php
function db_check() {
  $servername = "localhost";
  $username = "root";
  $password = "cindy900630";
  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
  $dbname = "js_game_db";
  return  $conn = new mysqli($servername, $username, $password, $dbname);
  }
}
