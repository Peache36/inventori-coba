<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List User";
        $data_user = User::all();
        return view("user.index", [
            "title" => $title,
            "data_user" => $data_user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add User';
        $data_user = User::all();

        return view("user.add", [
            'title' => $title,
            'data_user' => $data_user,
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
            User::create([
                'name' => $request->nama_user,
                'email' => $request->email,
                'division' => $request->divisi,
                'password' => bcrypt($request->password),
                'avatar' => NULL,
            ]);
            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('user.create')->with('error', 'Ada yang salah, pastikan kembali' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Edit User';

        return view('user.edit', [
            'title' => $title,
            'data_user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->name = $request->nama_user;
            $user->email = $request->email;
            $user->division = $request->division;
            $user->update();


            return redirect()->route('user.index')->with('success', 'List user berhasil diupdate.');
        } catch (\Throwable $th) {
            return redirect()->route('user.edit')->with('error', 'Something went wrong. Make sure the data you have entered is correct and there is no duplication.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}
