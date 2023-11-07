<?php

namespace App\Controllers;

use App\Models\dbdModel;
use App\Models\suratkeluarModel;
use App\Models\p2pmModel;
use App\Models\notadinasModel;
use App\Models\surattugasModel;

use DateTime;

class dashboard extends BaseController
{

    // View Tabel Semua surat
    public function dash()
    {
        $session = session();
        if ($session->isLoggedIn) {
            $model = new p2pmModel();
            $username = $session->username;
            $datauser['username'] = $username;
            $totalRows = $model->countAll();
            $perPage = 20;
            $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
            $totalPages = ceil($totalRows / $perPage);
            $model->orderBy('id', 'desc');
            $data = $model->paginate($perPage);


            $pagers = $model->pager;

            function formatDate($date)
            {
                if (!empty($date)) {
                    $dateObj = new DateTime($date);
                    return $dateObj->format('d F Y');
                } else {
                    return ''; // Ganti dengan tanda hubung jika tanggal kosong
                }
            }

            foreach ($data as &$account) {
                $tglSurat = formatDate($account['tgl_surat']);
                $account['tgl_surat'] = $tglSurat;

                $tglterima = formatDate($account['tgl_terima']);
                $account['tgl_terima'] = $tglterima;

                $tgldisposisi = formatDate($account['tgl_disposisi']);
                $account['tgl_disposisi'] = $tgldisposisi;

                $tglkabid = formatDate($account['tgl_kabid']);
                $account['tgl_kabid'] = $tglkabid;

                $tglkasubag = formatDate($account['tgl_kasubag']);
                $account['tgl_kasubag'] = $tglkasubag;

                $tglkasi = formatDate($account['tgl_kasi']);
                $account['tgl_kasi'] = $tglkasi;

                $tglsekre = formatDate($account['tgl_sekre']);
                $account['tgl_sekre'] = $tglsekre;
            }

            return view(
                'dashboard',
                [
                    'username' => $username,
                    'account' => $data,
                    'pager' => $pagers,
                    'currentpage' => $currentPage,
                    'totalpages' => $totalPages,
                ]
            );
        } else {
            // Jika pengguna belum login, alihkan ke halaman login
            return redirect()->route('/');
        }
    }

    public function dash_skeluar()
    {
        $session = session();
        $db = new suratkeluarModel();
        $username = $session->username;
        $datauser['username'] = $username;
        $totalRows = $db->countAll();
        $perPage = 20;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $totalPages = ceil($totalRows / $perPage);
        $db->orderBy('id_suratkeluar', 'desc');
        $data = $db->paginate($perPage);
        $pagers = $db->pager;

        function formatDate($date)
        {
            if (!empty($date)) {
                $dateObj = new DateTime($date);
                return $dateObj->format('d F Y');
            } else {
                return ''; // Ganti dengan tanda hubung jika tanggal kosong
            }
        }

        foreach ($data as &$account) {
            $tglSurat = formatDate($account['tgl_surat']);
            $account['tgl_surat'] = $tglSurat;

            $tglterima = formatDate($account['tgl_terima']);
            $account['tgl_terima'] = $tglterima;
        }

        return view(
            'dashboard_skeluar',
            [
                'username' => $username,
                'account' => $data,
                'pager' => $pagers,
                'currentpage' => $currentPage,
                'totalpages' => $totalPages,
            ]
        );
    }

    public function dash_stugas()
    {
        $session = session();
        $db = new surattugasModel();
        $username = $session->username;
        $datauser['username'] = $username;
        $totalRows = $db->countAll();
        $perPage = 20;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $totalPages = ceil($totalRows / $perPage);
        $db->orderBy('id_stugas', 'desc');
        $data = $db->paginate($perPage);
        $pagers = $db->pager;

        function formattanggal($date)
        {
            if (!empty($date)) {
                $dateObj = new DateTime($date);
                return $dateObj->format('d F Y');
            } else {
                return ''; // Ganti dengan tanda hubung jika tanggal kosong
            }
        }

        foreach ($data as &$account) {
            $tgldasarsurat = formattanggal($account['tgl_dasarsurat']);
            $account['tgl_dasarsurat'] = $tgldasarsurat;

            $tglberangkat = formattanggal($account['tgl_berangkat']);
            $account['tgl_berangkat'] = $tglberangkat;

            $tglpulang = formattanggal($account['tgl_pulang']);
            $account['tgl_pulang'] = $tglpulang;
        }

        return view(
            'dashboard_stugas',
            [
                'username' => $username,
                'account' => $data,
                'pager' => $pagers,
                'currentpage' => $currentPage,
                'totalpages' => $totalPages,
            ]
        );
    }

