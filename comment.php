
<?php
session_start();
include 'database.php';

if(!isset($_SESSION["idstud"])){
    header("ulogin.php");
    include 'header.php';
}
?>


    <div id="wrapper">
        <h3 id="heading">Send your comment</h3>

        <?php
        if(isset($_POST["submit"])){

        $sql="INSERT INTO `comment`(`bid`, `sid`, `comm`, `logs`) VALUES ({$_GET["id"]},{$_SESSION["id"]},'{$_POST["mes"]}',now()) ";
        $db ->query($sql);
        }

        $sql = "SELECT * FROM book WHERE id= ".$_GET["id"];
        $res = $db->query($sql);
        if($res->num_rows>0){

            echo "<table>";
            $row = $res->fetch_assoc();
            echo "
<tr>
<th>Book Name</th>
<td>{$row["btitle"]}</td>
</tr>
<tr>
<th>Keywords</th>
<td>{$row["keywords"]}</td>
</tr>

            ";
            echo "</table>";

        }else{
            echo "<p class='error'>No books</p>";
        }
        ?>


        <div id ="center">
            <form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post">
                <label>Your comment</label>
                <textarea name ="mes" required></textarea>
                <button type = "submit" name="submit">Post comment</button>
            </form>


        </div>
        <?php  $sql=
            "SELECT student.name, comment.comm,comment.logs FROM comment INNER JOIN student on comment.sid=student.id WHERE comment.bid={$_GET["id"]} ORDER by comment.id DESC";
        $res = $db->query($sql);
        if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
                echo "<p>
<strong>{$row["name"]}</strong>
{$row['comm']}
<i>{$row['logs']}</i>
</p>";
            }

        }else{
            echo "<p class='error'>No comments yet...</p>";
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


