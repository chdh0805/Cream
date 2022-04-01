<?php

session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['send'])) {
    $watch = $_POST['watch'];
    $sql = "INSERT INTO  video(watch) VALUES(:watch)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':watch', $watch, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        header('Location:platform.php');
    } else {
        $error = "Something went wrong. Please try again";
    }
}
?>
<?php include('include/header.php');?>

    <section class="pop_section">
        <div class="container bg-1 video_container" >
            <div class="row pt-5 px-md-5">                
                <div class="col-12 col-md-6 m-auto px-5">
                    <div class="d-flex align-items-center pt-5 pt-md-0 mt-5 mt-md-0">
                        <img class="mr-2" src="assets/image/vector.png" alt="" />
                        <p class="video_first_line"> Kod baucar pembelian bernilai RM5 telah dihantar ke e-mel anda. </p>
                    </div>
                    <p class ="video_second_line mt-2">Jom memenangi Hadiah Wang Tunai bernilai RM500 atau produk QV!</p>
                </div>
                <div class="col-12 col-md-6 video_box_div text-center">
                    <img src="assets/image/box.png" class="box_image" >
                </div>               
            </div>
            <div class="row formqv_video text-center p-3 p-md-5">
                <div class="col-12">
                    <p style="color: #293D8A;" class="video_text1"> Tonton video ini untuk menyertai Cabutan Bertuah Raya QV.</p>
                    <video id="myvid" class="video_play" muted autoplay controls>
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    </video>
                    <p style="color: #293D8A;" class="video_text2"> Peringatan: Jangan tutup pelayar web anda! </p>
                </div>
            </div>
            <form method="post" name="chngpwd" class="text-center">
                <!-- <?php if ($error) { ?><div class="errorWrap">
                    <strong>ERROR</strong>:<?php echo htmlentities($error); ?>
                </div><?php } else if ($msg) { ?><div class="succWrap">
                    <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?>
                </div>
                <?php } ?> -->
                <input type="text" class="form-control form-video" value="Yes" name="watch" >
                <button name="send" type="submit"  id="submitButton" class="btn btn-default btn-main"
                    style="background-color:#0078BF" hidden>SETERUSNYA
                </button>
                <p id="timeLeft"></p>
            </form>
        </div>
        </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    setTimeout(function() {
        document.getElementById('submitButton').hidden = null;
    }, 13000);
    var countdownNum = 8;
    incTimer();
    </script>

</body>
</html>
