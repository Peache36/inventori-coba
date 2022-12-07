<?php

namespace App\Http\Controllers;

use App\Models\Barang_keluar;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Riwayat;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Barang keluar";
        $data_barang = Barang_keluar::all();
        return view("barang_keluar.index", [
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
        $title = 'Add Barang Keluar';
        $data_barang = Barang::all();

        return view("barang_keluar.add", [
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
        $total = Barang_keluar::all()->count();


        try {
            $coba = $request;
            $tot = count($request->qty);


            for ($u = 0; $u < $tot; $u++) {
                Barang_keluar::create([
                    'barang_id' => $coba->kode_barang[$u],
                    'qty' => $coba->qty[$u],
                    'group_id' => $total + 1,
                    'disetujui_oleh' => "halo",
                    'no_do' => $coba->no_do[$u],
                    'user_id' => auth()->user()->id,
                ]);
            }

            // Barang_keluar::create([
            //     'barang_id' => $request->kode_barang[0],
            //     'qty' => $request->qty[0],
            //     'group_id' => $total,
            //     'disetujui_oleh' => "halo",
            //     'no_do' => $request->no_do[0],
            //     'user_id' => auth()->user()->id,
            // ]);


            // $riwayat = [
            //     'keterangan' => $request->jumlah . $request->nama_barang . "barang keluar ditambahkan oleh " . auth()->user()->name,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ];

            // DB::table('riwayat')->insert($riwayat);
            // DB::commit();

            return redirect()->route("barang-keluar.index")->with('success', 'List Barang berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('barang-keluar.create')->with('error', 'Ada yang salah, pastikan kembali ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_keluar $barang_keluar)
    {
        $title = 'Details';
        $data_barang = Barang::all();

        return view("barang_keluar.detail", [
            'title' => $title,
            'data_barang' => $barang_keluar,
            'data_keluar' => $data_barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_keluar $barang_keluar)
    {
        $title = 'Edit Barang keluar';
        $data_barang = Barang::all();

        return view('barang_keluar.edit', [
            'title' => $title,
            'data_barang' => $barang_keluar,
            'data_keluar' => $data_barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_keluar $barang_keluar)
    {
        try {
            $barang_keluar->barang_id = $request->barang_id;
            $barang_keluar->qty = $request->qty;
            $barang_keluar->no_do = $request->no_do;
            $barang_keluar->disetujui_oleh = $request->setujui;
            $barang_keluar->update();


            return redirect()->route('barang-keluar.index')->with('success', 'List barang keluar berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Make sure the data you have entered is correct and there is no duplication.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_keluar $barang_keluar)
    {
        $barang_keluar->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'List barang keluar berhasil dihapus.');
    }
}