    public function dash_notad()
    {
        $session = session();
        $db = new notadinasModel();
        $username = $session->username;
        $datauser['username'] = $username;
        $totalRows = $db->countAll();
        $perPage = 20;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $totalPages = ceil($totalRows / $perPage);
        $db->orderBy('id_nota', 'desc');
        $data = $db->paginate($perPage);
        $pagers = $db->pager;

        function formattgl($date)
        {
            if (!empty($date)) {
                $dateObj = new DateTime($date);
                return $dateObj->format('d F Y');
            } else {
                return ''; // Ganti dengan tanda hubung jika tanggal kosong
            }
        }

        foreach ($data as &$account) {
            $tglSurat = formattgl($account['tgl_nota']);
            $account['tgl_nota'] = $tglSurat;
        }

        return view(
            'dashboard_nota',
            [
                'username' => $username,
                'account' => $data,
                'pager' => $pagers,
                'currentpage' => $currentPage,
                'totalpages' => $totalPages,
            ]
        );
    }

    public function menu()
    {
        $session = session();
        $username = $session->username;
        $datauser['username'] = $username;
        return view('surat_masuk', $datauser);
    }

    // Add data input semua surat
    public function addData()
    {
        $model = new p2pmModel();
        $suratdari = $this->request->getVar('suratDari');
        $nomorsurat = $this->request->getVar('nomorSurat');

        $tanggalsurat = $this->request->getVar('tanggalsurat');
        $tglsurat = !empty($tanggalsurat) ? date('Y-m-d', strtotime($tanggalsurat)) : null;

        $tanggalterima = $this->request->getVar('tanggalterima');
        $tglterima = !empty($tanggalterima) ? date('Y-m-d', strtotime($tanggalterima)) : null;

        $kendali = $this->request->getVar('kendali');
        $teruskankepada = $this->request->getVar('teruskankepada');
        $Disposisi = $this->request->getVar('Disposisi');

        $tgldisposisi = $this->request->getVar('tgldisposisi');
        $tglposisi = !empty($tgldisposisi) ? date('Y-m-d', strtotime($tgldisposisi)) : null;

        $perihal = $this->request->getVar('perihal');

        $formkabid = $this->request->getVar('formkabid');

        $tanggalkabid = $this->request->getVar('tanggalkabid');
        $tglkabid = !empty($tanggalkabid) ? date('Y-m-d', strtotime($tanggalkabid)) : null;

        $formkasubag = $this->request->getVar('formkasubag');
        $tanggalkasubag = $this->request->getVar('tanggalkasubag');
        $tglkasubag = !empty($tanggalkasubag) ? date('Y-m-d', strtotime($tanggalkasubag)) : null;


        $formkasi = $this->request->getVar('formkasi');
        $tanggalkasi = $this->request->getVar('tanggalkasi');
        $tglkasi = !empty($tanggalkasi) ? date('Y-m-d', strtotime($tanggalkasi)) : null;


        $formsekre = $this->request->getVar('formsekre');
        $tanggalsekre = $this->request->getVar('tanggalsekre');
        $tglsekre = !empty($tanggalsekre) ? date('Y-m-d', strtotime($tanggalsekre)) : null;
        $tujukadin = $this->request->getVar('tujudisposisi');
        $tujukabid = $this->request->getVar('tujukabid');
        $tujukasubag = $this->request->getVar('tujukasubag');
        $tujukasi = $this->request->getVar('tujukasi');
        $tujusekdin = $this->request->getVar('tujusekre');

        $addData = [
            'surat_dari' => $suratdari,
            'nomor_surat' => $nomorsurat,
            'tgl_surat' => $tglsurat,
            'tgl_terima' => $tglterima,
            'nomor_kendali' => $kendali,
            'disposisi' => $Disposisi,
            'tgl_disposisi' => $tglposisi,
            'perihal' => $perihal,
            'kabid' => $formkabid,
            'tgl_kabid' => $tglkabid,
            'kasubag' => $formkasubag,
            'tgl_kasubag' => $tglkasubag,
            'kasi' => $formkasi,
            'tgl_kasi' => $tglkasi,
            'sekre' => $formsekre,
            'tgl_sekre' =>  $tglsekre,
            'tuju_kadin' => $tujukadin,
            'tuju_kabid' => $tujukabid,
            'tuju_kasubag' => $tujukasubag,
            'tuju_kasi' => $tujukasi,
            'tuju_sekdin' => $tujusekdin

        ];

        $model->insert($addData);

        return view('surat_masuk');
    }

