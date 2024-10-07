<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('status', 1)->get();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1
        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        // $save->password = \Hash::make($request->password);
        $save->password = md5($request->password );
        $save->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari user berdasarkan ID
        $user = User::find($id);
    
        // Jika user tidak ditemukan, kembalikan ke halaman sebelumnya
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
    
        // Kirim data user ke view edit
        return view('user.edit', compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        // Cari user berdasarkan ID
        $user = User::find($id);
    
        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    
        // Redirect ke halaman list user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id); 

        $data->status = 0; //soft
        $data->save(); //delete

        // $data->delete(); // hard-delete

        return redirect()->back();
    }
}
