<?php

namespace App\Http\Controllers;

use App\Lane4;
use App\Register;
use Illuminate\Http\Request;

class Lane4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Lane4::all();
        $registers = Register::all();
        return view('register.laned',compact('users','registers'));
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
            'nama'=>['required'],
            'email'=>['required','email','unique:registers,email'],
            'nim'=>['required','numeric','digits:10','unique:registers,nim'],
            'tlp'=>['required','min:8','max:15','unique:registers,tlp'],
            'lineId'=>['required','unique:registers,lineId'],
        ]);
        Lane4::create([
            'nama'=>$data['nama'],
            'email'=>$data['email'],
            'nim'=>$data['nim'],
            'tlp'=>$data['tlp'],
            'lineId'=>$data['lineId'],
        ]);
        $bncc_id = Lane4::where('nim',$data['nim'])->first();
        $lane= 'D';
        Register::create([
            'bnccId'=>$bncc_id->id,
            'nama'=>$data['nama'],
            'email'=>$data['email'],
            'nim'=>$data['nim'],
            'tlp'=>$data['tlp'],
            'lineId'=>$data['lineId'],
            'lane'=>$lane,
        ]);
        return view('register.laned', compact('bncc_id','lane'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lane4  $lane4
     * @return \Illuminate\Http\Response
     */
    public function show(Lane4 $lane4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lane4  $lane4
     * @return \Illuminate\Http\Response
     */
    public function edit(Lane4 $lane4)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lane4  $lane4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lane4 $lane4)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lane4  $lane4
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lane4 $lane4)
    {
        //
    }
}
