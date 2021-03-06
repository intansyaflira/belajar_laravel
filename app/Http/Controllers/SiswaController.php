<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function show()
    {
        $data_siswa = Siswa::join('kelas', 'kelas.id_kelas', 'siswa.id_kelas')->get();
        return Response()->json($data_siswa);
    }
    
    public function detail($id)
    {
        if(siswamod::where('id', $id)->exists()){
            $data_siswa = Siswa::join('kelas', 'kelas.id_kelas', 'siswa.id_kelas') ->where('siswa.id', '=', $id)->get();
            return Response()->json($data_siswa);
        }
        else{
            return Response()->json(['message' => 'Tidak ditemukan']);
        }
    }
    public function store(Request $request)
 {
    $validator=Validator::make($request->all(),
        [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required'
        ]
    );
    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = Siswa::create([
        'nama_siswa' => $request->nama_siswa,
        'tanggal_lahir' => $request->tanggal_lahir,
        'gender' => $request->gender,
        'alamat' => $request->alamat,
        'id_kelas' => $request->id_kelas
    ]);
 if($simpan)
 {
 return Response()->json(['status' => 1]);
 }
 else
 {
 return Response()->json(['status' => 0]);
 }
}
}
