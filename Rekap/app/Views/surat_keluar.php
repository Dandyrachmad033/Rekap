<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <link rel="stylesheet" href=<?= base_url('css/surat_keluar.css') ?>>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div data-aos="zoom-in" data-aos-delay="300">
            <div class="text">Surat Keluar</div>
        </div>
        <div data-aos="fade-left" data-aos-delay="300">
            <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
                <form action=<?= base_url('PlusData') ?> method="post" id="submit_surat_keluar">
                    <div class="two-field">
                        <div class="form-group">
                            <label for="suratDari">Kategori</label>
                            <div class="wrapper">
                                <div class="select-container">
                                    <select class="form-control border border-dark" id="kategori" name="kategori">
                                        <option></option>
                                        <option>Surat</option>
                                        <option>Undangan</option>
                                        <option>Permintaan Data</option>
                                        <option>Permohonan</option>
                                        <option>Lamaran pekerjaan</option>
                                        <option>Perijinan</option>
                                        <option>Surat pengantar</option>
                                        <option>Pengaduan</option>
                                        <option>Berita Acara</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggalSurat">Tanggal Diterima</label>
                            <input type="date" class="form-control border border-dark" id="tanggalterima" name="tanggalterima" require>
                        </div>
                    </div>
                    <div class="two-field">
                        <div class="form-group">
                            <label for="suratDari">Tujuan</label>
                            <input type="text" class="form-control border border-dark" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggalSurat">Tanggal Surat</label>
                            <input type="date" class="form-control border border-dark" id="tanggalsurat" name="tanggalsurat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomorSurat">Perihal</label>
                        <textarea class="form-control border border-dark" id="perihal" name="perihal" placeholder="perihal" rows="3" cols="50"></textarea>
                    </div>



                    <button style="background: #FF7F00;" class="btn btn-dark float-right" type="button" id="send_surat_keluar">Tambahkan Data</button>

                </form>
            </div>

        </div>
    </section>
    <script>
        document.getElementById("send_surat_keluar").addEventListener("click", function() {
            var form1 = document.getElementById("submit_surat_keluar");
            form1.submit();
        });
    </script>
</body>

</html>