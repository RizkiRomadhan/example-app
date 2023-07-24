<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\Mahasiswa;
use App\Models\PeminjamanLab;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Lab::orderBy('created_at')->get();
        
        $user = User::find(Auth::id());
        $nama = $user->name;

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

        return view('mahasiswa.peminjaman-lab.index', compact('lab', 'nama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.peminjaman-lab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'nama_mahasiswa' => 'required|string|min:3|max:70',
                'nama_lab' => 'required|string|min:3|max:70',
                'nama_laboran' => 'required|string|min:3|max:70',
                'status' => 'required|string|min:3|max:70',
                'waktu' => 'required|string|min:3|max:70',
            ]);
    
            $lab = new Lab();
            $lab->nama_mahasiswa = $request->nama_mahasiswa;
            $lab->nama_lab = $request->nama_lab;
            $lab->nama_laboran = $request->nama_laboran;
            $lab->waktu = $request->waktu;
            $lab->status = $request->status;
            
            $lab->save();
    
            return redirect(route('peminjaman-lab.index'))->with('message', 'Peminjaman lab berhasil disimpan.');
        }
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

        return view('mahasiswa.peminjaman_lab.edit', compact('lab'));
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
        $lab = Lab::where('id', $id)->firstOrFail();
        $user = User::find(Auth::id());

        $lab->nama_mahasiswa = $user->name;
        $lab->status = 'Diproses';
        $lab->save();

        return redirect()->back()->with('message', 'Data peminjaman lab sedang di proses');
    }

    public function absen($id)
    {
        $lab = Lab::where('id', $id)->firstOrFail();

        return view('mahasiswa.peminjaman-lab.absen', compact('lab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prosesAbsen(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|min:3|max:70',
            'nama_lab' => 'required|string|min:3|max:70',
            'nama_laboran' => 'required|string|min:3|max:70',
            'waktu' => 'required|date',
            'status' => 'required|string|min:3|max:70',
        ]);

        $lab = new Lab();

        $lab->nama_mahasiswa = $request->nama_mahasiswa;
        $lab->nama_lab = $request->nama_lab;
        $lab->nama_laboran = $request->nama_laboran;
        $lab->waktu = $request->waktu;
        $lab->status = "Absen";
        $lab->save();

        return redirect(route('peminjaman-lab.index'))->with('message', 'Absensi berhasil.');
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

        return redirect(route('peminjaman-lab.index'))->with('message', 'Data peminjaman lab berhasil dihapus.');
    }
}
