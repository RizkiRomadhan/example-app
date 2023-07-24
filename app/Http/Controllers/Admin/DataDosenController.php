<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Mail\EmailValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\StoreDataDosenRequest;
use App\Http\Requests\UpdateDataDosenRequest;

class DataDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at')->get();

        if (sizeof($dosen) > 0) {
            foreach ($dosen as $d) {
                $jurusan = Jurusan::where('id_jurusan', $d->id_jurusan)->get();
            
            if (sizeof($jurusan) > 0) {
                $d->nama_jurusan = $jurusan[0]["nama_jurusan"];
            } else {
                $d->nama_jurusan = "Telah dihapus";
            }
            }
        }

        return view('admin.data-dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::get();

        return view('admin.data-dosen.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDataDosenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataDosenRequest $request)
    {
        $query = Dosen::query();

        if ($request->query('search')) {
            $query->where('nama_dosen', 'like', "%". $request->query('search') . "%");
        }

        $user = new User();
        $user->name = $request->nama_dosen;
        $user->email = $request->email;
        $user->password = Hash::make('12345678');
        $user->role = 'pembimbing';
        $user->save();

        $dosen = new dosen();
        $dosen->nidn = $request->nidn;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->id_user = $user->id;
        $dosen->id_jurusan = $request->id_jurusan;
        $dosen->email = $request->email;
        $dosen->nomor_ponsel = $request->nomor_ponsel;
        $dosen->status = $request->status;
        $dosen->save();

        Mail::to($user->email)->send(new EmailValidation($user));

        return redirect(route('data-dosen.index'))->with('message', 'Data dosen berhasil disimpan.');
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
        $dosen = Dosen::where('nidn', $id)->firstOrFail();
        $jurusan = Jurusan::get();

        return view('admin.data-dosen.edit', compact('dosen', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreDataDosenRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataDosenRequest $request, $id)
    {
        $dosen = Dosen::where('nidn', $id)->firstOrFail();
        $dosen->nidn = $request->nidn;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->id_jurusan = $request->id_jurusan;
        $dosen->email = $request->email;
        $dosen->nomor_ponsel = $request->nomor_ponsel;
        $dosen->status = $request->status;
        $dosen->save();

        return redirect(route('data-dosen.index'))->with('message', 'Data Dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::where('nidn', $id)->firstOrFail();
        $dosen->delete();

        return redirect(route('data-dosen.index'))->with('message', 'Data dosen berhasil dihapus.');
    }
}
