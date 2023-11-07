<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <link rel="stylesheet" href=<?= base_url('css/nota_dinas.css') ?>>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Hello Admin</div>
        <div class="book-position">
            <div style="margin: 10px; border-radius:15px">
                <div data-aos="zoom-in" data-aos-delay="300">
                    <div class="card border-info" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                        <img src=<?= base_url('images/masuk.jpg') ?> class="card-img-top" alt="...">
                        <div class="card-body bg-info">
                            <h5 class="card-title" style="color: white">Surat Masuk</h5>
                            <p class="card-text" style="color: white">Kumpulan Data surat Masuk</p>
                            <a style="background: #FF7F00;" href="<?= base_url('SuratMasuk') ?>" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>

                </div>
            </div>



            <div style="margin: 10px; border-radius:15px">
                <div data-aos="zoom-in" data-aos-delay="300">
                    <div class="card border-info" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                        <img src=<?= base_url('images/keluar.jpg') ?> class="card-img-top" alt="...">
                        <div class="card-body bg-info">
                            <h5 class="card-title" style="color: white">Surat Keluar</h5>
                            <p class="card-text" style="color: white">Kumpulan Data surat Keluar</p>
                            <a style="background: #FF7F00;" href=<?= base_url('SuratKeluar') ?> class="btn btn-sm btn-dark">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin: 10px; border-radius:15px">
                <div data-aos="zoom-in" data-aos-delay="300">
                    <div class="card border-info" style="width: 18rem; border-radius: 15px;overflow: hidden;">
                        <img src=<?= base_url('images/tugas.jpg') ?> class="card-img-top" alt="...">
                        <div class="card-body bg-info">
                            <h5 class="card-title" style="color: white">Surat Tugas</h5>
                            <p class="card-text" style="color: white">Kumpulan Data Surat Tugas</p>
                            <a style="background: #FF7F00;" href=<?= base_url('SuratTugas') ?> class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 10px; border-radius:15px; max-width:320px">
                <div data-aos="zoom-in" data-aos-delay="300">
                    <div class="card border-info" style="width: 18rem; border-radius: 15px; overflow: hidden;">
                        <img src=<?= base_url('images/nota.jpg') ?> class="card-img-top" alt="...">
                        <div class="card-body bg-info">
                            <h5 class="card-title" style="color: white">Nota Dinas</h5>
                            <p class="card-text" style="color: white">Kumpulan Data Nota Dinas</p>
                            <a style="background: #FF7F00;" href=<?= base_url('NotaDinas') ?> class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>