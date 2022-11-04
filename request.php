
<?php
session_start();
include 'database.php';
include 'header.php';

if(!isset($_SESSION["idstud"])){
    header("ulogin.php");

}
?>

    <div id="wrapper">
        <h3 id="heading">New Book request</h3>
        <div id ="center">
            <?php
            if(isset($_POST["submit"])){
                $sql ="INSERT INTO request (idstud, mes,logs) VALUES ({$_SESSION["id"]},'{$_POST["mess"]}',now()) ";
                $db->query($sql);

                    echo "<p class='success'>Request sent to admin</p>";

            }
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
                <label>Message</label>
                <textarea required name="mess"></textarea>
                <button tupe="submit" name="submit">Sent</button>

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

