<?php

namespace App\Http\Controllers;

use App\Models\instansi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('instansis')->where('id_user','=',auth()->id())->get();
        // dd($date);
        return view('admin.pendaftaranjalurinstansi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pendaftaranjalurinstansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_perusahaan"=>"required",
            "tanggal_masuk"=>"required",
            "tanggal_selesai"=>"required",
            "nama_direktur" => "required",
            "alamat_kantor"=>"required"
        ]);

        $input = $request->all();
        $input['id_user'] = auth()->id();
        $input['status'] = 'proses';

        // dd($input);
        instansi::create($input);

        return redirect('/admin/pendaftaranjalurinstansi')->with('success','Berhasil Submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function show(instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function edit(instansi $instansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, instansi $instansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(instansi $instansi)
    {
        //
    }
}
