<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>


</head>

<body>
    <?php
    include('sidebar.php');
    ?>

    <section class="home-section">
        <div class="text">Siarvi Convert</div>
        <div class="book  shadow p-3 mb-5 bg-white rounded border border-info">
            <div class="pagination-info">
                <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
            </div>
            <div class="scroll-table fixed_header">


                <div class="mb-3">
                    <label for="formFile" class="form-label">Pilih File</label>
                    <input class="form-control" type="file" id="formFile">
                </div>


                <div class="setara" style="display: flex;margin-bottom:20px">
                    <form action=<?= base_url('Delete') ?> method="post" id="delete_local_upload">
                        <button type="button" class="btn btn-danger btn-sm" style="margin-right: 10px;" id="delete_file">Delete</button>
                    </form>
                    <form action=<?= base_url('Export') ?> method="post" id="download_local_upload">
                        <button type="button" class="btn btn-info btn-sm" id="download_file">Download</button>
                    </form>

                </div>

                <table class="table border table-striped bg-info">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Nama ibu</th>
                        <th>Alamat(KTP)</th>
                        <th>Alamat Domisili</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                    </tr>

                    <?php foreach ($records as $record) : ?>
                        <tr>
                            <td><?php echo $record['id']; ?></td>
                            <td><?php echo $record['tanggal_pemeriksaan']; ?></td>
                            <td><?php echo $record['nama']; ?></td>
                            <td><?php echo $record['NIK']; ?></td>
                            <td><?php echo $record['nama_ibu_kandung']; ?></td>
                            <td><?php echo $record['alamat']; ?></td>
                            <td><?php echo $record['alamat_domisili']; ?></td>
                            <td><?php echo $record['tanggal_lahir']; ?></td>
                            <td style="width: fit-content;"><?php echo $record['jenis_kelamin']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>




            </div>
            <center>

                <div class="pagination">
                    <?= $pager->links() ?>
                </div>
            </center>
        </div>


    </section>

    <script>
        // Fungsi untuk mengganti query parameter 'page' pada URL dan berpindah halaman
        function goToPage(pageNumber) {
            const currentURL = new URL(window.location.href);
            currentURL.searchParams.set('page', pageNumber);
            window.location.href = currentURL.href;
        }
    </script>
    <script>
        document.getElementById("delete_local_upload").addEventListener("click", function() {
            var form1 = document.getElementById("delete_file");
            form1.submit();
        });
    </script>
    <script>
        document.getElementById("download_local_upload").addEventListener("click", function() {
            var form2 = document.getElementById("download_file");
            form2.submit();
        });
    </script>

</body>

</html>