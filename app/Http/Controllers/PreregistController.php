<?php

namespace App\Http\Controllers;

use App\Preregist;
use App\Register;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\PreOrderRequest;
use App\Http\Requests\LuckyRequest;

class PreregistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Preregist::all();
        return view('register.pre-order',compact('users'));
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
    public function store(PreOrderRequest $request)
    {
        Preregist::create([
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'email'=>$request->email,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
            'batch'=>$request->batch,
            'type'=>'PR',
        ]);
       return redirect('/registration')->with('message','Register success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preregist  $preregist
     * @return \Illuminate\Http\Response
     */
    public function show(Preregist $preregist)
    {
        $users = Preregist::all();
        return view('search-order',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preregist  $preregist
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id =$request->id;
        $users = Preregist::find($id);
        $schedules = Schedule::all();
        return view('data-order',compact('users','schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preregist  $preregist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preregist $preregist, $id)
    {

        $users = Preregist::find($id);
        $users->nama =$request->nama;
        $users->jurusan =$request->jurusan;
        $users->email =$request->email;
        $users->nim =$request->nim;
        $users->tlp =$request->tlp;
        $users->lineId =$request->lineId;
        $users->payment =$request->payment;
        $users->schedule_id =$request->schedule_id;
        $users->verified =1;
        $users->save();

        Register::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'jurusan'=>$request->jurusan,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
            'payment'=>$request->payment,
            'pembayar'=>$request->nama,
            'schedule_id'=>$request->schedule_id,
            'lane'=>'E',
            'bnccId'=>$users->id,
            'game'=>0,
            'materi'=>$request->materi,
        ]);
        $schedules = Schedule::where('id',$request->schedule_id)->first();

        $schedules->increments += 1;
        $schedules->save();

        return redirect('/search/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preregist  $preregist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preregist $preregist)
    {
        //
    }
    public function luckyview(){
        return view('games.lucky-data')->with('message','Data Success play Lucky Draw once');
    }
    public function luckydata(LuckyRequest $request)
    {
        Preregist::create([
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'email'=>$request->email,
            'nim'=>$request->nim,
            'tlp'=>$request->tlp,
            'lineId'=>$request->lineId,
            'batch'=>'luckydraw',
            'type'=>'LD',
        ]);
       return redirect('/luckydraw')->with('message','Register success');
    }
}
