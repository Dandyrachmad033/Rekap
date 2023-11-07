<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Data Surat Tugas</div>
        <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
            <div class="scroll-table fixed_header">

                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
                <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="excelFile" accept=".xlsx, .xls">
                    <input type="submit" value="Upload">
                </form>
                <table class="table-striped table-bordered border-dark" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="bg-info">NO</th>
                            <th class="bg-info">No Surat Tugas</th>
                            <th class="bg-info">No Dasar Surat</th>
                            <th class="bg-info">Nama Pegawai</th>
                            <th class="bg-info">Tanggal Dasar Surat</th>
                            <th class="bg-info">Maksud Surat</th>
                            <th class="bg-info">Tempat Berangkat</th>
                            <th class="bg-info">Tempat Tujuan</th>
                            <th class="bg-info">Lama Perjalanan</th>
                            <th class="bg-info">Tanggal Berangkat</th>
                            <th class="bg-info">Tanggal Pulang</th>
                            <th class="bg-info"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($account as $users) : ?>
                            <tr>
                                <td class="text-center" style="text-align: center;"><?= $counter ?></td>
                                <td class="text-center"><?= $users['nomor_stugas']; ?></td>
                                <td class="text-center"><?= $users['no_dasar_stugas']; ?></td>
                                <td class="text-center"><?= $users['kategori']; ?></td>
                                <td class="text-center"><?= $users['tgl_dasarsurat']; ?></td>
                                <td class="text-center"><?= $users['maksud_stugas']; ?></td>
                                <td class="text-center"><?= $users['tempat_brkt']; ?></td>
                                <td class="text-center"><?= $users['tempat_tujuan']; ?></td>
                                <td class="text-center"><?= $users['lama_perjalanan']; ?></td>
                                <td class="text-center"><?= $users['tgl_berangkat']; ?></td>
                                <td class="text-center"><?= $users['tgl_pulang']; ?></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btn-sm edit-button-tugas" data-bs-toggle="modal" data-bs-target="#exampleModal" data-nomor-stugas="<?= $users['nomor_stugas']; ?>" data-dasar-stugas="<?= $users['no_dasar_stugas']; ?>" data-kategori="<?= $users['kategori']; ?>" data-tgl-suratdasar="<?= $users['tgl_dasarsurat']; ?>" data-maksud-stugas="<?= $users['maksud_stugas']; ?>" data-tempat-brkt="<?= $users['tempat_brkt']; ?>" data-tempat-tujuan="<?= $users['tempat_tujuan']; ?>" data-lama-perjalanan="<?= $users['lama_perjalanan']; ?>" data-tgl-berangkat="<?= $users['tgl_berangkat']; ?>" data-tgl-pulang="<?= $users['tgl_pulang']; ?>" data-id="<?= $users['id_stugas']; ?>">Edit</button></td>
                            </tr>
                            <?php $counter++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>



            </div>
            <br>

            <form action=<?= base_url('ExportTugas') ?> method="post" id="download_tugas">
                <button type="button" class="btn btn-info" id="download_surat_tugas">Download</button>
            </form>
            <div class="pagination">
                <?= $pager->only(['page'])->links() ?>
            </div>
        </div>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content border border-info">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title " id="exampleModalLabel">Edit Surat Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=<?= base_url('update_stugas') ?> method="post" id="submit_stugas">
                        <input type="hidden" name="id" id="modal_id">
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="suratDari">No Surat Tugas</label>
                                <input type="text" class="form-control border border-dark" id="modal_nomor_stugas" name="modal_surat_tugas" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="nomorSurat">No Dasar Surat</label>
                                <input type="text" class="form-control border border-dark" id="modal_dasar_stugas" name="nomor_dasar" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="tglSurat">Nama Pegawai</label>
                                <textarea class="form-control border border-dark" id="modal_kategori" name="nama_pegawai" rows="4" cols="35" style="max-width: 300px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tglTerima">Tanggal Dasar Surat</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_suratdasar" name="tgl_dasar" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="nomorKendali">Maksud Surat</label>
                                <input type="text" class="form-control border border-dark" id="modal_maksud_stugas" name="maksud_surat" placeholder="Masukkan Nama Surat Dari" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="tujuKadin">Tempat berangkat</label>
                                <input type="text" class="form-control border border-dark" id="modal_tempat_brkt" name="tempat_berangkat" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="disposisi">Tempat Tujuan</label>
                                <input type="text" class="form-control border border-dark" id="modal_tujuan" name="tempat_tujuan" placeholder="Masukkan Nama Surat Dari" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="nomorSurat">Lama perjalanan</label>
                                <input type="text" class="form-control border border-dark" id="modal_lama_perjalanan" name="lama_perjalanan" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="disposisi">Tanggal Berangkat</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_berangkat" name="tgl_berangkat" placeholder="Masukkan Nama Surat Dari" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="nomorSurat">Tanggal Pulang</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_pulang" name="tgl_pulang" style="max-width: 300px;">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="send_stugas">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.edit-button-tugas').click(function() {
                var button = $(this);
                var id = button.data('id');
                var nomor_stugas = button.data('nomor-stugas');
                var dasar_stugas = button.data('dasar-stugas');
                var kategori = button.data('kategori');
                var tgl_suratdasar = button.data('tgl-suratdasar');
                var maksud_stugas = button.data('maksud-stugas');
                var tempat_brkt = button.data('tempat-brkt');
                var tempat_tujuan = button.data('tempat-tujuan');
                var lama_perjalanan = button.data('lama-perjalanan');
                var tgl_berangkat = button.data('tgl-berangkat');
                var tgl_pulang = button.data('tgl-pulang');

                function reverseFormatDate(dateString) {
                    var parts = dateString.split(' ');
                    var tanggal = parts[0];
                    var namaBulan = parts[1];
                    var tahun = parts[2];

                    // Daftar nama bulan dalam bahasa Indonesia
                    var namaBulanIndonesia = [
                        'January', 'February', 'March', 'April',
                        'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    ];

                    // Temukan indeks bulan dalam daftar nama bulan
                    var indeksBulan = namaBulanIndonesia.indexOf(namaBulan) + 1;
                    // Format bulan dan tanggal menjadi 'MM-DD-YYYY'
                    var bulanStr = (indeksBulan < 10 ? '0' : '') + indeksBulan;


                    // Gabungkan kembali dalam format yang sesuai
                    var tanggalKembali = tahun + '-' + bulanStr + '-' + tanggal;

                    return tanggalKembali;
                }
                //tgl_surat
                if (tgl_suratdasar) {
                    var konversi_tgl_suratdasar = reverseFormatDate(tgl_suratdasar);
                    var tgl_suratdasar_date = new Date(konversi_tgl_suratdasar);
                    var tanggal_surttgl_suratdasar = tgl_suratdasar_date.toISOString().slice(0, 10);
                    $('#modal_tgl_suratdasar').val(tanggal_surttgl_suratdasar);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_suratdasar').val(""); // Misalnya, mengosongkan nilai input.
                }
                //tgl_terima
                if (tgl_berangkat) {
                    var konversi_tgl_berangkat = reverseFormatDate(tgl_berangkat);
                    var tgl_berangkat_date = new Date(konversi_tgl_berangkat);
                    var tanggal_betgl_berangkat = tgl_berangkat_date.toISOString().slice(0, 10);
                    $('#modal_tgl_berangkat').val(tanggal_betgl_berangkat);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_berangkat').val(""); // Misalnya, mengosongkan nilai input.
                }
                //tgl_disposisi
                if (tgl_pulang) {
                    var konversi_tgl_pulang = reverseFormatDate(tgl_pulang);
                    var tgl_pulang_date = new Date(konversi_tgl_pulang);
                    var tanggal_pulangtgl_pulang = tgl_pulang_date.toISOString().slice(0, 10);
                    $('#modal_tgl_pulang').val(tanggal_pulangtgl_pulang);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_pulang').val(""); // Misalnya, mengosongkan nilai input.
                }
                // //tgl_kasi
                $('#modal_id').val(id);
                $('#modal_nomor_stugas').val(nomor_stugas);
                $('#modal_dasar_stugas').val(dasar_stugas);
                $('#modal_kategori').val(kategori);
                $('#modal_maksud_stugas').val(maksud_stugas);
                $('#modal_tempat_brkt').val(tempat_brkt);
                $('#modal_tujuan').val(tempat_tujuan);
                $('#modal_lama_perjalanan').val(lama_perjalanan);


            });
        });
    </script>
    <script>
        document.getElementById("send_stugas").addEventListener("click", function() {
            var form1 = document.getElementById("submit_stugas");
            form1.submit();
        });
    </script>
    <script>
        document.getElementById("download_surat_tugas").addEventListener("click", function() {
            var form2 = document.getElementById("download_tugas");
            form2.submit();
        });
    </script>
</body>

</html>