    public function plusdata()
    {
        $db = new suratkeluarModel();
        $kategori = $this->request->getVar('kategori');
        $tujuan = $this->request->getVar('tujuan');
        $tanggalterima = $this->request->getVar('tanggalterima');
        $tglterima = !empty($tanggalterima) ? date('Y-m-d', strtotime($tanggalterima)) : null;
        $tanggalsurat = $this->request->getVar('tanggalsurat');
        $tglsurat = !empty($tanggalsurat) ? date('Y-m-d', strtotime($tanggalsurat)) : null;
        $perihal = $this->request->getVar('perihal');

        $addData = [
            'kategori' => $kategori,
            'tgl_terima' => $tglterima,
            'tujuan' => $tujuan,
            'tgl_surat' => $tglsurat,
            'perihal' => $perihal
        ];
        $db->insert($addData);
        return view('surat_keluar');
    }

    public function increase()
    {
        $db = new notadinasModel();
        $notadari = $this->request->getVar('dari');
        $perihal = $this->request->getVar('perihal');
        $tanggal = $this->request->getVar('tanggal');
        $tgl = !empty($tanggal) ? date('Y-m-d', strtotime($tanggal)) : null;
        $nomorsurat = $this->request->getVar('nomorsurat');
        $keterangan = $this->request->getVar('keterangan');

        $addData = [
            'nota_dari' => $notadari,
            'tgl_nota' => $tgl,
            'perihal' => $perihal,
            'nomor_surat' => $nomorsurat,
            'keterangan' => $keterangan
        ];
        $db->insert($addData);
        return view('nota_dinas');
    }

    public function insert_data()
    {
        $db = new surattugasModel();
        $nomorstugas = $this->request->getVar('nomorsurattugas');
        $nomordasar = $this->request->getVar('nomordasar');
        $checkbox = $this->request->getPost('option');
        $selectedOptionsString = implode(', ', $checkbox);
        $tanggaldasarsurat = $this->request->getVar('tanggaldasarsurat');
        $tgldasarsurat = !empty($tanggaldasarsurat) ? date('Y-m-d', strtotime($tanggaldasarsurat)) : null;
        $maksudsurat = $this->request->getVar('maksudsurat');
        $lamaperjalanan = $this->request->getVar('lamaperjalanan');
        $tempatberangkat = $this->request->getVar('tempatberangkat');
        $tempattujuan = $this->request->getVar('tempattujuan');
        $tanggalberangkat = $this->request->getVar('tanggalberangkat');
        $tglberangkat = !empty($tanggalberangkat) ? date('Y-m-d', strtotime($tanggalberangkat)) : null;
        $tanggalpulang = $this->request->getVar('tanggalpulang');
        $tglpulang = !empty($tanggalpulang) ? date('Y-m-d', strtotime($tanggalpulang)) : null;



        $addData = [
            'nomor_stugas' => $nomorstugas,
            'no_dasar_stugas' => $nomordasar,
            'kategori' => $selectedOptionsString,
            'tgl_dasarsurat' => $tgldasarsurat,
            'maksud_stugas' => $maksudsurat,
            'tempat_brkt' => $tempatberangkat,
            'tempat_tujuan' => $tempattujuan,
            'lama_perjalanan' => $lamaperjalanan,
            'tgl_berangkat' => $tglberangkat,
            'tgl_pulang' => $tglpulang,
        ];
        $db->insert($addData);
        return view('surat_tugas');
    }

