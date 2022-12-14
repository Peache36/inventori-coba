<?php

namespace App\Http\Controllers;

use App\Models\Opname;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

class OpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Opname";
        $data_barang = Opname::all();
        return view("opname.index", [
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
        $title = 'Add Stock Opname';
        $data_barang = Barang::all();

        return view("opname.add", [
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
        $barang = Barang::where('kode_barang', $request->kode_barang)->firstorfail();

        try {

            Opname::create([
                'barang_id' => $barang->id,
                'vendor' => $request->vendor,
                'stock' => $request->stock,
                'catatan' => $request->catatan,
                'user_id' => auth()->user()->id,
            ]);

            $riwayat = [
                'keterangan' => $request->stock . $request->nama_barang . "opname masuk ditambahkan oleh " . auth()->user()->name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('riwayat')->insert($riwayat);
            DB::commit();

            return redirect()->route("opname.index")->with('success', 'List Opname berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('opname.create')->with('error', 'Ada yang salah, pastikan kembali ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Opname  $opname
     * @return \Illuminate\Http\Response
     */
    public function show(Opname $opname)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Opname  $opname
     * @return \Illuminate\Http\Response
     */
    public function edit(Opname $opname)
    {
        $title = 'Edit Barang Opname';
        $data_barang = Barang::all();

        return view('opname.edit', [
            'title' => $title,
            'data_barang' => $opname,
            'data_masuk' => $data_barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Opname  $opname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opname $opname)
    {
        try {
            $opname->barang_id = $request->barang_id;
            $opname->stock = $request->stock;
            $opname->catatan = $request->catatan;
            $opname->update();

            return redirect()->route('opname.index')->with('success', 'List barang masuk berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Make sure the data you have entered is correct and there is no duplication.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Opname  $opname
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opname $opname)
    {
        $opname->delete();
        return redirect()->route('opname.index')->with('success', 'List opname berhasil dihapus.');
    }
}
