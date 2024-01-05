<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InformasiSiswa;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;

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
            'no_wa' => $input['no_wa'],
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

        return view('walimurid.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => ['required','email', Rule::unique('users', 'email')->where('id', Auth::user()->id)],
            'no_wa' => 'required',
            // 'password' => 'required|min:8',
        ]);

        $input = $request->all();

        $user = User::where('id', '=', $id)->first();

        $user->update([
            'nama' => $input['nama'],
            "email" => $input['email'],
            "password" => Hash::make($input['password']),
            'no_wa' => $input['no_wa'],
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $informasi_siswa = InformasiSiswa::where('user_id', $user->id)->first();

        if(!empty($informasi_siswa)) 
        {
            Storage::disk('public')->delete($informasi_siswa->pas_foto);
    
            Storage::disk('public')->delete($informasi_siswa->akta_kelahiran);
    
            Storage::disk('public')->delete($informasi_siswa->kartu_keluarga);
    
            Storage::disk('public')->delete($informasi_siswa->ktp_ortu);
    
            $informasi_siswa->delete();
        }

        $user->delete();

        return redirect()->route('user.index');
    }

    public function export()
    {
        return Excel::download(new UserExport, 'DataUser'.'.xlsx', 'Xlsx');
    }
}
