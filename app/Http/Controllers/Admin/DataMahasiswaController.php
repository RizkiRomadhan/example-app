<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataMahasiswaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();

        foreach ($mahasiswa as $m) {
            $jurusan = Jurusan::where('id_jurusan', $m->id_jurusan)->get('nama_jurusan');

            if (sizeof($jurusan) > 0) {
                $m->nama_jurusan = $jurusan[0]["nama_jurusan"];
            } else {
                $m->nama_jurusan = "Telah dihapus";
            }
            
            $prodi = Prodi::where('id_prodi', $m->id_prodi)->get();
            if (sizeof($prodi) > 0) {
                $m->nama_prodi = $prodi[0]->nama_prodi;
            }
        };
        
        return view('admin.data-mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::get();
        $prodi = Prodi::get();

        return view('admin.data-mahasiswa.create', compact('jurusan', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDataMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataMahasiswaRequest $request)
    {
        $user = new User();
        $user->name = $request->nama_mahasiswa;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->role = 'mahasiswa';
        $user->save();

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->user_id = $user->id;
        $mahasiswa->id_jurusan = $request->id_jurusan;
        $mahasiswa->id_prodi = $request->id_prodi;
        $mahasiswa->email = $request->email;
        $mahasiswa->nomor_ponsel = $request->nomor_ponsel;
        $mahasiswa->status = $request->status;
        $mahasiswa->save();

        return redirect(route('data-mahasiswa.index'))->with('message', 'Data mahasiswa berhasil disimpan.');
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
        $mahasiswa = Mahasiswa::where('nim', $id)->get()[0];
        $mahasiswa->nama_jurusan = Jurusan::where('id_jurusan', $mahasiswa->id_jurusan)->get('nama_jurusan')[0]["nama_jurusan"];
        $mahasiswa->nama_prodi = Prodi::where('id_prodi', $mahasiswa->id_prodi)->get('nama_prodi')[0]["nama_prodi"];
        $jurusan = Jurusan::get();
        $prodi = Prodi::get();

        return view('admin.data-mahasiswa.edit', compact('mahasiswa', 'jurusan', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreDataMahasiswaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDataMahasiswaRequest $request, $id)
    {   
        $mahasiswa = Mahasiswa::where('nim', $id)->firstOrFail();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->id_jurusan = $request->id_jurusan;
        $mahasiswa->id_prodi = $request->id_prodi;
        $mahasiswa->email = $request->email;
        $mahasiswa->nomor_ponsel = $request->nomor_ponsel;
        $mahasiswa->status = $request->status;
        $mahasiswa->save();

        return redirect(route('data-mahasiswa.index'))->with('message', 'Data mahasiswa berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('nim', $id)->firstOrFail();
        $user = User::where('name', $mahasiswa->nama_mahasiswa)->firstOrFail();
        $mahasiswa->delete();
        $user->delete();

        return redirect(route('data-mahasiswa.index'))->with('message', 'Data mahasiswa berhasil dihapus.');
    }
}
