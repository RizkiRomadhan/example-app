<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataJurusanRequest;
use App\Http\Requests\UpdateDataJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DataJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy('created_at')->get();

        return view('admin.data-jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.data-jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataJurusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataJurusanRequest $request)
    {
        $jurusan = new Jurusan();
        $jurusan->id_jurusan = $request->id_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect(route('data-jurusan.index'))->with('message', 'Data jurusan berhasil disimpan.');
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
        $jurusan = Jurusan::where('id_jurusan', $id)->firstOrFail();

        return view('admin.data-jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataJurusanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataJurusanRequest $request, $id)
    {
        $jurusan = Jurusan::where('id_jurusan', $id)->firstOrFail();
        $jurusan->id_jurusan = $request->id_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect(route('data-jurusan.index'))->with('message', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::where('id_jurusan', $id)->firstOrFail();
        $jurusan->delete();

        return redirect(route('data-jurusan.index'))->with('message', 'Data jurusan berhasil dihapus.');
    }
}
