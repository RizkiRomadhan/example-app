<?php

namespace App\Http\Controllers\Pembimbing;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BimbinganProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan = Bimbingan::orderBy('created_at')->get();

        // dd($bimbingan);
        if (sizeof($bimbingan) > 0) {
            foreach ($bimbingan as $d) {
                $mahasiswa = Mahasiswa::where('nim', $d->nim)->get();

                if (sizeof($mahasiswa) > 0) {
                    $d->nama_mahasiswa = $mahasiswa[0]["nama_mahasiswa"];
                } else {
                    $d->nama_mahasiswa = "Telah dihapus";
                }
            }
        }
        return view('pembimbing.bimbingan-proposal.index', compact('bimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $bimbingan = Bimbingan::where('id', $id)->firstOrFail();
        return view('pembimbing.bimbingan-proposal.edit', compact('bimbingan'));
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
            'deskripsi' => 'required|string|min:3|max:70',
            'waktu' => 'required|string|min:3|max:70',
            'gambar' => 'required|string|min:3|max:70',
        ]);

        $bimbingan = Bimbingan::where('id', $id)->firstOrFail();
        $bimbingan->judul = $request->judul;
        $bimbingan->deskripsi = $request->deskripsi;
        $bimbingan->waktu = $request->waktu;
        $bimbingan->gambar = $request->gambar;
        $bimbingan->save();

        return redirect(route('bimbingan-proposal.index'))->with('message', 'Bimbingan Proposal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bimbingan = Bimbingan::where('id', $id)->firstOrFail();
        $bimbingan->delete();

        return redirect(route('bimbingan-proposal.index'))->with('message', 'Data Bimbingan Proposal berhasil dihapus.');
    }
}
