<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Illuminate\Validation\Rule;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $siswa=Siswa::all();
        return view('welcome',compact('siswa'));
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
         $rules=[
            'nama'=>'required|max:30',
            'jenkel'=>'required',
            'alamat'=>'required|max:100',
        ];
        $pesan=[
            'nama.required'=>'Nama harus diisi..!!!',
            'nama.max'=>'Nama maksimal 30 karakter..!!!',
            'jenkel.required'=>'Jenis Kelmain harus diisi..!!!',
            'alamat.required'=>'Alamat harus diisi..!!!',
            'alamat.max'=>'Alamat maximal 100 karakter..!!!',
        ];

       $this->validate($request,$rules,$pesan);



        $FormData=array(
            'nama'=>$request->nama,
            'jenkel'=>$request->jenkel,
            'alamat'=>$request->alamat
        );
         Siswa::create($FormData);
         return response()->json(['success'=>'Data Tersimpan']);
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
         $rules=[
            'nama'=>'required|max:30',
            'jenkel'=>'required',
            'alamat'=>'required|max:100',
        ];
        $pesan=[
            'nama.required'=>'Nama harus diisi..!!!',
            'nama.max'=>'Nama maksimal 30 karakter..!!!',
            'jenkel.required'=>'Jenis Kelmain harus diisi..!!!',
            'alamat.required'=>'Alamat harus diisi..!!!',
            'alamat.max'=>'Alamat maximal 100 karakter..!!!',
        ];

        $this->validate($request,$rules,$pesan);
        $n=$request->nama;
        $j=$request->jenkel;
        $a=$request->alamat;
        
        $siswa=Siswa::findOrFail($request->id_siswa);
        Siswa::find($request->id_siswa)->update([
            'nama'=> $n,
            'jenkel'=> $j,
            'alamat'=> $a
        ]);
         return back()->with('edit','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $siswa=Siswa::findOrFail($request->id_siswa);
        $siswa->delete();
        return redirect()->back()->with('delete','Siswa '.$siswa->nama.' berhasil dihapus');
    }
}
