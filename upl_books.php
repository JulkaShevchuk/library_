
<?php
session_start();
include 'header.php';
include 'database.php';

if(!isset($_SESSION["id"])){
    header("alogin.php");

}
?>


    <div id="wrapper">
        <h3 id="heading">Upload book</h3>
        <div id ="center">
            <?php
            if(isset($_POST["submit"])){
               $target_dir = "upload/";
            $target_file = $target_dir.basename($_FILES["efile"]["name"]);
            if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file)){
               $sql="INSERT INTO book (btitle,keywords,file) VALUES ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}') ";
               $db ->query($sql);
               echo "<p class='success'>Your book uploaded Seccess</p>";

            }else{
                echo "<p class='error'>Error</p>";
            }

            }
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
                <label>Book Title</label>
                <input type="text" name = "bname" required>
                <label>Keyword</label>
                <textarea name = "keys" required></textarea>
                <label>Upload file</label>
                <input type="file" name = "efile" required>
                <button tupe="submit" name="submit">Upload book</button>

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
