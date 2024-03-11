<?php
require_once dirname(__FILE__)."/include/head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final presentation</title>
    <?php
        $login = $_SESSION['login'];
        if($login==true)
        require_once dirname(__FILE__)."/logout_nav.php";
        ?>   
    <link rel="stylesheet" href="css/style.css">
    <link href="css/index.css" rel="stylesheet" type="text/css" title="Default Style">
</head>
<body>
    <div id="container" style="margin: top 40px;">
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
        <div id="start"><img src="assets/start.png" alt="start"></div>
        <div id="gameOver"><img src="assets/game_over.png" alt="game over"></div>
    </div>
    <input type="image" src="assets/rank.png" id="rank" data-toggle="modal" data-target="#exampleModalCenter">

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100" id="exampleModalLongTitle">得分排行榜</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" id="modal-body">
          
        </div>
      </div>
      
    </div>
    </div>
    </div>
    <script>
        $.ajax({
            type: "POST",
            url: "/final/models/initial_score_rank.php",
            success: function(data){//後台返回給前台的值
                document.querySelector("#modal-body").innerHTML=data;     
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert(XMLHttpRequest.readyState);
            alert(textStatus);
            },})
    </script>
    <script src="js/file.js"></script>
</body>
</html>