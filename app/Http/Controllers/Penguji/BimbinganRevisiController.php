<?php

namespace App\Http\Controllers\Penguji;

use App\Models\Revisi;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BimbinganRevisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revisi = Revisi::orderBy('created_at')->get();

        if (sizeof($revisi) > 0) {
            foreach ($revisi as $d) {
                $mahasiswa = Mahasiswa::where('nim', $d->nim)->get();

                if (sizeof($mahasiswa) > 0) {
                    $d->nama_mahasiswa = $mahasiswa[0]["nama_mahasiswa"];
                } else {
                    $d->nama_mahasiswa = "Telah dihapus";
                }
            }
        }
        return view('penguji.bimbingan-revisi.index', compact('revisi'));
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
        return view('penguji.bimbingan-revisi.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
