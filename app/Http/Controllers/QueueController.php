<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\queue;
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
        $queue = DB::table('queues')->where('id_user','=',auth()->id())->get();
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
            "data" => "required|mimes:pdf|max:10000",
            "tanggal_pelaksanaan"=>"required"
        ]);
        // dd($request->file('data'));
        $input = $request->all();
        $input['id_user'] = auth()->id();
        $input['status'] = 'proses';

        if($data = $request->file('data')){
            $destinationPath = 'file/lomba';
            $namaFile = date('YmdHis').".".$data->getClientOriginalExtension();
            $data->move($destinationPath,$namaFile);
            $input['data'] = $namaFile;
        }
        queue::create($input);

        return redirect('/admin/pendaftaranjalurlomba')->with('success','Berhasil Submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(queue $queue)
    {
        //
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
