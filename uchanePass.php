
<?php
session_start();
include 'database.php';
include 'header.php';
if(!isset($_SESSION["id"])){
    header("ulogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">Change password</h3>
        <div id ="center">
            <?php
            if(isset($_POST["submit"])){
                $sql ="SELECT * FROM student WHERE pass = '{$_POST["opass"]}' and id='{$_SESSION["id"]}' ";
                $res = $db->query($sql);
                if($res->num_rows>0){
                    $s = "UPDATE student set pass='{$_POST["npass"]}' WHERE id=". $_SESSION["id"];
                    $db->query($s);
                    echo "<p class='success'>Password changed</p>";
                }else{
                    echo "<p class='error'>Invalid Password</p>";
                }
            }
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
                <label>Old password</label>
                <input type="password" name = "opass" required>
                <label>New password</label>
                <input type="password" name = "npass" required>
                <button tupe="submit" name="submit">Update</button>

            </form>

        </div>

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
