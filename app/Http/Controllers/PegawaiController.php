<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai=Pegawai::all();
        return view('pegawai.index',compact('pegawai'));
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
            'name'=>'required|max:30',
            'last_name'=>'required|max:20',
            'address'=>'required|max:35',
            'nohp' => 'required|max:13'
        ];
        $pesan=[
            'name.required'=>'Name harus diisi..!!!',
            'name.max'=>'Name maksimal 30 karakter..!!!',
            'last_name.required'=>'Last Name harus diisi..!!!',
            'last_name.max'=>'Last Name maksimal 20 karakter..!!!',
            'address.required'=>'Address harus diisi..!!!',
            'address.max'=>'Address maximal 100 karakter..!!!',
            'nohp.required'=>'Phone Number harus diisi',
            'nohp.max'=>'Maksimal 12 digit..!!!'
        ];

        $this->validate($request,$rules,$pesan);
        $n=$request->name;
        $l=$request->last_name;
        $a=$request->address;
        $no=$request->nohp;
    

         $pegawai=Pegawai::create([
            'name'=> $n,
            'last_name'=> $l,
            'address'=> $a,
            'nohp'=> $no
        ]);
         return redirect('pegawai')->with('berhasil','Data Tersimpan');
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
            'name'=>'required|max:30',
            'last_name'=>'required|max:20',
            'address'=>'required|max:35',
            'nohp' => 'required|max:13'
        ];
        $pesan=[
            'name.required'=>'Name harus diisi..!!!',
            'name.max'=>'Name maksimal 30 karakter..!!!',
            'last_name.required'=>'Last Name harus diisi..!!!',
        ];
         $this->validate($request,$rules,$pesan);
        $n=$request->name;
        $l=$request->last_name;
        $a=$request->address;
        $no=$request->nohp;
        
        $pegawai=Pegawai::findOrFail($request->id_pegawai);
        Pegawai::find($request->id_pegawai)->update([
            'name'=> $n,
            'last_name'=> $l,
            'address'=> $a,
            'nohp'=> $no
        ]);
         return back()->with('edit','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pegawai=Pegawai::findOrFail($request->id_pegawai);
        $pegawai->delete();
        return redirect()->back()->with('delete','Pegawai '.$pegawai->name.' berhasil dihapus');
    }
}
