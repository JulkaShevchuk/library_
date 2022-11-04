<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["id"])){
    header("alogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">View student details</h3>

<?php
$sql="SELECT * FROM student";
$res= $db->query($sql);
if($res ->num_rows>0){
   echo "<table>
    <tr>
    <th>SNO</th>
     <th>NAME</th>
      <th>EMAIL</th>
       <th>DEPARTMENT</th>
    </tr>
";
   $i=0;
   while($row=$res->fetch_assoc()){
       $i++;

   echo"<tr>";
    echo"<td>{$i}</td>";
    echo"<td>{$row["name"]}</td>";
    echo"<td>{$row["mail"]}</td>";
    echo"<td>{$row["dep"]}</td>";

    echo"</tr>";
}
echo "</table>";
}else{
    echo "<p class='error'>No student records found</p>";
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
