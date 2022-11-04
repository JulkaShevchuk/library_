
<?php
include 'database.php';
include 'header.php';
?>


    <div id="wrapper">
        <h3 id="heading">New User</h3>
        <div id ="center">
            <?php
            if(isset($_POST["submit"])){

                    $sql="INSERT INTO student (name,pass,mail,dep) VALUES ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}') ";
                    $db ->query($sql);
                    echo "<p class='success'>User registration Success</p>";


            }
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
                <label>Name</label>
                <input type="text" name = "name" required>
                <label>Password</label>
                <input type = "password" name ="pass" required>
                <label>Email</label>
                <input type = "email" name = "mail" required>
                <select name = "dep" required>
                    <option value="">Select</option>
                    <option value="BCA">BCA</option>
                    <option value="B.Sc.CS">B.Sc.CS</option>
                    <option value="MCA">MCA</option>
                </select>
                <button tupe="submit" name="submit">Register</button>

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
