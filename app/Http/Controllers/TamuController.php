<?php

namespace App\Http\Controllers;
use DB;
use PDF;

use Illuminate\Http\Request;
use App\Models\Tamu;

class TamuController extends Controller
{
    public function index() //fungsi untuk menampilkan data tamu
    {
        //dapatkan seluruh data tamu dengan query builder
        $ar_tamu = DB::table('tamu')->get();
        
        return view('tamu.index',compact('ar_tamu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input
        return view('tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'nama'=>'required',
                'gender'=>'required',
                'no_hp' => 'required',
                'alamat' => 'required',
            ],
            //2. menampilkan pesan kesalahan
            //(di slide selanjutnya)
        
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'nama.required'=>'Nama Wajib di Isi',
                'gender.required'=>'Gender Wajib di Isi', 
                'no_hp.numeric'=>'Harus Berupa Angka',
                'alamat.required'=>'Alamat Tidak Boleh Kosong',  
            ],
        );

        //proses input data, tangkap reques dari form
        DB::table('tamu')->insert(
            [
                'nama' =>$request->nama,
                'gender' => $request->gender,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
            ]
        );
        //landing page
        Tamu::create($request->all());
        return redirect('/tamu')->with('Tamu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_tamu = DB::table('tamu')->where('id','=',$id)->get();
        return view('tamu.show', compact('ar_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('tamu.edit', compact('tamu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'gender' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $tamu = Tamu::findOrFail($id);
        $tamu->update($request->all());

        return redirect('/tamu')->with('Tamu berhasil ditambahkan.');
    }

    public function tamuPDF()
    {
        //Tampilkan seluruh data 
        $ar_tamu = DB::table('tamu')->get();
            $pdf = PDF::loadView('tamu.tamuPDF',['ar_tamu'=>$ar_tamu]);
        return $pdf->download('dataTamu.pdf');
    }

    public function tamucsv()
    {
        return Excel::download(new TamuExport, 'tamu.csv');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();

        return redirect('/tamu')->with('Tamu berhasil di habpus.');
    }
}
