<?php
require_once dirname(__FILE__)."/db_check.php";

$conn = db_check();
checkScore($conn);

function checkScore($conn) {
    $top10_sql = "SELECT score,username FROM game_score ORDER BY score desc limit 10";
    $result = mysqli_query($conn, $top10_sql);
    echo "<table class='table' style='text-align: center'>";
    echo "<thead>
            <tr>
            <th scope='col'>#</th>
            <th scope='col'>Player Name</th>
            <th scope='col'>Score</th>
            </tr></thead>";
    echo "<tbody>";
    $num=1;
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
        <th scope='row'>".$num."</th>
        <td>".$row["username"]."</td>
        <td>".$row["score"]."</td>
        </tr>";
        $num=$num+1;
    }
    echo "</tbody></table>";
}
$conn->close();

