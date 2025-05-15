<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\data_tahunan;


class tampilanaja extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $jumlah_baris = 10;
        // Ambil input "katakunci" dari request
        $katakunci = $request->input('katakunci', ''); // Default ke string kosong jika tidak ada input
        // Query data berdasarkan kata kunci jika ada
        if (strlen($katakunci)) {
            $data = data_tahunan::
                where('id_daftar_data', 'like', "%$katakunci%")
                ->orWhere('id_skpd', 'like', "%$katakunci%")
                ->orWhere('tahun', 'like', "%$katakunci%")
                ->orWhere('keterangan', 'like', "%$katakunci%")
                ->orWhere('nilai', 'like', "%$katakunci%")
                ->orderBy('id', 'desc')
                ->paginate($jumlah_baris);
                if ($data->isEmpty()) {
                    session()->flash('not_found', "Pencarian untuk '$katakunci' tidak ditemukan.");
                    $data = data_tahunan::orderBy('id', 'desc')->paginate($jumlah_baris);

                }
        } else {
            // Jika tidak ada kata kunci, tampilkan semua data
            $data = data_tahunan::orderBy('id', 'desc')->paginate($jumlah_baris);
            
        }
        return view('Data_bulanan.tampilaja')->with('data', $data);
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
        session()->flash('id_daftar_data', $request->id_daftar_data);
        session()->flash('id_skpd', $request->id_daftar_data);
        session()->flash('tahun', $request->tahun);
        session()->flash('keterangan', $request->keterangan);
        session()->flash('satuan', $request->keterangan);
        session()->flash('nilai', $request->nilai);

        $request->validate([
            // 'id_daftar_data'=> 'required|numeric',
            'id_skpd'=> 'required|numeric',
            'tahun'=> 'required|numeric',
            'keterangan'=> 'required',
            'satuan'=> 'required',
            'nilai'=> 'required|numeric|',
        ],[
            // 'id_daftar_data.required'=>'Tolong inputkan data id daftar data yang valid',
            // 'id_daftar_data.numeric'=>'data id daftar data harus berupa numeric',
            'id_skdp.required'=>'Tolong inputkan data id skpd yang valid',
            'id_skdp.numeric'=>'data id skpd harus berupa numeric',
            'tahun.required'=>'Tolong inputkan data tahun yang valid',
            'tahun.numeric'=>'data tahun harus berupa numeric',
            'keterangan.required'=>'Tolong inputkan data keterangan yang valid',
            'nilai.required'=>'Tolong inputkan data nilai yang valid',
            'nilai.numeric'=>'data nilai harus berupa numeric',
        ]);

        // // Ambil `id_skpd` dari user yang login
        // $id_skpd = Auth::user()->id_skpd;

        //  // Debug: cek nilai id_skpd pengguna yang login
        // dd(Auth::user()->id_skpd);
        
        $data = [
            'id_daftar_data'=>$request->id_daftar_data,
            'id_skpd'=>$request->id_skpd,
            'tahun'=>$request->tahun,
            'keterangan'=>$request->keterangan,
            'satuan'=>$request->satuan,
            'nilai'=>$request->nilai,
        ];
        data_tahunan::create($data);
        return redirect()->to('Data_bulanan.tampilaja')->with('succes', 'berhasil menambahkan data');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
