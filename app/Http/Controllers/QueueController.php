<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\queue;
use App\Models\pengajuan;
use App\Models\User;
use App\Models\accepted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queue = DB::table('pengajuans')
                 ->join('queues', 'pengajuans.id', '=', 'queues.id_pengajuan')
                 ->where('id_user','=',auth()->id())->get();
        // dd($queue);
        return view('admin.pendaftaranjalurlomba.index',compact('queue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pendaftaranjalurlomba.create');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create2($id)
    // {
    //     dd($id);
    //     return view('admin.pendaftaranjalurlomba.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_lomba"=>"required",
            "jenjang_pelaksanaan"=>"required",
            "rank"=>"required",
            "awal_pelaksanaan"=>"required",
            "akhir_pelaksanaan"=>"required",
            "pembimbing"=>"required",
            "kategori_lomba"=>"required",
            "penyelenggara"=>"required",
            "URL_lomba"=>"required",
            "tempat_lomba"=>"required",
            "produk_lomba"=>"required",
            "sumber_dana"=>"required",
            "data" => "required|mimes:pdf|max:10000",
            "proposal"=>"required|mimes:pdf|max:10000",
        ]);

        $input = $request->all();
        //pisah queues dan pengajuans
        $pengajuan['id_user']= auth()->id();
        $pengajuan['awal_pelaksanaan']= $input['awal_pelaksanaan'];
        $pengajuan['akhir_pelaksanaan']= $input['akhir_pelaksanaan'];
        $pengajuan['tahap']= '1';
        $pengajuan['status']= 'proses';

        pengajuan::create($pengajuan);

        $angel = DB::table('pengajuans')
                    ->where('id_user','=',auth()->id())
                    ->where('awal_pelaksanaan','=',$pengajuan['awal_pelaksanaan'])
                    ->where('akhir_pelaksanaan','=',$pengajuan['akhir_pelaksanaan'])
                    ->where('tahap','=',$pengajuan['tahap'])
                    ->where('status','=',$pengajuan['status'])
                    ->orderBy('created_at','desc')->first();

        $queue['id_pengajuan']= $angel->id;
        $queue['nama_lomba']= $input['nama_lomba'];
        $queue['kategori_lomba']= $input['kategori_lomba'];
        $queue['penyelenggara']= $input['penyelenggara'];
        $queue['produk_lomba']= $input['produk_lomba'];
        $queue['pembimbing']= $input['pembimbing'];
        $queue['URL_lomba']= $input['URL_lomba'];
        $queue['tempat_lomba']= $input['tempat_lomba'];
        $queue['sumber_dana']= $input['sumber_dana'];
        $queue['jenjang_pelaksanaan']= $input['jenjang_pelaksanaan'];
        $queue['rank']= $input['rank'];

        if($data = $request->file('data')){
            $destinationPath = 'file/lomba';
            $namaFile = date('YmdHis').".".$data->getClientOriginalExtension();
            $data->move($destinationPath,$namaFile);
            $queue['data'] = $namaFile;
        }
        if($proposal = $request->file('proposal')){
            $destinationPath = 'file/proposal';
            $namaFile = date('YmdHis').".".$proposal->getClientOriginalExtension();
            $proposal->move($destinationPath,$namaFile);
            $queue['proposal'] = $namaFile;
        }

        queue::create($queue);

        // return view('admin.pendaftaranjalurlomba.create2',compact('id'));
        return redirect('/admin/pendaftaranjalurlomba')->with('success','Tahap pertama telah selesai');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store2(Request $request, $id)
    // {

    //     return redirect('/admin/pendaftaranjalurlomba')->with('success','Berhasil Submit');
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */

    public function kelompok($id)
    {
        $queue = queue::find($id);
        // dd($queue);
        return view('admin.pendaftaranjalurlomba.kelompok',compact('queue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */

    public function storekelompok($request, $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(queue $queue, $id)
    {
        $queue = queue::find($id);
        $file = $queue['data'];

        return response()->file('file/lomba/'.$file);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function proposal(queue $queue, $id)
    {
        $queue = queue::find($id);
        $file = $queue['proposal'];
        dd($file);
        return response()->file('file/proposal/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lomba = queue::find($id);
        // dd($lomba);
        return view('admin.pendaftaranjalurlomba.edit', compact('lomba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = queue::find($id);
        $this->validate($request, [
            "nama_lomba"=>"required",
            "jenjang_pelaksanaan"=>"required",
            "rank"=>"required",
            "tanggal_pelaksanaan"=>"required"
        ]);
        if(isset($request->data)){
            $this->validate($request,[
                "data" => "required|mimes:pdf|max:10000"
            ]);
        }

        $input = $request->all();
        $old_data = 'file/lomba/'.$update->data;

        if(isset($request->data)){
            if($data = $request->file('data')){
                $destinationPath = 'file/lomba';
                $namaFile = date('YmdHis').".".$data->getClientOriginalExtension();
                $data->move($destinationPath,$namaFile);
                $input['data'] = $namaFile;

                if(file_exists($old_data)){
                    unlink($old_data);
                }
            }
        }

        $update->fill($input)->save();
        return redirect('admin/pendaftaranjalurlomba')->with('success','Berhasil Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = queue::find($id);
        $old_data = 'file/lomba/'.$destroy->data;
        $destroy->delete();

        if(file_exists($old_data)){
            unlink($old_data);
        }

        return redirect('admin/pendaftaranjalurlomba')->with('success','Berhasil Delete');
    }
}
