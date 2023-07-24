<?php

namespace App\Http\Controllers\Koordinator;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Seminar;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminar = Seminar::orderBy('created_at')->get();

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

        return view('koordinator.jadwal-seminar.index', compact('seminar'));
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

        return view('koordinator.jadwal-seminar.create', compact('mahasiswa', 'dosen', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
        'nama_mahasiswa' => 'required|string|min:3|max:70',
        'id_dosbing1' => 'required|string|min:3|max:70',
        'id_dosbing2' => 'required|string|min:3|max:70',
        'id_penguji1' => 'required|string|min:3|max:70',
        'id_penguji2' => 'required|string|min:3|max:70',
        'waktu' => 'required|string|min:3|max:70',
        'ruangan' => 'required|string|min:3|max:70',
        'status' => 'required|string|min:3|max:70',
            ]);
    
        $seminar = new Seminar();
        $seminar->nama_mahasiswa = $request->nama_mahasiswa;
        $seminar->nidn_dosen1 = $request->id_dosbing1;
        $seminar->nidn_dosen2 = $request->id_dosbing2;
        $seminar->nidn_penguji1 = $request->id_penguji1;
        $seminar->nidn_penguji2 = $request->id_penguji2;
        $seminar->waktu = $request->waktu;
        $seminar->ruangan = $request->ruangan;
        $seminar->status = 'belum disetujui';
        $seminar->save();
    
            return redirect(route('jadwal-seminar.index'))->with('message', 'Jadwal Seminar berhasil disimpan.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seminar = Seminar::where('id', $id)->firstOrFail();
        $dosen = Dosen::get();
        
        return view('koordinator.jadwal-seminar.edit', compact( 'seminar', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|min:3|max:70',
            'id_dosbing1' => 'required|string|min:3|max:70',
            'id_dosbing2' => 'required|string|min:3|max:70',
            'id_penguji1' => 'required|string|min:3|max:70',
            'id_penguji2' => 'required|string|min:3|max:70',
            'waktu' => 'required|string|min:3|max:70',
            'ruangan' => 'required|string|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ]);


        $seminar = Seminar::where('id', $id)->firstOrFail();
        $seminar->nama_mahasiswa = $request->nama_mahasiswa;
        $seminar->nidn_dosen1 = $request->id_dosbing1;
        $seminar->nidn_dosen2 = $request->id_dosbing2;
        $seminar->nidn_penguji1 = $request->id_penguji1;
        $seminar->nidn_penguji2 = $request->id_penguji2;
        $seminar->waktu = $request->waktu;
        $seminar->ruangan = $request->ruangan;
        $seminar->status = $request->status;
        $seminar->save();

        return redirect(route('jadwal-seminar.index'))->with('message', 'Jadwal Seminar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seminar = Seminar::where('id', $id)->firstOrFail();

        $seminar->delete();

        return redirect(route('jadwal-seminar.index'))->with('message', 'Jadwal Seminar berhasil dihapus.');
    }
}
