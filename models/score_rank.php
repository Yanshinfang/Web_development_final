<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();

//echo $_SESSION['username'];
$query = [
  'score' => htmlspecialchars($_POST["game_score"]),
  'username'=> htmlspecialchars($_SESSION['username'])
];
$conn = db_check();
checkScore($query['score'], $query['username'], $conn);

function checkScore($score, $username, $conn) {
    $top10_sql = "SELECT score,username FROM game_score ORDER BY score desc LIMIT 10";
    $result = mysqli_query($conn, $top10_sql);
    echo "<table class='table' style='text-align: center'>";
    echo "<thead>
            <tr>
            <th scope='col'>#</th>
            <th scope='col'>Player Name</th>
            <th scope='col'>Score</th>
            </tr></thead>";
    echo "<tbody>";
    $flag=1;
    $num=1;
    while($row = mysqli_fetch_array($result)){
        if($row["score"]==$score && $row["username"]==$username && $flag==1 ){
            echo "<tr class='table-active'>
                    <th scope='row'>".$num."</th>
                    <td>".$row["username"]."</td>
                    <td>".$row["score"]."</td>
                    </tr>";
            $flag=0;
        }
        else{
            echo "<tr>
                    <th scope='row'>".$num."</th>
                    <td>".$row["username"]."</td>
                    <td>".$row["score"]."</td>
                    </tr>";
        }
        $num=$num+1;
    }
    echo "</tbody></table>";
}
$conn->close();

