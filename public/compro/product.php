<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Ayoochecklist</title>
        <link rel="shortcut icon" href="img/icons/ayoo-favicon.ico">
        <!-- Font Start -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <!-- Font End -->

        <!-- call select2 css vendor -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />

        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

        <link type="text/css" rel="stylesheet" href="css/all.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">

        <!-- Custom CSS -->
        <style type="text/css"></style>
    </head>
    <body>

        <?php include("navbar.php"); ?>
        
        <section class="ri-padding20 ri-box">
            <div class="content bigmargin">
                <div class="new-col ri-padding20">
                    <div class="ri-flex tablet-break">
                        <div class="flex1 ri-paddingright40">
                            <h1>List Tugas</h1>
                            <p>Setiap hari pada hari kerja, kamu akan menerima daftar pekerjaan yang harus kamu selesaikan. Begitu selesai, langsung checklist. Begitu praktis!</p>
                        </div>
                        <div class="flex1 ri-right align-self-center">
                            <img src="img/icons/product/1.svg" class="w-100 img-content" alt="">
                        </div>
                    </div>
                </div>
                <div class="new-col ri-padding20">
                    <div class="ri-flex tablet-break">
                        <div class="flex1 ri-padding40 push-content">
                            <h1>Dokumentasi Tugas</h1>
                            <p>Foto …., Upload…., Laporkan……! Hasil kerjamu langsung bisa dibuktikan sekarang.</p>
                        </div>
                        <div class="flex1 ri-left align-self-center pull-content">
                            <img src="img/icons/product/2.svg" class="w-100 img-content" alt="">
                        </div>
                    </div>
                </div>
                <div class="new-col ri-padding20">
                    <div class="ri-flex tablet-break">
                        <div class="flex1 ri-paddingright40">
                            <h1>Histori Pekerjaan</h1>
                            <p>Pekerjaan apapun yang sudah kamu selesaikan, rekam jejaknya bisa ditelusuri kembali dengan bukti hasil kerja yang dapat dipertanggungjawabkan.</p>
                        </div>
                        <div class="flex1 ri-right align-self-center">
                            <img src="img/icons/product/3.svg" class="w-100 img-content" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>
        <div class="ri-scrolltop"><i class="fas fa-arrow-up"></i></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <!-- call select2 js vendor-->
        <script type="text/javascript" src="js/scrolltop.js"></script> 
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                //Modal
                $(document).on('click', '.modalvideoopen' , function() {
                    var modal = '.'+modalclasstrim($(this));
                    props_show(modal);
                });
            });
        </script>
    </body>
</html>