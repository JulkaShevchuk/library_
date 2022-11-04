
<?php
session_start();
include 'database.php';
include 'header.php';?>

    <div id="wrapper">
        <h3 id="heading">User Login</h3>
        <div id="center">
            <?php
            if(isset($_POST['submit'])){
                $sql="SELECT * FROM student WHERE name='{$_POST["name"]}' and pass='{$_POST["pass"]}'";
                $res = $db->query($sql);
                if($res->num_rows>0){
                    $row = $res->fetch_assoc();
                    $_SESSION ["id"]=$row["id"];
                    $_SESSION ["name"]=$row["name"];

                    header("location:uhome.php");
                }else{
                    echo "<p class='error'>Invalid Details</p>";
                }
            }




            ?>

            <form action="ulogin.php" method="post">
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Password</label>
                <input type="password" name="pass" required>
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