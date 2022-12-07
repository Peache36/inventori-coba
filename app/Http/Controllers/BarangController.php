<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Riwayat;
use App\Models\User;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Barang";
        $data_barang = Barang::all();
        return view("barang.index", [
            "title" => $title,
            "data_barang" => $data_barang
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add List Barang';
        $data_barang = Barang::all();

        return view("barang.add", [
            'title' => $title,
            'data_barang' => $data_barang,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarangRequest $request)
    {


        try {

            Barang::create([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'satuan' => $request->satuan,
                'user_id' => auth()->user()->id,
            ]);

            $riwayat = [
                'keterangan' => $request->nama_barang . " ditambahkan oleh " . auth()->user()->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('riwayat')->insert($riwayat);
            DB::commit();

            return redirect()->route("barang.index")->with('success', 'List Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('barang.create')->with('error', 'Ada yang salah, pastikan kembali' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {

        $title = 'Edit Barang';

        return view('barang.edit', [
            'title' => $title,
            'data_barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        try {
            $barang->kode_barang = $request->kode_barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->satuan = $request->satuan;
            $barang->update();


            return redirect()->route('barang.index')->with('success', 'List barang berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->route('barang.edit')->with('error', 'Something went wrong. Make sure the data you have entered is correct and there is no duplication.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'List barang berhasil dihapus.');
    }
}
