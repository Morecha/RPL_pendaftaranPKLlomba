<?php

namespace App\Http\Controllers;

use App\Models\queue;
use Illuminate\Http\Request;
use App\Models\User;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.pendaftaranjalurlomba.index',compact('users'));
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
        //
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
    public function edit(queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(queue $queue)
    {
        //
    }
}
