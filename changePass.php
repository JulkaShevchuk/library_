
<?php
session_start();
include 'database.php';

if(!isset($_SESSION["id"])){
    header("alogin.php");

}
include 'header.php';
?>


    <div id="wrapper">
        <h3 id="heading">Change password</h3>
        <div id ="center">
            <?php
            if(isset($_POST["submit"])){
             $sql ="SELECT * FROM admin WHERE apass = '{$_POST["opass"]}' and id='{$_SESSION["id"]}' ";
             $res = $db->query($sql);
             if($res->num_rows>0){
$s = "UPDATE admin set apass='{$_POST["npass"]}' WHERE id=". $_SESSION["id"];
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
        <?php include 'admin.php';?>
    </div>
    <div id="footer" >
        <p>copyright &copy;Yuliia Shevchuk 2021</p>
    </div>
</div>

</body>
</html>
