<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Exports\BukuTamuExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Models\Buku_tamu;

class Buku_TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Tampilkan seluruh data  mahasnatri
        $ar_buku_tamu = DB::table('buku_tamu') 
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
        ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
        ->select('buku_tamu.*', 'jabatan.nama AS tan', 'tamu.nama AS tam')->get();

        // $ar_buku_tamu = DB::table('buku_tamu')->get(); 
    return view('buku_tamu.index', compact('ar_buku_tamu'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengarahkan ke hal form input buku tamu
        return view('Buku_tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
                'tamu_id'=>'required', 
                'jabatan_id'=>'required',
                'tgl_bertemu'=>'required', 
                'keperluan'=>'required',
            ],
            //2. menampilkan pesan kesalahan
            //(di slide selanjutnya)
        
            //pesan kesalahan saat invalid data (kelanjutan slide sebelumnya)
            [
                'tamu_id.required'=>'Nama Tamu Wajib di Isi', 
                'jabatan_id.required'=>'Jabatan Wajib di Isi',
                'tgl_bertemu.required'=>'Tanggal Bertemu Wajib di Isi', 
                'keperluan.required'=>'Keperluan Wajib di Isi',
               
                
            ],
        );

        //proses input data, tangkap reques dari form
        DB::table('buku_tamu')->insert(
            [
                'tamu_id' => $request->tamu_id,
                'jabatan_id'=>$request->jabatan_id,
                'tgl_bertemu' =>$request->tgl_bertemu,
                'keperluan'=>$request->keperluan,
               
            ]
        );
        //landing page
        return redirect('/buku_tamu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilkan detail buku_tamu
        $ar_buku_tamu = DB::table('buku_tamu')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->select('buku_tamu.*', 'jabatan.nama AS tan', 'tamu.nama AS tam')
            ->where('buku_tamu.id', '=', $id)->get();
        return view('buku_tamu.show',compact('ar_buku_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku_tamu
        $data = DB::table('buku_tamu')
            ->where('id','=',$id)->get();
        return view('buku_tamu.form_edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan_id' => 'required|string',
            'tamu_id' => 'required|string',
            'tgl_bertemu'=> 'required|string',
            'keperluan' => 'required|string',
        ]);

        $rs = Buku_tamu::find($id);
        $rs->update($request->all());

        return redirect()->route('buku_tamu.index')
            ->with('success', 'Data tamu updated successfully.');
    }

    public function buku_tamuPDF()
    {
        //Tampilkan seluruh data buku
        $ar_buku_tamu = DB::table('buku_tamu') //join tabel dengan Query Builder Laravel
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->select('buku_tamu.*', 'tamu.nama AS tam', 'jabatan.nama AS tan')->get();
            $pdf = PDF::loadView('buku_tamu.buku_tamuPDF',['ar_buku_tamu'=>$ar_buku_tamu]);
        return $pdf->download('dataBukuTamu.pdf');
    }

    public function buku_tamucsv()
    {
        return Excel::download(new BukuTamuExport, 'buku_tamu.csv');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('buku_tamu')->where('id',$id)->delete();
        return redirect('/buku_tamu');
    }
}