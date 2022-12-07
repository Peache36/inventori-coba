<?php

namespace App\Http\Controllers;

use App\Models\Barang_masuk;
use App\Models\Barang;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Barang Masuk";
        $data_barang = Barang_masuk::all();
        return view("barang_masuk.index", [
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
        $title = 'Add Barang Masuk';
        $data_barang = Barang::all();

        return view("barang_masuk.add", [
            'title' => $title,
            'data_barang' => $data_barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            Barang_masuk::create([
                'barang_id' => $request->kode_barang,
                'vendor' => $request->vendor,
                'qty' => $request->jumlah,
                'disetujui_oleh' => $request->setujui,
                'user_id' => auth()->user()->id,
            ]);

            $riwayat = [
                'keterangan' => $request->jumlah . $request->nama_barang . " masuk ditambahkan oleh " . auth()->user()->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('riwayat')->insert($riwayat);
            DB::commit();

            return redirect()->route("barang-masuk.index")->with('success', 'List Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('barang-masuk.create')->with('error', 'Ada yang salah, pastikan kembali ' . $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_masuk $barang_masuk)
    {
        $title = 'Edit Barang Masuk';
        $data_barang = Barang::all();

        return view('barang_masuk.edit', [
            'title' => $title,
            'data_barang' => $barang_masuk,
            'data_masuk' => $data_barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_masuk $barang_masuk)
    {

        try {
            $barang_masuk->vendor = $request->vendor;
            $barang_masuk->barang_id = $request->barang_id;
            $barang_masuk->qty = $request->qty;
            $barang_masuk->disetujui_oleh = $request->setujui;
            $barang_masuk->update();


            return redirect()->route('barang-masuk.index')->with('success', 'List barang masuk berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Make sure the data you have entered is correct and there is no duplication.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_masuk $barang_masuk)
    {
        $barang_masuk->delete();
        return redirect()->route('barang-masuk.index')->with('success', 'List barang masuk berhasil dihapus.');
    }
}
