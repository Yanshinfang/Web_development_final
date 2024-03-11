<?php
require_once dirname(__FILE__)."/include/head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dino Game</title>
    <?php
        require_once dirname(__FILE__)."/login_nav.php";
        ?> 
    <link rel="stylesheet" href="css/style.css">
    <link href="css/index.css" rel="stylesheet" type="text/css" title="Default Style">
</head>
<body>
    <div id="container">
        <div id="cloud">
            <img src="assets/cloud1.jpg" alt="cloud">
        </div>
        <div id="dino">
            <img src="assets/dino.png" alt="dino">
        </div>
        <div id="block">
            <img src="assets/block.png" alt="blocks">
        </div>
        <div id="road">
            <img src="assets/road.png" alt="road">
        </div>    
        <div id="score">Score <b>00</b></div>
        <div id="login"><input type="image" src="assets/login.png" onclick="window.location = '/final/views/login.php'"></div>
    </div>
</body>
</html>