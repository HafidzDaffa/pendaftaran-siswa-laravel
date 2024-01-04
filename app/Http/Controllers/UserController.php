<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 'wali_murid')->latest()->get();

        return view('admin.wali-murid', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_wa' => 'required',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();

        User::create([
            'nama' => $input['nama'],
            "email" => $input['email'],
            "password" => Hash::make($input['password']),
            'no_wa' => "0813212321312",
            'remember_token' => Str::random(10),
            'role' => 'wali_murid',
        ]);

        return redirect()->route('user.index');
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
    public function edit(string $id)
    {
        $user = User::where('id', '=', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email'.Rule::unique('users', 'email')->ignore($this->userId, 'id'),
            'no_wa' => 'required',
            'password' => 'required|min:8',
        ]);

        $input = $request->all();

        User::create([
            'nama' => $input['nama'],
            "email" => $input['email'],
            "password" => Hash::make($input['password']),
            'no_wa' => "0813212321312",
            'remember_token' => Str::random(10),
            'role' => 'wali_murid',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $informasi_siswa = InformasiSiswa::where('user_id', $user->id)->first();

        Storage::disk('public')->delete($informasi_siswa->pas_foto);

        Storage::disk('public')->delete($informasi_siswa->akta_kelahiran);

        Storage::disk('public')->delete($informasi_siswa->kartu_keluarga);

        Storage::disk('public')->delete($informasi_siswa->ktp_ortu);

        $informasi_siswa->delete();
        $user->delete();

        return redirect()->back();
    }
}
