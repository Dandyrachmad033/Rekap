<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href=<?= base_url('images/logos.jpg') ?>>

  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=<?= base_url('css/dashboard.css') ?>>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

  <?php
  include('sidebar.php');
  ?>

  <section class="home-section">
    <div class="text">Data Surat Masuk</div>
    <div class="book shadow p-3 mb-5 bg-white rounded border border-info">
      <p>Page <?= $currentpage ?> of <?= $totalpages ?></p>
      <form action="<?= base_url('Load') ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="excelFile" accept=".xlsx, .xls">
        <input type="submit" value="Upload">
      </form>
      <div class="scroll-table fixed_header" id="header-container">
        <table class=" table-striped table-bordered border-dark" style="width: 100%">
          <thead>
            <tr>
              <th class="bg-info">NO</th>
              <th class="bg-info" style="max-width: 250px;">Asal Surat</th>
              <th class="bg-info">No.surat</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Surat</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Terima</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">No.Kendali</th>
              <th class="bg-info">Perihal</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Tujuan Kadin</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Disposisi Kadin</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Disposisi</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Tujuan Kabid</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Disposisi Kabid</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Kabid</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Tujuan Kasubag</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Disposisi Kasubag</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Kasubag</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Tujuan Kasi</th>
              <th class="bg-info">Disposisi kasi</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Kasi</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Tujuan sekdin</th>
              <th class="bg-info" style="max-width: 500px; word-wrap: break-word;">Disposisi Sekdin</th>
              <th class="bg-info" style="max-width: 500px; ">Tanggal Sekretaris</th>
              <th class="bg-info"></th>
            </tr>
          </thead>
          <tbody>
            <?php $counter = 1; ?>
            <?php foreach ($account as $users) : ?>
              <tr>
                <td class="text-center" style="text-align: center;"><?= $counter; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['surat_dari']; ?></td>
                <td class="text-center" style="max-width: 600px word-wrap: break-word;"><?= $users['nomor_surat']; ?></td>
                <td class="text-center" style="max-width: 500px; word-wrap: break-word: "><?= $users['tgl_surat']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_terima']; ?></td>
                <td class="text-center"><?= $users['nomor_kendali']; ?></td>
                <td class="text-center" style="max-width: 300px; word-wrap: break-word"><?= $users['perihal']; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kadin']; ?></td>
                <td class="text-center" style="word-wrap: break-word; max-width: 20px"><?= $users['disposisi']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_disposisi']; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kabid']; ?></td>
                <td class="text-center" style=" max-width:600px word-wrap: break-word; "><?= $users['kabid']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_kabid']; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kasubag']; ?></td>
                <td class="text-center" style=" max-width:600px word-wrap: break-word;"><?= $users['kasubag']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_kasubag']; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['tuju_kasi']; ?></td>
                <td class="text-center" style="word-wrap: break-word;"><?= $users['kasi']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_kasi']; ?></td>
                <td class="text-center" style="max-width: 600px word-wrap: break-word;"><?= $users['tuju_sekdin']; ?></td>
                <td class="text-center" style="max-width:600px word-wrap: break-word;"><?= $users['sekre']; ?></td>
                <td class="text-center" style="max-width:600px "><?= $users['tgl_sekre']; ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm edit-button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-surat-dari="<?= $users['surat_dari']; ?>" data-nomor-surat="<?= $users['nomor_surat']; ?>" data-nomor-kendali="<?= $users['nomor_kendali']; ?>" data-tuju-kadin="<?= $users['tuju_kadin']; ?>" data-disposisi="<?= $users['disposisi'];  ?>" data-kabid="<?= $users['kabid'];  ?>" data-kasi="<?= $users['kasi'];  ?>" data-kasubag="<?= $users['kasubag'];  ?>" data-sekre="<?= $users['sekre'];  ?>" data-tuju-kabid="<?= $users['tuju_kabid'];  ?>" data-tuju-kasi="<?= $users['tuju_kasi'];  ?>" data-tuju-kasubag="<?= $users['tuju_kasubag'];  ?>" data-tuju-sekre="<?= $users['tuju_sekdin'];  ?>" data-perihal="<?= $users['perihal'];  ?>" data-tgl-surat="<?= $users['tgl_surat'];  ?>" data-tgl-terima="<?= $users['tgl_terima'];  ?>" data-tgl-disposisi="<?= $users['tgl_disposisi']; ?>" data-tgl-kabid="<?= $users['tgl_kabid']; ?>" data-tgl-kasubag="<?= $users['tgl_kasubag']; ?>" data-tgl-kasi="<?= $users['tgl_kasi']; ?>" data-tgl-sekre="<?= $users['tgl_sekre']; ?>" data-id="<?= $users['id']; ?>">
                    Edit
                  </button>

                </td>

                </td>
              </tr>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <br>
      <div>
        <form action=<?= base_url('Download') ?> method="post" id="download_surat">
          <button type="button" class="btn btn-info" id="download_surat_masuk">Download</button>
        </form>

      </div>
      <div class="pagination">
        <?= $pager->only(['page'])->links() ?>
      </div>

    </div>
  </section>

  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content border-info">
        <div class="modal-header bg-info text-center">
          <h5 class="modal-title " id="exampleModalLabel">Edit Surat Masuk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action=<?= base_url('update_data') ?> method="post" id="submit_data">
            <input type="hidden" name="id" id="modal_id">
            <div class="two-field" style="padding-left: 40px; margin-bottom:15px">
              <div class="form-group">
                <label for="suratDari">Surat Dari</label>
                <input type="text" class="form-control border border-dark" id="modal_surat_dari" name="surat_dari" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Nomor Surat</label>
                <input type="text" class="form-control border border-dark" id="modal_nomor_surat" name="nomorSurat" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="tglSurat">Tanggal Surat</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_surat" name="tglSurat" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="tglTerima">Tanggal Terima</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_terima" name="tglTerima" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="nomorKendali">Nomor Kendali</label>
                <input type="text" class="form-control border border-dark" id="modal_nomor_kendali" name="nomorKendali" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="tujuKadin">Tujuan Kadin</label>
                <input type="text" class="form-control border border-dark" id="modal_tuju_kadin" name="tujuKadin" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="disposisi">Disposisi Kadin</label>
                <input type="text" class="form-control border border-dark" id="modal_disposisi" name="disposisi" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Masukkan Tanggal</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_disposisi" name="tanggal_Surat" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="disposisi">Nama Kabid</label>
                <input type="text" class="form-control border border-dark" id="modal_kabid" name="kabid" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Tanggal Kabid</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_kabid" name="tgl_kabid" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="disposisi">Nama kasi</label>
                <input type="text" class="form-control border border-dark" id="modal_kasi" name="kasi" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Tanggal Kasi</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_kasi" name="tgl_kasi" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="disposisi">Nama Kasubag</label>
                <input type="text" class="form-control border border-dark" id="modal_kasubag" name="kasubag" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Tanggal Kasubag</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_kasubag" name="tgl_kasubag" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="disposisi">Nama sekre</label>
                <input type="text" class="form-control border border-dark" id="modal_sekre" name="sekre" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Tanggal sekre</label>
                <input type="date" class="form-control border border-dark" id="modal_tgl_sekre" name="tgl_sekre" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="suratDari">Tujuan Kabid</label>
                <input type="text" class="form-control border border-dark" id="modal_tuju_kabid" name="tuju_kabid" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="nomorSurat">Tujuan Kasi</label>
                <input type="text" class="form-control border border-dark" id="modal_tuju_kasi" name="tuju_kasi" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="nomorSurat">Tujuan sekre</label>
                <input type="text" class="form-control border border-dark" id="modal_tuju_sekre" name="tuju_sekre" style="max-width: 300px;">
              </div>
              <div class="form-group">
                <label for="suratDari">Tujuan Kasubag</label>
                <input type="text" class="form-control border border-dark" id="modal_tuju_kasubag" name="tuju_kasubag" style="max-width: 300px;">
              </div>
            </div>
            <div class="two-field" style="padding-left: 40px;margin-bottom:15px">
              <div class="form-group">
                <label for="nomorSurat">Perihal</label>
                <textarea class="form-control border border-dark" id="modal_perihal" name="perihal" placeholder="perihal" rows="4" cols="35" style="max-width: 300px;"></textarea>
              </div>

            </div>
          </form>
        </div>
        <div class="modal-footer bg-info">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" id="send_data">Save changes</button>
        </div>
      </div>
    </div>
  </div>



  <script src="<?= base_url('js/script.js') ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.edit-button').click(function() {
        var button = $(this);
        var id = button.data('id');
        var suratDari = button.data('surat-dari');
        var nomorSurat = button.data('nomor-surat');
        var nomorKendali = button.data('nomor-kendali');
        var tujuKadin = button.data('tuju-kadin');
        var disposisi = button.data('disposisi');
        var kabid = button.data('kabid');
        var kasi = button.data('kasi');
        var kasubag = button.data('kasubag');
        var tuju_kabid = button.data('tuju-kabid');
        var tuju_kasi = button.data('tuju-kasi');
        var tuju_kasubag = button.data('tuju-kasubag');
        var perihal = button.data('perihal');
        var sekre = button.data('sekre');
        var tuju_sekre = button.data('tuju-sekre');
        var tgl_surat = button.data('tgl-surat');
        var tgl_terima = button.data('tgl-terima');
        var tgl_disposisi = button.data('tgl-disposisi');
        var tgl_kabid = button.data('tgl-kabid');
        var tgl_kasi = button.data('tgl-kasi');
        var tgl_kasubag = button.data('tgl-kasubag');
        var tgl_sekre = button.data('tgl-sekre');

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
        var konversi_tgl_surat = reverseFormatDate(tgl_surat);
        var tgl_surat_date = new Date(konversi_tgl_surat);
        var tanggal_surat = tgl_surat_date.toISOString().slice(0, 10);
        //tgl_terima
        var konversi_tgl_terima = reverseFormatDate(tgl_terima);
        var tgl_terima_date = new Date(konversi_tgl_terima);
        var tanggal_terima = tgl_terima_date.toISOString().slice(0, 10);
        //tgl_disposisi
        var konversi_tgl_disposisi = reverseFormatDate(tgl_disposisi);
        var tgl_disposisi_date = new Date(konversi_tgl_disposisi);
        var tanggal_disposisi = tgl_disposisi_date.toISOString().slice(0, 10);
        // //tgl_kasi
        if (tgl_kasi) {
          var konversi_tgl_kasi = reverseFormatDate(tgl_kasi);
          var tgl_kasi_date = new Date(konversi_tgl_kasi);
          var tanggal_kasi = tgl_kasi_date.toISOString().slice(0, 10);
          $('#modal_tgl_kasi').val(tanggal_kasi);
        } else {
          // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
          $('#modal_tgl_kasi').val(""); // Misalnya, mengosongkan nilai input.
        }
        // //tgl_kabid
        if (tgl_kabid) {
          var konversi_tgl_kabid = reverseFormatDate(tgl_kabid);
          var tgl_kabid_date = new Date(konversi_tgl_kabid);
          var tanggal_kabid = tgl_kabid_date.toISOString().slice(0, 10);
          $('#modal_tgl_kabid').val(tanggal_kabid);
        } else {
          // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
          $('#modal_tgl_kabid').val(""); // Misalnya, mengosongkan nilai input.
        }
        // //tgl_kasubag
        if (tgl_kasubag) {
          var konversi_tgl_kasubag = reverseFormatDate(tgl_kasubag);
          var tgl_kasubag_date = new Date(konversi_tgl_kasubag);
          var tanggal_kasubag = tgl_kasubag_date.toISOString().slice(0, 10);
          $('#modal_tgl_kasubag').val(tanggal_kasubag);
        } else {
          // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
          $('#modal_tgl_kasubag').val(""); // Misalnya, mengosongkan nilai input.
        }
        // //tgl_sekre
        if (tgl_sekre) {
          var konversi_tgl_sekre = reverseFormatDate(tgl_sekre);
          var tgl_sekre_date = new Date(konversi_tgl_sekre);
          var tanggal_sekre = tgl_sekre_date.toISOString().slice(0, 10);
          $('#modal_tgl_sekre').val(tanggal_sekre);
        } else {
          // Tanggal kosong, Anda dapat memberikan nilai default atau melakukan tindakan lain sesuai kebutuhan.
          $('#modal_tgl_sekre').val(""); // Misalnya, mengosongkan nilai input.
        }




        $('#modal_id').val(id);
        $('#modal_surat_dari').val(suratDari);
        $('#modal_nomor_surat').val(nomorSurat);
        $('#modal_nomor_kendali').val(nomorKendali);
        $('#modal_tuju_kadin').val(tujuKadin);
        $('#modal_disposisi').val(disposisi);
        $('#modal_kabid').val(kabid);
        $('#modal_kasi').val(kasi);
        $('#modal_kasubag').val(kasubag);
        $('#modal_tuju_kabid').val(tuju_kabid);
        $('#modal_tuju_kasi').val(tuju_kasi);
        $('#modal_tuju_kasubag').val(tuju_kasubag);
        $('#modal_perihal').val(perihal);
        $('#modal_sekre').val(sekre);
        $('#modal_tuju_sekre').val(tuju_sekre);
        $('#modal_tgl_surat').val(tanggal_surat);
        $('#modal_tgl_terima').val(tanggal_terima);
        $('#modal_tgl_disposisi').val(tanggal_disposisi);



      });
    });
  </script>
  <script>
    document.getElementById("send_data").addEventListener("click", function() {
      var form1 = document.getElementById("submit_data");
      form1.submit();
    });
  </script>
  <script>
    document.getElementById("download_surat_masuk").addEventListener("click", function() {
      var form2 = document.getElementById("download_surat");
      form2.submit();
    });
  </script>




</body>

</html>