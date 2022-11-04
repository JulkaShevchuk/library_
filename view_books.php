<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["id"])){
    header("alogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">View book details</h3>

        <?php
        $sql="SELECT * FROM book";
        $res= $db->query($sql);
        if($res ->num_rows>0){
            echo "<table>
    <tr>
    <th>SNO</th>
     <th>Book name</th>
      <th>Reywords</th>
       <th>View</th>
       
       
    </tr>
";
            $i=0;
            while($row=$res->fetch_assoc()){
                $i++;

                echo"<tr>";
                echo"<td>{$i}</td>";
                echo"<td>{$row["btitle"]}</td>";
                echo"<td>{$row["keywords"]}</td>";
                echo"<td><a href='{$row["file"]}' target='_blank'>View</a></td>";
                echo"</tr>";
            }
            echo "</table>";
        }else{
            echo "<p class='error'>No books found</p>";
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
