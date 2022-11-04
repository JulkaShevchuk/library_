
<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["id"])){
    header("alogin.php");

}
?>

    <div id="wrapper">
        <h3 id="heading">View request details</h3>

        <?php
        $sql="SELECT book.btitle,student.name,comment.comm,comment.logs FROM comment INNER JOIN book on book.id = comment.bid INNER JOIN student on comment.sid=student.id;";
        $res = $db->query($sql);
        if($res ->num_rows>0){
            echo "<table>
    <tr>
    <th>SNO</th>
     <th>Book</th>
      <th>Name</th>
       <th>Comment</th>
       <th>Logs</th>
    </tr>
";
            $i=0;
            while($row=$res->fetch_assoc()){
                $i++;

                echo"<tr>";
                echo"<td>{$i}</td>";
                echo"<td>{$row["btitle"]}</td>";
                echo"<td>{$row["name"]}</td>";
                echo"<td>{$row["comm"]}</td>";
                echo"<td>{$row["logs"]}</td>";

                echo"</tr>";
            }
            echo "</table>";
        }else{
            echo "<p class='error'>No comments found</p>";
        }

        ?>
    </div>
    <div id="navi">
        <?php include 'admin.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>
