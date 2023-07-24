<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataProdiRequest;
use App\Http\Requests\UpdateDataProdiRequest;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class DataProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::orderBy('created_at')->get();

        return view('admin.data-prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();

        return view('admin.data-prodi.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataProdiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataProdiRequest $request)
    {
        $prodi = new Prodi();
        $prodi->id_jurusan = $request->id_jurusan;
        $prodi->id_prodi = $request->id_prodi;
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->save();

        return redirect(route('data-prodi.index'))->with('message', 'Data program studi berhasil disimpan.');
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
        $jurusan = Jurusan::all();
        $prodi = Prodi::where('id_prodi', $id)->firstOrFail();

        return view('admin.data-prodi.edit', compact('jurusan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataProdiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataProdiRequest $request, $id)
    {
        $prodi = Prodi::where('id_prodi', $id)->firstOrFail();
        $prodi->id_jurusan = $request->id_jurusan;
        $prodi->id_prodi = $request->id_prodi;
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->save();

        return redirect(route('data-prodi.index'))->with('message', 'Data jurusan berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::where('id_prodi', $id)->firstOrFail();
        $prodi->delete();

        return redirect(route('data-prodi.index'))->with('message', 'Data program studi berhasil dihapus.');
    }
}
