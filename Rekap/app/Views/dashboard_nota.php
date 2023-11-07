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
        <div class="text">Data Nota Dinas</div>
        <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
            <div class="scroll-table">

                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
                <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" name="excelFile" accept=".xlsx, .xls">
                    <input type="submit" value="Upload">
                </form>
                <table class=" table table-striped table-bordered border-dark" style="width: 100%">
                    <thead>
                        <tr>
                            <th class="bg-info">NO</th>
                            <th class="bg-info">Tanggal Nota</th>
                            <th class="bg-info">Nota Dari</th>
                            <th class="bg-info">Nomor Surat</th>
                            <th class="bg-info">Perihal</th>
                            <th class="bg-info">Keterangan</th>
                            <th class="bg-info"> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($account as $users) : ?>
                            <tr class="text-center">
                                <td style="text-align: center;"><?= $counter ?></td>
                                <td><?= $users['tgl_nota']; ?></td>
                                <td><?= $users['nota_dari']; ?></td>
                                <td><?= $users['nomor_surat']; ?></td>
                                <td><?= $users['perihal']; ?></td>
                                <td style="width: 400px;"><?= $users['keterangan']; ?></td>
                                <td class="text-center"><button type="button" class="btn btn-warning btn-sm edit-button-nota" data-bs-toggle="modal" data-bs-target="#exampleModal" data-tgl-nota="<?= $users['tgl_nota']; ?>" data-nota-dari="<?= $users['nota_dari']; ?>" data-nomor-surat="<?= $users['nomor_surat']; ?>" data-perihal="<?= $users['perihal']; ?>" data-keterangan="<?= $users['keterangan']; ?>" data-id="<?= $users['id_nota']; ?>">Edit</button></td>
                            </tr>
                            <?php $counter++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <div class="pagination">
                    <?= $pager->only(['page'])->links() ?>
                </div>
                <br>

                <form action=<?= base_url('ExportNota') ?> method="post" id="download_nota">
                    <button type="button" class="btn btn-info" id="download_nota_dinas">Download</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content border border-info">
                <div class="modal-header bg-info text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Nota Dinas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=<?= base_url('update_nota') ?> method="post" id="submit_nota">
                        <input type="hidden" name="id" id="modal_id">
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="suratDari">Tanggal Nota</label>
                                <input type="date" class="form-control border border-dark" id="modal_tgl_nota" name="tgl_nota" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="nomorSurat">Nota Dari</label>
                                <input type="text" class="form-control border border-dark" id="modal_nota_dari" name="nota_dari" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="nomorKendali">Nomor Surat</label>
                                <input type="text" class="form-control border border-dark" id="modal_nomor_surat" name="nomorsurat" style="max-width: 300px;">
                            </div>
                            <div class="form-group">
                                <label for="tglTerima">Perihal</label>
                                <input type="text" class="form-control border border-dark" id="modal_perihal" name="perihal" style="max-width: 300px;">
                            </div>
                        </div>
                        <div class="two-field" style="padding-left: 40px;">
                            <div class="form-group">
                                <label for="tglSurat">Keterangan</label>
                                <textarea class="form-control border border-dark" id="modal_keterangan" name="keterangan" rows="4" cols="35" style="max-width: 300px;"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="send_nota">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.getElementById("send_nota").addEventListener("click", function() {
            var form1 = document.getElementById("submit_nota");
            form1.submit();
        });
    </script>
    <script>
        document.getElementById("download_nota_dinas").addEventListener("click", function() {
            var form2 = document.getElementById("download_nota");
            form2.submit();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.edit-button-nota').click(function() {
                var button = $(this);
                var id = button.data('id');
                var tgl_nota = button.data('tgl-nota');
                var nota_dari = button.data('nota-dari');
                var nomor_surat = button.data('nomor-surat');
                var perihal = button.data('perihal');
                var keterangan = button.data('keterangan');

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
                if (tgl_nota) {
                    var konversi_tgl_nota = reverseFormatDate(tgl_nota);
                    var tgl_nota_date = new Date(konversi_tgl_nota);
                    var tanggal_nota_nota = tgl_nota_date.toISOString().slice(0, 10);
                    $('#modal_tgl_nota').val(tanggal_nota_nota);
                } else {
                    // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
                    $('#modal_tgl_nota').val(""); // Misalnya, mengosongkan nilai input.
                }


                $('#modal_id').val(id);
                $('#modal_nota_dari').val(nota_dari);
                $('#modal_nomor_surat').val(nomor_surat);
                $('#modal_perihal').val(perihal);
                $('#modal_keterangan').val(keterangan);

            });
        });
    </script>

</body>

</html>