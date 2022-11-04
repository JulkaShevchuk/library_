
<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["idstud"])){
    header("ulogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">Search</h3>
        <div id ="center">
            <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
                <label>Enter book name or keywords</label>
                <input type="text"required name="name">
                <button tupe="submit" name="submit">Search</button>

            </form>

        </div>
        <?php
        if(isset($_POST["submit"])) {


          $sql = "SELECT * FROM book WHERE btitle LIKE '%{$_POST["name"]}%' OR keywords LIKE'%{$_POST["name"]}%'";
            $res = $db->query($sql);
            if ($res->num_rows > 0) {
                echo "<table>
    <tr>
    <th>SNO</th>
     <th>Book name</th>
      <th>Reywords</th>
       <th>View</th>
       <th>Comment</th>
    </tr>
";
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                    $i++;

                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["btitle"]}</td>";
                    echo "<td>{$row["keywords"]}</td>";
                    echo "<td><a href='{$row["file"]}' target='_blank'>View</a></td>";
                    echo "<td><a href='comment.php?id={$row["id"]}'>Go</a></td>";

                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='error'>No books found</p>";
            }
        }
        ?>


    </div>
    <div id="navi">
        <?php include 'user.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>


