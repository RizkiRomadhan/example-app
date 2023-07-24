<?php

namespace App\Http\Controllers\Pembimbing;

use App\Models\Judul;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccJudulProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = Judul::orderBy('created_at')->get();

        // if (sizeof($judul) > 0) {
        //     foreach ($judul as $d) {
        //         $mahasiswa = Mahasiswa::where('nim', $d->nim)->get();
            
        //         if (sizeof($mahasiswa) > 0) {
        //             $d->nama_mahasiswa = $mahasiswa[0]["nama_mahasiswa"];
        //         } else {
        //             $d->nama_mahasiswa = "Telah dihapus";
        //         }
        //     }
        // }

        return view('pembimbing.acc-judul-proposal.index', compact('judul'));
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
        
        $judul = Judul::orderBy('created_at')->where('id', $id)->get();

        if (sizeof($judul) > 0) {
            foreach ($judul as $d) {
                $mahasiswa = Mahasiswa::where('nim', $d->nim)->get();
            
                if (sizeof($mahasiswa) > 0) {
                    $d->nama_mahasiswa = $mahasiswa[0]["nama_mahasiswa"];
                } else {
                    $d->nama_mahasiswa = "Telah dihapus";
                }
            }
        }
        return view('pembimbing.acc-judul-proposal.edit', compact('judul'));
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
            'status' => 'required|string|min:3|max:70',
        ]);

        $judul[0] = Judul::where('id', $id)->firstOrFail();
        $judul[0]->status = $request->status;
        $judul[0]->save();

        return redirect(route('acc-judul-proposal.index'))->with('message', 'Data berhasil diperbarui.');
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
