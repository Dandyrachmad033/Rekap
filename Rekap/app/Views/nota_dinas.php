<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
    <link rel="stylesheet" href=<?= base_url('css/nota_dinas.css') ?>>
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
            <div class="text">Nota Dinas</div>
        </div>

        <div data-aos="fade-left" data-aos-delay="300">
            <div class="book shadow p-3 mb-5 bg-white rounded border border-info book-container">

                <form action=<?= base_url('Increase') ?> method="post" id="submit_nota_dinas">
                    <div class="two-field">

                        <div class="form-group">
                            <label for="tanggalSurat">Tanggal</label>
                            <input type="date" class="form-control border border-dark" id="tanggal" name="tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="suratDari">Dari</label>
                            <input type="text" class="form-control border border-dark" id="dari" name="dari" placeholder="Dari" required>
                        </div>
                    </div>
                    <div class="two-field">
                        <div class="form-group">
                            <label for="suratDari">Perihal</label>
                            <input type="text" class="form-control border border-dark" id="perihal" name="perihal" placeholder="Masukkan Perihal" required>
                        </div>
                        <div class="form-group">
                            <label for="suratDari">Nomor Surat</label>
                            <input type="text" class="form-control border border-dark" id="nomorsurat" name="nomorsurat" placeholder="Masukkan Nomor Surat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomorSurat">Keterangan</label>
                        <textarea class="form-control border border-dark" id="keterangan" name="keterangan" placeholder="keterangan" rows="3" cols="50"></textarea>
                    </div>



                    <button style="background: #FF7F00;" class="btn btn-dark" type="button" id="send_nota_dinas">Tambahkan Data</button>
                </form>
            </div>

        </div>
    </section>
    <script>
        document.getElementById("send_nota_dinas").addEventListener("click", function() {
            var form1 = document.getElementById("submit_nota_dinas");
            form1.submit();
        });
    </script>
</body>

</html>