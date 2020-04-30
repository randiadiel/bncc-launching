<?php

namespace App\Http\Controllers;

use App\Lane3;
use App\Register;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\LaneRequest;
use App\Http\Requests\SoloLaneRequest;

class Lane3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Lane3::all();
        $registers =Register::all();
        $schedules = Schedule::all();
        return view('register.lanec',compact('users','registers','schedules'));
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
    public function store(SoloLaneRequest $request)
    {

        Lane3::create([
            'nama'=>$request['nama'],
            'jurusan'=>$request['jurusan'],
            'email'=>$request['email'],
            'nim'=>$request['nim'],
            'tlp'=>$request['tlp'],
            'lineId'=>$request['lineId'],
        ]);
        $bncc_id = Lane3::where('nim',$request['nim'])->first();
        $lane= 'C';
        Register::create([
            'bnccId'=>$bncc_id->id,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'email'=>$request->email,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
            'payment'=>$request->payment,
            'lane'=>$lane,
            'pembayar'=>$request->pembayar,
            'schedule_id'=>$request->schedule_id,
            'materi'=>$request->materi,
        ]);
        $schedules = Schedule::where('id',$request->schedule_id)->first();

        $schedules->increments += 1;
        $schedules->save();

        return view('register.after-register', compact('bncc_id','lane'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lane3  $lane3
     * @return \Illuminate\Http\Response
     */
    public function show(Lane3 $lane3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lane3  $lane3
     * @return \Illuminate\Http\Response
     */
    public function edit(Lane3 $lane3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lane3  $lane3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lane3 $lane3)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lane3  $lane3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lane3 $lane3)
    {
        //
    }
}
