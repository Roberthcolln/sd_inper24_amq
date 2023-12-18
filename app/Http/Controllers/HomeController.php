<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Konsentrasi;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Kegiatan;
use App\Models\Diskon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = DB::table('kegiatan')->get();
        $project = DB::table('project')->orderBy('id_project')->get();
        $konf = DB::table('setting')->first();
        $berita = DB::table('berita')
            ->orderByDesc('id_berita')
            ->limit(5)
            ->get();
        $partner = DB::table('partner')
            ->orderBy('kategori_partner')
            ->get();
        $founder = DB::table('team')
            ->limit(8)
            ->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        $visi = DB::table('visi')->get();
        $layanan = DB::table('layanan')->get();
        $program = DB::table('program')->get();
        $guru = DB::table('guru')->get();
        $ticer = DB::table('guru')->count();
        $tim = DB::table('team')->count();
        $diskon = DB::table('diskon')->get();
        $faq = DB::table('faqs')->get();
        return view('welcome', compact('berita', 'kegiatan', 'layanan', 'faq', 'ticer', 'tim', 'program', 'guru', 'diskon', 'konf', 'partner', 'founder', 'banner', 'project', 'visi'));
    }

    public function kontak()
    {
        $konf = DB::table('setting')->first();
        return view('kontak', compact('konf'));
    }

    public function tentang()
    {
        $guru = DB::table('guru')->get();
        $ticer = DB::table('guru')->count();
        $siswa = DB::table('siswa')->count();
        $layanan = DB::table('layanan')->count();
        $fasilitas = DB::table('iventaris')->count();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('tentang', compact('konf', 'layanan', 'siswa', 'fasilitas', 'ticer', 'guru', 'banner', 'tims'));
    }

    public function programm()
    {
        $program = DB::table('program')->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('programm', compact('konf', 'program', 'banner', 'tims'));
    }

    public function kegiatann()
    {
        $kegiatan = DB::table('kegiatan')->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('kegiatann', compact('konf', 'kegiatan', 'banner', 'tims'));
    }

    public function galerii()
    {
        $galeri = DB::table('galeri')->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('galerii', compact('konf', 'galeri', 'banner', 'tims'));
    }

    public function kelass()
    {
        $kelas = DB::table('kelas')
            ->join('guru', 'kelas.id_guru', 'guru.id_guru')
            ->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('kelass', compact('konf', 'kelas', 'banner', 'tims'));
    }

    public function siswaa()
    {
        $kelas_1 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 1')
            ->get();
        $kelas_2 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 2')
            ->get();
        $kelas_3 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 3')
            ->get();
        $kelas_4 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 4')
            ->get();
        $kelas_5 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 5')
            ->get();
        $kelas_6 = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('nama_kelas', '=', 'Kelas 6')
            ->get();
        $siswa = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('siswaa', compact('konf', 'kelas_1', 'kelas_2', 'kelas_3', 'kelas_4', 'kelas_5', 'kelas_6', 'siswa', 'banner', 'tims'));
    }

    public function fasilitas()
    {
        $fasilitas = DB::table('iventaris')->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        return view('fasilitas', compact('konf', 'fasilitas', 'banner', 'tims'));
    }

    public function guruu()
    {
        $guru = DB::table('guru')->get();
        $konf = DB::table('setting')->first();
        $tims = DB::table('team')->get();
        $banner = DB::table('galeri')->where('jenis_galeri', '=', 'Banner')
            ->orderByDesc('id_galeri')
            ->first();
        $kepala_sekolah = DB::table('guru')
            ->where('jabatan_guru', '=', 'Kepala Sekolah')
            ->get();
        $wakil_kepala_sekolah = DB::table('guru')
            ->where('jabatan_guru', '=', 'Wakil Kepala Sekolah')
            ->get();
        $guru_kelas = DB::table('guru')
            ->where('jabatan_guru', '=', 'Guru Kelas')
            ->get();
        $guru_bidang_study = DB::table('guru')
            ->where('jabatan_guru', '=', 'Guru Bidang Studi')
            ->get();
        $tata_usaha = DB::table('guru')
            ->where('jabatan_guru', '=', 'Tata Usaha')
            ->get();
        $petugas_perpustakaan = DB::table('guru')
            ->where('jabatan_guru', '=', 'Petugas Perpustakaan')
            ->get();
        return view('guruu', compact('konf', 'kepala_sekolah', 'wakil_kepala_sekolah', 'guru_kelas', 'guru_bidang_study', 'tata_usaha', 'petugas_perpustakaan', 'guru', 'banner', 'tims'));
    }

    public function tentang_team()
    {
        $konf = DB::table('setting')->first();
        $founder = DB::table('team')->where('jabatan_team', '=', 'Board Of Founders')->get();
        $advisor = DB::table('team')->where('jabatan_team', '=', 'Board Of Advisor')->get();
        $core = DB::table('team')->where('jabatan_team', '=', 'Core Team')->get();

        return view('tentang_team', compact('konf', 'founder', 'advisor', 'core'));
    }
    public function news()
    {
        $konf = DB::table('setting')->first();
        $berita = DB::table('berita')->orderByDesc('id_berita')->get();
        return view('news', compact('berita', 'konf'));
    }

    public function read($slug)
    {
        $konf = DB::table('setting')->first();
        $baca = Berita::where('slug_berita', $slug)->first();
        $listberita = DB::table('berita')->orderByDesc('id_berita')->limit(10)->get();
        return view('read', compact('baca', 'konf', 'listberita'));
    }

    public function detailproject($slug)
    {
        $listproject = DB::table('project')->orderByDesc('id_project')->limit(8)->get();
        $konf = DB::table('setting')->first();
        $proj = Project::where('slug_project', $slug)->first();
        return view('detail-project', compact('konf', 'proj', 'listproject'));
    }

    public function lihatproject()
    {
        $project = DB::table('project')->orderByDesc('id_project')->get();
        $konf = DB::table('setting')->first();
        return view('lihat-project', compact('konf', 'project'));
    }

    public function support()
    {
        $konf = DB::table('setting')->first();
        $rekening = DB::table('rekening')->orderByDesc('id_rekening')->get();
        return view('support', compact('konf', 'rekening'));
    }

    public function lihatpartner()
    {
        $konf = DB::table('setting')->first();
        $pemerintah = DB::table('partner')->where('kategori_partner', '=', 'Pemerintah')->get();
        $komunitas = DB::table('partner')->where('kategori_partner', '=', 'Komunitas')->get();
        $usaha = DB::table('partner')->where('kategori_partner', '=', 'Usaha')->get();
        $pendidikan = DB::table('partner')->where('kategori_partner', 'Pendidikan')->get();
        return view('lihat-partner', compact('pendidikan', 'usaha', 'komunitas', 'pemerintah', 'konf'));
    }

    public function lihatkelas()
    {
        $konf = Setting::first();

        return view('kelas', compact('konf'));
    }

    public function lihatkonsentrasi()
    {
        $konf = Setting::first();
        $konsentrasi = Konsentrasi::all();
        return view('lihat-konsentrasi', compact('konf', 'konsentrasi'));
    }

    public function lihatprogram($slug)
    {
        $konf = Setting::first();
        $program = DB::table('program')

            ->where('slug_program', $slug)
            ->first();
        $programm = DB::table('program')->get();
        return view('lihat-program', compact('program', 'programm', 'konf'));
    }

    public function lihatsiswa($slug)
    {
        $konf = Setting::first();
        $siswa = DB::table('siswa')
            ->join('kelas', 'siswa.id_kelas', 'kelas.id_kelas')
            ->where('slug_siswa', $slug)
            ->first();
        $siswaa = DB::table('siswa')->get();
        return view('lihat-siswa', compact('siswa', 'siswaa', 'konf'));
    }

    public function lihatkegiatan($slug)
    {
        $konf = Setting::first();
        $kegiatan = DB::table('kegiatan')

            ->where('slug_kegiatan', $slug)
            ->first();
        $kegiatann = DB::table('kegiatan')->get();
        return view('lihat-kegiatan', compact('kegiatan', 'kegiatann', 'konf'));
    }
}
