<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Seminar;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bimbingan;

class JadwalSeminarMhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminar = Seminar::orderBy('created_at')->get();
        $bimbingan = Bimbingan::get();

        foreach ($seminar as $s) {
            $dosenPembimbing1 = Dosen::where('nidn', $s->nidn_dosen1)->get();

            if (sizeof($dosenPembimbing1) > 0) {
                $s->nama_dosen1 = $dosenPembimbing1[0]->nama_dosen;
            }

            $dosenPembimbing2 = Dosen::where('nidn', $s->nidn_dosen2)->get();

            if (sizeof($dosenPembimbing2) > 0) {
                $s->nama_dosen2 = $dosenPembimbing2[0]->nama_dosen;
            }

            $dosenPenguji1 = Dosen::where('nidn', $s->nidn_penguji1)->get();

            if (sizeof($dosenPenguji1) > 0) {
                $s->nama_penguji1 = $dosenPenguji1[0]->nama_dosen;
            }

            $dosenPenguji2 = Dosen::where('nidn', $s->nidn_penguji2)->get();

            if (sizeof($dosenPenguji2) > 0) {
                $s->nama_penguji2 = $dosenPenguji2[0]->nama_dosen;
            }
        }

        return view('mahasiswa.jadwal-seminar-mhs.index', compact('seminar', 'bimbingan'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at')->get();
        $dosen = Dosen::get();
        $jurusan = Jurusan::get();
        $bimbingan = Bimbingan::get();

        if (sizeof($mahasiswa) > 0) {
            foreach ($mahasiswa as $m) {
                $jurusanInner = Jurusan::where('id_jurusan', $m->id_jurusan)->get();

                if (sizeof($jurusanInner) > 0) {
                    // ada
                    $m->nama_jurusan = $jurusanInner[0]->nama_jurusan;
                } else {
                    // tidak ada
                    $m->nama_jurusan = "Tidak ada";
                }

                $dosen1 = Dosen::where('nidn', $m->nidn_dosen1)->get();
                if (sizeof($dosen1) > 0) {
                    // ada
                    $m->nama_dosen1 = $dosen1[0]->nama_dosen;
                } else {
                    // tidak ada
                    $m->nama_dosen1 = "Tidak ada";
                }

                $dosen2 = Dosen::where('nidn', $m->nidn_dosen2)->get();
                if (sizeof($dosen2) > 0) {
                    // ada
                    $m->nama_dosen2 = $dosen2[0]->nama_dosen;
                } else {
                    // tidak ada
                    $m->nama_dosen2 = "Tidak ada";
                }
            }
        }

        return view('mahasiswa.jadwal-seminar-mhs.create', compact('mahasiswa', 'dosen', 'jurusan', 'bimbingan'));
    }

    public function destroy($id)
    {
        $seminar = Seminar::where('id', $id)->firstOrFail();

        $seminar->delete();

        return redirect(route('jadwal-seminar-mhs.index'))->with('message', 'Jadwal Seminar berhasil dihapus.');
    }
}