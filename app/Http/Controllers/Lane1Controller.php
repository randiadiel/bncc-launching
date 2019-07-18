<?php

namespace App\Http\Controllers;

use App\Lane1;
use App\Register;
use Illuminate\Http\Request;

class Lane1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Lane1::all();
        $registers =Register::all();
        return view('register.lanea',compact('users','registers'));
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
        $data = $this->validate($request,[
            'bnccId'=>['required'],
            'nama'=>['required'],
            'email'=>['required','email','unique:registers,email'],
            'nim'=>['required','numeric','digits:10','unique:registers,nim'],
            'tlp'=>['required','min:8','max:15','unique:registers,tlp'],
            'lineId'=>['required','unique:registers,lineId'],
        ]);
        Lane1::create([
            'bnccId'=>$data['bnccId'],
            'nama'=>$data['nama'],
            'email'=>$data['email'],
            'nim'=>$data['nim'],
            'tlp'=>$data['tlp'],
            'lineId'=>$data['lineId'],
        ]);
        $lane= 'A';
        Register::create([
            'bnccId'=>$data['bnccId'],
            'nama'=>$data['nama'],
            'email'=>$data['email'],
            'nim'=>$data['nim'],
            'tlp'=>$data['tlp'],
            'lineId'=>$data['lineId'],
            'lane'=>$lane,
        ]);
        return view('register.lanea', compact('bncc_id','lane'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lane1  $lane1
     * @return \Illuminate\Http\Response
     */
    public function show(Lane1 $lane1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lane1  $lane1
     * @return \Illuminate\Http\Response
     */
    public function edit(Lane1 $lane1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lane1  $lane1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lane1 $lane1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lane1  $lane1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lane1 $lane1)
    {
        //
    }
}
