<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use App\Models\Opname;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Dashboard";
        $data_user = User::all();
        $data_masuk = Barang_masuk::all();
        $data_keluar = Barang_keluar::all();
        $total_keluar = Barang_keluar::select('barang_id', DB::raw('SUM(qty) as sum'))->groupBy('barang_id')->get();
        $total_opname = Opname::select('barang_id', DB::raw('SUM(stock) as sum'))->groupBy('barang_id')->get();
        $list_barang = Barang::all();
        $opname = Opname::all();

        return view('dashboard.index', [
            'title' => $title,
            'data_user' => $data_user,
            'data_masuk' => $data_masuk,
            'data_keluar' => $data_keluar,
            'list_barang' => $list_barang,
            'data_opname' => $opname,
            "total_keluar" => $total_keluar,
            "total_opname" => $total_opname,
        ]);
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
        //
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
        //
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
