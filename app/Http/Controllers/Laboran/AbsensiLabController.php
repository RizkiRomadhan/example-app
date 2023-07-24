<?php

namespace App\Http\Controllers\Laboran;

use App\Models\Lab;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsensiLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Lab::query();

        if ($request->query('search')) {
            $query->where('nama_mahasiswa', 'like', "%". $request->query('search') . "%");
        }

        $lab = $query->orderBy('created_at')->get();


        return view('laboran.absensi-lab.index', compact('lab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lab = Lab::orderBy('created_at')->get();

        return view('laboran.absensi-lab.create', compact('lab'));
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
            'waktu' => 'required|string|min:3|max:70',
            'nama_lab' => 'required|string|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ]);

        $lab = new Lab();
        $lab->nama_mahasiswa = $request->nama_mahasiswa;
        $lab->nama_lab = $request->nama_lab;
        $lab->nama_laboran = "";
        $lab->waktu = $request->waktu;
        $lab->status = $request->status;
        $lab->keterangan = "";
        $lab->save();

        return redirect(route('absensi-lab.index'))->with('message', 'Absensi Lab berhasil disimpan.');
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
        $lab = Lab::where('id', $id)->firstOrFail();

        return view('laboran.absensi-lab.edit', compact('lab'));
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
            'waktu' => 'required|string|min:3|max:70',
            'nama_lab' => 'required|string|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ]);

        $lab = Lab::where('id', $id)->firstOrFail();
        $lab->nama_mahasiswa = $request->nama_mahasiswa;
        $lab->waktu = $request->waktu;
        $lab->nama_lab = $request->nama_lab;
        $lab->status = $request->status;
        $lab->save();

        return redirect(route('absensi-lab.index'))->with('message', 'Data Absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Lab::where('id', $id)->firstOrFail();

        $lab->delete();

        return redirect(route('absensi-lab.index'))->with('message', 'Absensi Lab berhasil dihapus.');
    }
}
