<?php

namespace App\Http\Controllers;

use App\Lane4;
use App\Register;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\LaneRequest;
use App\Http\Requests\SoloLaneRequest;

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
        $schedules = Schedule::all();
        return view('register.laned',compact('users','registers','schedules'));
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

        Lane4::create([
            'nama'=>$request['nama'],
            'jurusan'=>$request['jurusan'],
            'email'=>$request['email'],
            'nim'=>$request['nim'],
            'tlp'=>$request['tlp'],
            'lineId'=>$request['lineId'],
        ]);
        $bncc_id = Lane4::where('nim',$request['nim'])->first();
        $lane= 'D';
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
            'schedule_id'=>$request->schedule_id,
            'materi'=>$request->materi,
        ]);
        $schedules = Schedule::where('id',$request->schedule_id)->first();

        $schedules->increments += 1;
        $schedules->save();

        return redirect('/register/d')->with('message','Register succesful');;
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
