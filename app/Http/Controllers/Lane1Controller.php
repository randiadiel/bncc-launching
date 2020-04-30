<?php

namespace App\Http\Controllers;

use App\Lane1;
use App\Register;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\LaneRequest;

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
        $schedules = Schedule::all();
        return view('register.lanea',compact('users','registers','schedules'));
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
    public function store(LaneRequest $request)
    {
        Lane1::create([
            'bnccId'=>$request->bnccId,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'email'=>$request->email,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
        ]);
        $bncc_id = Lane1::where('nim',$request->nim)->first();
        $lane= 'A';

        Register::create([
            'bnccId'=>$request->bnccId,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'email'=>$request->email,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
            'payment'=>$request->payment,
            'lane'=>$lane,
            'pembayar'=>$request->pembayar,
            'materi'=>$request->materi,
            'schedule_id'=>$request->schedule_id,
        ]);
        $schedules = Schedule::where('id',$request->schedule_id)->first();

        $schedules->increments += 1;
        $schedules->save();


        return redirect('/register/a')->with('message','Register succesful')->withErrors([]);
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
