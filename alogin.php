
<?php
session_start();
include 'database.php';
include 'header.php';?>

    <div id="wrapper">
        <h3 id="heading">Admin Login</h3>
        <div id="center">
            <?php
            if(isset($_POST['submit'])){
                $sql="SELECT * FROM admin WHERE aname='{$_POST["aname"]}' and apass='{$_POST["apass"]}'";
                $res = $db->query($sql);
                if($res->num_rows>0){
                    $row = $res->fetch_assoc();
                    $_SESSION ["id"]=$row["id"];
                    $_SESSION ["aname"]=$row["aname"];

                    header("location:ahome.php");
                }else{
                    echo "<p class='error'>Invalid Details</p>";
                }
            }




            ?>

        <form action="alogin.php" method="post">
            <label>Name</label>
            <input type="text" name="aname" required>
            <label>Password</label>
            <input type="password" name="apass" required>
            <button type="submit" name="submit">Login</button>
        </form>
        </div>
    </div>
    <div id="navi">
        <?php include 'sideBar.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>