<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
if (isset($_GET['submit'])){
    $query = [
      'old_password' => htmlspecialchars($_GET["old_password"]),
      'new_password' => htmlspecialchars($_GET["new_password"]),
      'username' => htmlspecialchars($_SESSION['username']),
    ];
    $conn = db_check();
    changePassword($query['username'], md5($query['old_password'], false), $conn,md5($query['new_password']));
}

function changePassword($username, $old_password, $conn,$new_password) {
    $sql = "SELECT id, username FROM user_account WHERE username = '$username' AND password = '$old_password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0) {
      echo "舊密碼錯誤";
      header("Location: /final/views/change.php?error=舊密碼錯誤");   
    } 
    elseif($old_password == $new_password) {
        echo "新密碼不得和舊密碼重複";
      header("Location: /final/views/change.php?error=新密碼不得和舊密碼重複");  
    }
    else {
        $sql = "UPDATE user_account SET password = '$new_password' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
          echo "修改密碼成功";
          header("Location: /final/views/index_logout.php"); 
        } 
        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
  }
  $conn->close();
?>
