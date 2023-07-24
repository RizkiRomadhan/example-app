<?php

namespace App\Http\Controllers\Laboran;

use App\Models\Lab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KonfirmasiLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Lab::orderBy('created_at')->get();

        return view('laboran.konfirmasi-lab.index', compact('lab'));
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
        //
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
        $peminjamanLab = Lab::find($id);
        $peminjamanLab->status = 'Diterima';
        $peminjamanLab->save();

        return redirect()->back()->with('message', 'Peminjaman lab berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjamanLab = Lab::find($id);
        $peminjamanLab->delete();

        return redirect()->back()->with('message', 'Peminjaman lab berhasil dihapus');
    }
}