    public function menu_two()
    {

        $db = new dbdModel();
        $perPage = 50; // Jumlah data per halaman
        $totalRows = $db->countAll();
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $totalPages = ceil($totalRows / $perPage);
        $records = $db->paginate($perPage);
        $pagers = $db->pager;
        $session = session();
        $username = $session->username;
        return view(
            'local_upload',
            [
                'records' => $records,
                'pager' => $pagers,
                'currentpage' => $currentPage,
                'totalpages' => $totalPages,
                'username' => $username
            ]
        );
    }

    public function menu_tree()
    {
        $session = session();
        $db = new suratkeluarModel();
        $username = $session->username;
        $datauser['username'] = $username;
        return view('surat_keluar', $datauser);
    }

    public function menu_four()
    {
        $session = session();
        $username = $session->username;
        $datauser['username'] = $username;
        return view('nota_dinas', $datauser);
    }

    public function menu_five()
    {
        $session = session();
        $username = $session->username;
        $datauser['username'] = $username;
        return view('surat_tugas', $datauser);
    }

    public function welcome()
    {
        $session = session();
        if ($session->isLoggedIn) {
            $username = $session->username;
            $datauser['username'] = $username;
            return view('welcome_dashboard', $datauser);
        } else {
            return view('page_welcome');
        }
    }


    // Update All data
    public function updatedata()
    {
        $p2pm_model = new p2pmModel();
        $id = $this->request->getVar('id');
        $surat_dari = $this->request->getVar('surat_dari');
        $nomor_surat = $this->request->getVar('nomorSurat');
        $tgl_surat = $this->request->getVar('tglSurat');
        $tgl_terima = $this->request->getVar('tglTerima');
        $nomor_kendali = $this->request->getVar('nomorKendali');
        $tuju_kadin = $this->request->getVar('tujuKadin');
        $disposisi = $this->request->getVar('disposisi');
        $tanggal_surat = $this->request->getVar('tanggal_Surat');
        $kabid = $this->request->getVar('kabid');
        $tgl_kabid = $this->request->getVar('tgl_kabid');
        $tanggal_kabid = !empty($tgl_kabid) ? $tgl_kabid : null;
        $kasi = $this->request->getVar('kasi');
        $tgl_kasi = $this->request->getVar('tgl_kasi');
        $tanggal_kasi = !empty($tgl_kasi) ? $tgl_kasi : null;
        $kasubag = $this->request->getVar('kasubag');
        $tgl_kasubag = $this->request->getVar('tgl_kasubag');
        $tanggal_kasubag = !empty($tgl_kasubag) ? $tgl_kasubag : null;
        $sekre = $this->request->getVar('sekre');
        $tgl_sekre = $this->request->getVar('tgl_sekre');
        $tanggal_sekre = !empty($tgl_sekre) ? $tgl_sekre : null;
        $tuju_kabid = $this->request->getVar('tuju_kabid');
        $tuju_kasubag = $this->request->getVar('tuju_kasubag');
        $tuju_kasi = $this->request->getVar('tuju_kasi');
        $tuju_sekre = $this->request->getVar('tuju_sekre');
        $perihal = $this->request->getVar('perihal');


        $updatedata = [
            'surat_dari' => $surat_dari,
            'nomor_surat' => $nomor_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_terima' => $tgl_terima,
            'nomor_kendali' => $nomor_kendali,
            'disposisi' => $disposisi,
            'tgl_disposisi' => $tanggal_surat,
            'perihal' => $perihal,
            'kabid' => $kabid,
            'tgl_kabid' => $tanggal_kabid,
            'kasubag' => $kasubag,
            'tgl_kasubag' => $tanggal_kasubag,
            'kasi' => $kasi,
            'tgl_kasi' => $tanggal_kasi,
            'sekre' => $sekre,
            'tgl_sekre' =>  $tanggal_sekre,
            'tuju_kadin' => $tuju_kadin,
            'tuju_kabid' => $tuju_kabid,
            'tuju_kasubag' => $tuju_kasubag,
            'tuju_kasi' => $tuju_kasi,
            'tuju_sekdin' => $tuju_sekre

        ];

        $p2pm_model->where('id', $id)->set($updatedata)->update();

        return redirect()->to('SuratMasuk');
    }

