<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\InformasiSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\InformasiSiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class InformasiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi_siswas = InformasiSiswa::latest()->get();
        
        return view('admin.siswa', compact('informasi_siswas'));
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
            'nama_lengkap' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'no_hp' => 'required',
            'pekerjaan_ortu' => 'required',
            'penghasilan_ortu' => 'required|numeric',
            'kepemilikan_rumah' => 'required',
            'pas_foto' => 'required|max:2048|mimes:jpg,png,jpeg',
            'akta_kelahiran' => 'required|max:2048|mimes:jpg,png,jpeg,pdf',
            'kartu_keluarga' => 'required|max:2048|mimes:jpg,png,jpeg,pdf',
            'ktp_ortu' => 'required|max:2048|mimes:jpg,png,jpeg,pdf',
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ortu' => $request->nama_ortu,
            'no_hp' => $request->no_hp,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
            'penghasilan_ortu' => $request->penghasilan_ortu,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
        ];
        
        if($request->hasFile('pas_foto'))
        {
            $file = $request->pas_foto;
            $file_name_custom = 'pas_foto'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'pas_foto/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['pas_foto'] = $path_full;
        }

        if($request->hasFile('akta_kelahiran'))
        {
            $file = $request->pas_foto;
            $file_name_custom = 'akta_kelahiran'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'akta_kelahiran/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['akta_kelahiran'] = $path_full;
        }

        if($request->hasFile('kartu_keluarga'))
        {
            $file = $request->pas_foto;
            $file_name_custom = 'kartu_keluarga'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'kartu_keluarga/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['kartu_keluarga'] = $path_full;
        }

        if($request->hasFile('ktp_ortu'))
        {
            $file = $request->pas_foto;
            $file_name_custom = 'ktp_ortu'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'ktp_ortu/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['ktp_ortu'] = $path_full;
        }

        $informasi_siswa = InformasiSiswa::create($input);

        return redirect()->route('lihat-informasi-siswa');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $informasi_siswa = InformasiSiswa::where('user_id',  Auth::user()->id)->first();

        return view('lihat-informasi-siswa', compact('informasi_siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $informasi_siswa = InformasiSiswa::where('id', '=', $id)->first();

        return view('informasi-siswa.edit', compact('informasi_siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'no_hp' => 'required',
            'pekerjaan_ortu' => 'required',
            'penghasilan_ortu' => 'required',
            'kepemilikan_rumah' => 'required',
            'pas_foto' => 'nullable|max:2048|mimes:jpg,png,jpeg',
            'akta_kelahiran' => 'nullable|max:2048|mimes:jpg,png,jpeg,pdf',
            'kartu_keluarga' => 'nullable|max:2048|mimes:jpg,png,jpeg,pdf',
            'ktp_ortu' => 'nullable|max:2048|mimes:jpg,png,jpeg,pdf',
        ]);

        $input = [
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ortu' => $request->nama_ortu,
            'no_hp' => $request->no_hp,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
            'penghasilan_ortu' => $request->penghasilan_ortu,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
        ];

        $informasi_siswa = InformasiSiswa::where('id', '=', $id)->first();
        
        if($request->hasFile('pas_foto'))
        {
            if($informasi_siswa->pas_foto)
            {
                Storage::disk('public')->delete($informasi_siswa->pas_foto);
            }

            $file = $request->pas_foto;
            $file_name_custom = 'pas_foto'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'pas_foto/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['pas_foto'] = $path_full;
        }

        if($request->hasFile('akta_kelahiran'))
        {
            if($informasi_siswa->akta_kelahiran)
            {
                Storage::disk('public')->delete($informasi_siswa->akta_kelahiran);
            }

            $file = $request->pas_foto;
            $file_name_custom = 'akta_kelahiran'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'akta_kelahiran/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['akta_kelahiran'] = $path_full;
        }

        if($request->hasFile('kartu_keluarga'))
        {
            if($informasi_siswa->kartu_keluarga)
            {
                Storage::disk('public')->delete($informasi_siswa->kartu_keluarga);
            }

            $file = $request->pas_foto;
            $file_name_custom = 'kartu_keluarga'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'kartu_keluarga/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['kartu_keluarga'] = $path_full;
        }

        if($request->hasFile('ktp_ortu'))
        {
            if($informasi_siswa->ktp_ortu)
            {
                Storage::disk('public')->delete($informasi_siswa->ktp_ortu);
            }

            $file = $request->pas_foto;
            $file_name_custom = 'ktp_ortu'. 'f' . time() . '_' . rand(1000, 9999) . '.' . $file->extension();
            $path_full = 'ktp_ortu/' . $file_name_custom;

            Storage::disk('public')->put($path_full, $file->get());

            $input['ktp_ortu'] = $path_full;
        }

        $informasi_siswa = $informasi_siswa->update($input);

        return redirect()->route('lihat-informasi-siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $informasi_siswa = InformasiSiswa::find($id);

        Storage::disk('public')->delete($informasi_siswa->pas_foto);

        Storage::disk('public')->delete($informasi_siswa->akta_kelahiran);

        Storage::disk('public')->delete($informasi_siswa->kartu_keluarga);

        Storage::disk('public')->delete($informasi_siswa->ktp_ortu);

        $informasi_siswa->delete();

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new InformasiSiswaExport, 'DataInformasiSiswa'.'.xlsx', 'Xlsx');
    }
}
