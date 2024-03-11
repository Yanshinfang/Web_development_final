<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();

//echo $_SESSION['username'];
$query = [
  'score' => htmlspecialchars($_POST["game_score"]),
  'username'=> htmlspecialchars($_SESSION['username'])
];
$conn = db_check();
insertScore($query['score'], $query['username'], $conn);

function insertScore($score, $username, $conn) {
    $sql = "INSERT INTO game_score(score, username)
    VALUES ('$score', '$username')";
    if(mysqli_query($conn, $sql)){
        echo "Your score:".$score;
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
$conn->close();

