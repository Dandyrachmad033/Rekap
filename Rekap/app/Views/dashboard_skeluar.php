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
        <div class="text">Data Surat Keluar</div>
        <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
            <div class="scroll-table">

                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
                <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="excelFile" accept=".xlsx, .xls">
                    <input type="submit" value="Upload">
                </form>
                <table class="table table-striped table-bordered border-dark" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="bg-info">NO</th>
                            <th class="bg-info">Kategori</th>
                            <th class="bg-info">Tanggal Diterima</th>
                            <th class="bg-info">Tujuan</th>
                            <th class="bg-info">Tanggal Surat</th>
                            <th class="bg-info">Perihal</th>
                            <th class="bg-info"> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($account as $users) : ?>
                            <tr>
                                <td class="text-center "><?= $counter ?></td>
                                <td class="text-center"><?= $users['kategori']; ?></td>
                                <td class="text-center"><?= $users['tgl_terima']; ?></td>
                                <td class="text-center"><?= $users['tujuan']; ?></td>
                                <td class="text-center"><?= $users['tgl_surat']; ?></td>
                                <td class="text-center" style="width: 400px;"><?= $users['perihal']; ?></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btn-sm edit-button-keluar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-kategori="<?= $users['kategori']; ?>" data-tgl-terima="<?= $users['tgl_terima']; ?>" data-tujuan="<?= $users['tujuan']; ?>" data-tgl-surat="<?= $users['tgl_surat']; ?>" data-perihal="<?= $users['perihal']; ?>" data-id="<?= $users['id_suratkeluar']; ?>">Edit</button></td>
                            </tr>
                            <?php $counter++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <form action=<?= base_url('ExportKeluar') ?> method="post" id="download_keluar">
                    <button type="button" class="btn btn-info" id="download_surat_keluar">Download</button>
                </form>
                <br>
            </div>
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
                    <h5 class="modal-title " id="exampleModalLabel">Edit Surat Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=<?= base_url('update_skeluar') ?> method="post" id="submit_skeluar">
                        <input type="hidden" name="id" id="modal_id">
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="suratDari">Kategori</label>
                                <select class="form-control border border-dark" id="modal_kategori" name="kategori" style="max-width: 300px;">
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
                            <div class="form-group">
                                <label for="nomorSurat">Tanggal Terima</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_terima" name="tgl_terima" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="nomorKendali">Tujuan</label>
                                <input type="text" class="form-control border border-dark" id="modal_tujuan" name="tujuan" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="tglTerima">Tanggal Surat</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_surat" name="tgl_surat" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="tglSurat">Perihal</label>
                                <textarea class="form-control border border-dark" id="modal_perihal" name="perihal" rows="4" cols="35" style="max-width: 300px;"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="send_skeluar">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.getElementById("send_skeluar").addEventListener("click", function() {
            var form1 = document.getElementById("submit_skeluar");
            form1.submit();
        });
    </script>
    <script>
        document.getElementById("download_surat_keluar").addEventListener("click", function() {
            var form2 = document.getElementById("download_keluar");
            form2.submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.edit-button-keluar').click(function() {
                var button = $(this);
                var id = button.data('id');
                var kategori = button.data('kategori');
                var tgl_terima = button.data('tgl-terima');
                var tujuan = button.data('tujuan');
                var tgl_surat = button.data('tgl-surat');
                var perihal = button.data('perihal');

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
                if (tgl_terima) {
                    var konversi_tgl_terima = reverseFormatDate(tgl_terima);
                    var tgl_terima_date = new Date(konversi_tgl_terima);
                    var tanggal_surat_terima = tgl_terima_date.toISOString().slice(0, 10);
                    $('#modal_tgl_terima').val(tanggal_surat_terima);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_terima').val(""); // Misalnya, mengosongkan nilai input.
                }
                //tgl_terima
                if (tgl_surat) {
                    var konversi_tgl_surat = reverseFormatDate(tgl_surat);
                    var tgl_surat_date = new Date(konversi_tgl_surat);
                    var tanggal_surat_surat = tgl_surat_date.toISOString().slice(0, 10);
                    $('#modal_tgl_surat').val(tanggal_surat_surat);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_surat').val(""); // Misalnya, mengosongkan nilai input.
                }
                //tgl_disposisi
                // //tgl_kasi
                $('#modal_id').val(id);
                $('#modal_kategori').val(kategori);
                $('#modal_tujuan').val(tujuan);
                $('#modal_perihal').val(perihal);

            });
        });
    </script>

</body>

</html>