    public function update_stugas()
    {
        $stugas_model = new surattugasModel();
        $id = $this->request->getVar('id');
        $surat_tugas = $this->request->getVar('modal_surat_tugas');
        $nomor_dasar = $this->request->getVar('nomor_dasar');
        $nama_pegawai = $this->request->getVar('nama_pegawai');
        $lama_perjalanan = $this->request->getVar('lama_perjalanan');
        $tgl_dasar = $this->request->getVar('tgl_dasar');
        $tanggal_dasar = !empty($tgl_dasar) ? $tgl_dasar : null;
        $maksud_surat = $this->request->getVar('maksud_surat');
        $tempat_berangkat = $this->request->getVar('tempat_berangkat');
        $tempat_tujuan = $this->request->getVar('tempat_tujuan');
        $tgl_berangkat = $this->request->getVar('tgl_berangkat');
        $tanggal_berangkat = !empty($tgl_berangkat) ? $tgl_berangkat : null;
        $tgl_pulang = $this->request->getVar('tgl_pulang');
        $tanggal_pulang = !empty($tgl_pulang) ? $tgl_pulang : null;

        $updatedata_stugas = [
            'nomor_stugas' => $surat_tugas,
            'no_dasar_stugas' => $nomor_dasar,
            'kategori' => $nama_pegawai,
            'tgl_dasarsurat' => $tanggal_dasar,
            'maksud_stugas' => $maksud_surat,
            'tempat_brkt' => $tempat_berangkat,
            'tempat_tujuan' => $tempat_tujuan,
            'lama_perjalanan' => $lama_perjalanan,
            'tgl_berangkat' => $tanggal_berangkat,
            'tgl_pulang' => $tanggal_pulang,

        ];

        $stugas_model->where('id_stugas', $id)->set($updatedata_stugas)->update();

        return redirect()->to('SuratTugas');
    }

    public function update_skeluar()
    {
        $skeluar_model = new suratkeluarModel();
        $id = $this->request->getVar('id');
        $kategori_skeluar = $this->request->getVar('kategori');
        $tgl_terima_skeluar = $this->request->getVar('tgl_terima');
        $tujuan_skeluar = $this->request->getVar('tujuan');
        $tgl_surat_skeluar = $this->request->getVar('tgl_surat');
        $perihal_skeluar = $this->request->getVar('perihal');

        $updatedata_skeluar = [
            'kategori' => $kategori_skeluar,
            'tgl_terima' => $tgl_terima_skeluar,
            'tujuan' => $tujuan_skeluar,
            'tgl_surat' => $tgl_surat_skeluar,
            'perihal' => $perihal_skeluar,

        ];

        $skeluar_model->where('id_suratkeluar', $id)->set($updatedata_skeluar)->update();

        return redirect()->to('SuratKeluar');
    }

    public function update_nota()
    {
        $nota_model = new notadinasModel();
        $id = $this->request->getVar('id');
        $tgl_nota = $this->request->getVar('tgl_nota');
        $nota_dari = $this->request->getVar('nota_dari');
        $nomor_surat_nota = $this->request->getVar('nomorsurat');
        $perihal_nota = $this->request->getVar('perihal');
        $keterangan_nota = $this->request->getVar('keterangan');

        $updatedata_nota = [
            'nota_dari' => $nota_dari,
            'tgl_nota' => $tgl_nota,
            'perihal' => $perihal_nota,
            'nomor_surat' => $nomor_surat_nota,
            'keterangan' => $keterangan_nota,

        ];

        $nota_model->where('id_nota', $id)->set($updatedata_nota)->update();

        return redirect()->to('NotaDinas');
    }
}
