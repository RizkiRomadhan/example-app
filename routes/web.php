    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Judul\JudulController;
use App\Http\Controllers\Admin\DataDosenController;
use App\Http\Controllers\Admin\DataProdiController;
use App\Http\Controllers\Admin\DataJurusanController;
use App\Http\Controllers\Laboran\JadwalLabController;
use App\Http\Controllers\Laboran\AbsensiLabController;
use App\Http\Controllers\Admin\DataMahasiswaController;
use App\Http\Controllers\Laboran\KonfirmasiLabController;
use App\Http\Controllers\Mahasiswa\ListBimbinganController;
use App\Http\Controllers\Mahasiswa\RevisiController;
use App\Http\Controllers\Mahasiswa\PeminjamanLabController;
use App\Http\Controllers\Mahasiswa\JadwalSeminarMhsController;
use App\Http\Controllers\Penguji\BimbinganRevisiController;
use App\Http\Controllers\Koordinator\JadwalSeminarController;
use App\Http\Controllers\Pembimbing\AccJudulProposalController;
use App\Http\Controllers\Koordinator\PenentuanDosbingController;
use App\Http\Controllers\Mahasiswa\DosenPembimbingController;
use App\Http\Controllers\Pembimbing\BimbinganProposalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function() {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('data-jurusan', DataJurusanController::class)->except('show');
        Route::resource('data-prodi', DataProdiController::class)->except('show');
        Route::resource('data-dosen', DataDosenController::class);
        Route::resource('data-mahasiswa', DataMahasiswaController::class);
    });
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::prefix('mahasiswa')->group(function () {
        Route::resource('pengajuan-judul', JudulController::class);
        Route::get('pengajuan-judul/berkas/{id}', [JudulController::class, 'berkas'])->name('pengajuan-judul.berkas');
        Route::post('pengajuan-judul/berkas/{id}/simpan', [JudulController::class, 'simpanBerkas'])->name('pengajuan-judul.simpanBerkas');
        Route::resource('dosen-pembimbing', DosenPembimbingController::class);
        Route::resource('list-bimbingan', ListBimbinganController::class);
        Route::resource('revisi', RevisiController::class);
        Route::get('peminjaman-lab/absen/{id}', [PeminjamanLabController::class, 'absen'])->name('peminjaman-lab.absen');
        Route::post('peminjaman-lab/prosesAbsen', [PeminjamanLabController::class, 'prosesAbsen'])->name('peminjaman-lab.prosesAbsen');
        Route::resource('peminjaman-lab', PeminjamanLabController::class);
        Route::resource('jadwal-seminar-mhs', JadwalSeminarMhsController::class);
    });
 
    //semua route dalam grup ini hanya bisa diakses oleh admin
});


Route::prefix('pembimbing')->group(function () {
    Route::resource('acc-judul-proposal', AccJudulProposalController::class);
    Route::resource('bimbingan-proposal', BimbinganProposalController::class);
});

Route::prefix('penguji')->group(function () {
    Route::resource('bimbingan-revisi', BimbinganRevisiController::class);
});



Route::prefix('koordinator')->group(function () {
    Route::resource('penentuan-dosbing', PenentuanDosbingController::class);
    Route::resource('jadwal-seminar', JadwalSeminarController::class);
});

Route::prefix('laboran')->group(function () {
    Route::resource('jadwal-lab', JadwalLabController::class);
    Route::resource('konfirmasi-lab', KonfirmasiLabController::class);
    Route::resource('absensi-lab', AbsensiLabController::class);
});
