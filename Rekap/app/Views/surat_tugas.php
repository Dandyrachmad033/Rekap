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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div data-aos="zoom-in" data-aos-delay="300">
            <div class="text">Surat Tugas</div>
        </div>
        <div data-aos="fade-left" data-aos-delay="300">
            <div style="display: flex;">
                <div class="book shadow p-3 mb-5 bg-white rounded border border-info">

                    <form action=<?= base_url('InsertData') ?> method="post" id="submit_surat_tugas">
                        <div class="two-field">

                            <div class="form-group">
                                <label for="suratDari">Nomor Surat Tugas</label>
                                <input type="text" class="form-control border border-dark" id="nomorsurattugas" name="nomorsurattugas" placeholder="Masukkan Nomor Tugas" required>
                            </div>

                            <div class="form-group">
                                <label for="suratDari">Nomor Dasar Surat Tugas</label>
                                <input type="text" class="form-control border border-dark" id="nomordasar" name="nomordasar" placeholder="Masukkan Nomor Dasar " required>
                            </div>
                        </div>
                        <div class="two-field">
                            <div class="form-group">
                                <br>
                                <div style="width: 400px;">
                                    <div class="checkbox-container">
                                        <label>
                                            <input type="checkbox" name="namapegawai" />
                                            Input Nama Pegawai
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tanggaldasarSurat">Tanggal Dasar Surat</label>
                                <input type="date" class="form-control border border-dark" id="tanggaldasarsurat" name="tanggaldasarsurat" required>
                            </div>
                        </div>

                        <div class="two-field">

                            <div class="form-group">
                                <label for="tanggalSurat">Maksud Surat Tugas</label>
                                <input type="text" class="form-control border border-dark" id="maksudsurat" name="maksudsurat" placeholder="Masukkan Maksud Surat" required>
                            </div>

                            <div class="form-group">
                                <label for="suratDari">Lama Perjalanan</label>
                                <input type="text" class="form-control border border-dark" id="lamaperjalanan" name="lamaperjalanan" placeholder="Masukkan Lama Perjalanan" required>
                            </div>
                        </div>

                        <div class="two-field">
                            <div class="form-group">
                                <label for="suratDari">Tempat Berangkat</label>
                                <input type="text" class="form-control border border-dark" id="tempatberangkat" name="tempatberangkat" placeholder="Masukkan Tempat" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggalSurat">Tempat Tujuan</label>
                                <input type="text" class="form-control border border-dark" id="tempattujuan" name="tempattujuan" required placeholder="Masukkan Tujuan ">
                            </div>

                        </div>

                        <div class="two-field">

                            <div class="form-group">
                                <label for="tanggalSurat">Tanggal berangkat</label>
                                <input type="date" class="form-control border border-dark" id="tanggalberangkat" name="tanggalberangkat" required>
                            </div>

                            <div class="form-group">
                                <label for="nomorSurat">Tanggal Pulang</label>
                                <input type="date" class="form-control border border-dark" id="tanggalpulang" name="tanggalpulang" placeholder="Masukkan tanggal pulang"></input>
                            </div>
                        </div>
                        <button class="btn btn-dark float-right" type="button" id="send_surat_tugas" style="background: #FF7F00;">Tambahkan Data</button>
                </div>

                <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
                    <div class="hidden-form-container" id="showing">

                        <label> Pilih Nama Pegawai </label>
                        <br>

                        <label>
                            <input type="checkbox" name="option[]" value="TRI AWIGNAMI ASTOETI, S.KM. M.MKes" />
                            TRI AWIGNAMI ASTOETI, S.KM. M.MKes
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="CHAIRIYAH, S.KM., M.M" />
                            CHAIRIYAH, S.KM., M.M
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="ERVINA SOFYANA PUTRI, S.KM" />
                            ERVINA SOFYANA PUTRI, S.KM
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="AINUN AZIZAH RAMDHANI, S.KM" />
                            AINUN AZIZAH RAMDHANI, S.KM
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="IING MERILLAROSA KHARISMA WARDANI, S.KM" />
                            IING MERILLAROSA KHARISMA WARDANI, S.KM
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="WARANTIKA RIKMA YUNIARINI, S.Keb., M.P.H." />
                            WARANTIKA RIKMA YUNIARINI, S.Keb., M.P.H.
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="ASMI KUROIDAH, S.KM" />
                            ASMI KUROIDAH, S.KM
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="RATNA WAHYUNINGSIH, S.Kep.Ners" />
                            RATNA WAHYUNINGSIH, S.Kep.Ners
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="TYAS AYU PUTRI K, SKM" />
                            TYAS AYU PUTRI K, SKM
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="NURICA AYU ERMAYANI, S.Si" />
                            NURICA AYU ERMAYANI, S.Si
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="ELIZA INDRAYANTI, S.Kep. Ners" />
                            ELIZA INDRAYANTI, S.Kep. Ners
                        </label>
                        <label>
                            <input type="checkbox" name="option[]" value="WARANTIKA RIKMA YUNIARINI, S.Keb., M.P.H." />
                            WARANTIKA RIKMA YUNIARINI, S.Keb., M.P.H.
                        </label>
                    </div>

                </div>

            </div>
        </div>


        </form>

        </div>

    </section>

    <script>
        const checkboxes = document.querySelectorAll('.checkbox-container input[type="checkbox"]');
        const formContainers = document.querySelectorAll('.hidden-form-container');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const value = checkbox.value;
                const formContainer = document.getElementById('showing');

                if (checkbox.checked) {
                    formContainer.classList.add('visible');
                } else {
                    formContainer.classList.remove('visible');
                }
            });
        });
    </script>
    <script>
        document.getElementById("send_surat_tugas").addEventListener("click", function() {
            var form1 = document.getElementById("submit_surat_tugas");
            form1.submit();
        });
    </script>
</body>

</html>