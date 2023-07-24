<?php

namespace App\Http\Controllers\Judul;

use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = Judul::where('nama_mahasiswa', Auth::user()->name)->orderBy('created_at')->get();

        return view('mahasiswa.pengajuan-judul.index', compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = Dosen::get();
        $mahasiswa = Mahasiswa::get();
        $judul = Judul::get();

        return view('mahasiswa.pengajuan-judul.create', compact('dosen', 'mahasiswa', 'judul'));
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
            'judul' => 'required|string|min:3|max:70',
            'nim' => 'required|string|min:3|max:70',
            'nama_mahasiswa' => 'required|string|min:3|max:70',
        ]);

        $judul = new Judul();
        $judul->nama_mahasiswa = $request->nama_mahasiswa;
        $judul->judul = $request->judul;
        $judul->nim = $request->nim;
        $judul->status = 'belum disetujui';
        $judul->save();

        return redirect(route('pengajuan-judul.index'))->with('message', 'Judul berhasil disimpan.');
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
        $judul = Judul::where('id', $id)->firstOrFail();
        $dosen = Dosen::get();
        $mahasiswa = Mahasiswa::get();

        return view('mahasiswa.pengajuan-judul.edit', compact('judul', 'dosen', 'mahasiswa'));
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
            'judul' => 'required|string|min:3|max:70',
            'nim' => 'required|string|min:3|max:70',
            'id_dosbing1' => 'required|string|min:3|max:70',
            'id_dosbing2' => 'required|string|min:3|max:70',
        ]);

        $judul = Judul::where('id', $id)->firstOrFail();
        $judul->judul = $request->judul;
        $judul->nim = $request->nim;
        $judul->nidn_dosen_1 = $request->id_dosbing1;
        $judul->nidn_dosen_2 = $request->id_dosbing2;
        $judul->save();

        return redirect(route('pengajuan-judul.index'))->with('message', 'Judul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $judul = Judul::where('id', $id)->firstOrFail();
        $judul->delete();

        return redirect(route('pengajuan-judul.index'))->with('message', 'Data Judul berhasil dihapus.');
    }

    public function berkas(Request $request)
    {
        return view("mahasiswa.pengajuan-judul.berkas", ['id' => $request->id]);
    }

    public function simpanBerkas(Request $request, $id)
    {
        $request->validate([
            'berkas1' => 'required|max:10000',
            'berkas2' => 'required|max:10000',
            'berkas3' => 'required|max:10000',
            'berkas4' => 'required|max:10000',
        ]);
        
        $judul = Judul::where('id', $id)->firstOrFail();
        $judul->berkas_proposal = $request->file('berkas1')->store('berkas');
        $judul->berkas_formdaftar = $request->file('berkas2')->store('berkas');
        $judul->berkas_asistensi = $request->file('berkas3')->store('berkas');
        $judul->berkas_kp = $request->file('berkas4')->store('berkas');
        $judul->save();

        return redirect(route('pengajuan-judul.index'))->with('message', 'Berkas berhasil disimpan.');
    }
}
