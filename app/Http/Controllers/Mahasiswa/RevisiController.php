<?php
 
namespace App\Http\Controllers\Mahasiswa;
 

use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Revisi;
use App\Models\Mahasiswa;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
 
class RevisiController extends Controller
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

        return view('mahasiswa.revisi.index', compact('revisi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = Judul::get();

        return view('mahasiswa.revisi.create', compact('judul'));
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
            'deskripsi' => 'required|string|min:3|max:70',
            'waktu' => 'required|string|min:3|max:70',
            'gambar' => 'required',
        ]);

        $revisi = new Revisi();
        $revisi->judul = $request->judul;
        $revisi->deskripsi = $request->deskripsi;
        $revisi->waktu = $request->waktu;
        $revisi->gambar = $request->file('gambar') ? $request->file('gambar')->getClientOriginalName(): null;
        $revisi->save();
        if ($request->file('gambar')){
            $request->file('gambar')->move(public_path('img/'), $request->file('gambar')->getClientOriginalName());
        }

        return redirect(route('revisi.index'))->with('message', 'Revisi berhasil disimpan.');
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
        $revisi = Revisi::where('id', $id)->firstOrFail();
        $dosen = Dosen::get();

        return view('mahasiswa.list-revisi.edit', compact('dosen', 'revisi'));
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

        $revisi = Revisi::where('id', $id)->firstOrFail();
        $revisi->judul = $request->judul;
        $revisi->deskripsi = $request->deskripsi;
        $revisi->waktu = $request->waktu;
        $revisi->gambar = $request->gambar;
        $revisi->save();

        return redirect(route('revisi.index'))->with('message', 'Revisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revisi = Revisi::where('id', $id)->firstOrFail();
        $revisi->delete();

        return redirect(route('revisi.index'))->with('message', 'Data List revisi berhasil dihapus.');
    }
}