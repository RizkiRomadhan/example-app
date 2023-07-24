<?php

namespace App\Http\Controllers\Koordinator;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Judul;

class PenentuanDosbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $judul = Judul::orderBy('created_at')->get();

        return view('koordinator.penentuan-dosbing.index', compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = Judul::get();
        $dosen = Dosen::get();
        $jurusan = Jurusan::get();

        return view('koordinator.penentuan-dosbing.create', compact('judul', 'dosen', 'jurusan'));
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
            'id_jurusan' => 'required|string|min:3|max:70',
            'id_dosbing1' => 'required|string|min:3|max:70',
            'id_dosbing2' => 'required|string|min:3|max:70',
        ]);

        $judul = Judul::where('nim', $request->nama_mahasiswa)->first();
        $judul->nidn_dosen_1 = $request->id_dosbing1;
        $judul->nidn_dosen_2 = $request->id_dosbing2;
        $judul->save();

        return redirect(route('penentuan-dosbing.index'))->with('message', 'Dosen Pembimbing berhasil disimpan.');
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
        $judul = Judul::where('nim', $id)->firstOrFail();
        $dosen = Dosen::get();
        $jurusan = Jurusan::get();

        return view('koordinator.penentuan-dosbing.edit', compact('judul', 'dosen', 'jurusan'));
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
            'nim' => 'required|string|min:3|max:70',
            'id_dosbing1' => 'required|string|min:3|max:70',
            'id_dosbing2' => 'required|string|min:3|max:70',
        ]);


        $judul = Judul::where('nim', $id)->firstOrFail();
        $judul->nama_mahasiswa = $request->nama_mahasiswa;
        $judul->nim = $request->nim;
        $judul->nidn_dosen_1 = $request->id_dosbing1;
        $judul->nidn_dosen_2 = $request->id_dosbing2;
        $judul->save();

        return redirect(route('penentuan-dosbing.index'))->with('message', 'List Penentuan Dosen Pembimbing berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $judul = Judul::where('nim', $id)->firstOrFail();

        $judul->delete();

        return redirect(route('penentuan-dosbing.index'))->with('message', 'Data Dosen Pembimbin berhasil dihapus.');
    }
}
