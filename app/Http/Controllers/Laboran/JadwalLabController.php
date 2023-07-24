<?php

namespace App\Http\Controllers\Laboran;

use App\Models\Lab;
use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Lab::orderBy('created_at')->get();

        if (sizeof($lab) > 0) {
            foreach ($lab as $d) {
                $lab = Lab::where('nama_lab', $d->nama_lab)->get();

                if (sizeof($lab) > 0) {
                    $d->nama_lab = $lab[0]["nama_lab"];
                } else {
                    $d->nama_lab = "Telah dihapus";
                }
            }
        }

        return view('laboran.jadwal-lab.index', compact('lab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lab = Lab::get();
        
        return view('laboran.jadwal-lab.create', compact('lab'));
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
            'nama_lab' => 'required|string|min:3|max:70',
            'nama_laboran' => 'required|string|min:3|max:70',
            'waktu' => 'required|date',
            'status' => 'required|string|min:3|max:70',
        ]);

        $lab = new Lab();
        $lab->nama_mahasiswa = "";
        $lab->nama_lab = $request->nama_lab;
        $lab->nama_laboran = $request->nama_laboran;
        $lab->waktu = $request->waktu;
        $lab->status = $request->status;
        $lab->save();

        return redirect(route('jadwal-lab.index'))->with('message', 'Jadwal Lab berhasil disimpan.');
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

        return view('laboran.jadwal-lab.edit', compact('lab'));
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
            'nama_lab' => 'required|string|min:3|max:70',
            'nama_lab' => 'required|string|min:3|max:70',
            'nama_lab' => 'required|date|min:3|max:70',
            'status' => 'required|string|min:3|max:70',
        ]);

        $lab = Lab::where('id', $id)->firstOrFail();
        $lab->nama_lab = $request->nama_lab;
        $lab->nama_lab = $request->nama_lab;
        $lab->nama_lab = $request->nama_lab;
        $lab->status = $request->status;
        $lab->save();

        return redirect(route('jadwal-lab.index'))->with('message', 'Jadwal Lab berhasil diperbarui.');
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

        return redirect(route('jadwal-lab.index'))->with('message', 'Jadwal Lab berhasil dihapus.');
    }
}
