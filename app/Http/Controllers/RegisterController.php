<?php

namespace App\Http\Controllers;

use App\Register;
use DB;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\LaneRequest;
use App\Http\Requests\SoloLaneRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Register::all();
        return view('data',compact('users'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id =$request->id;
        $users = Register::find($id);
        $schedules = Schedule::all();
        return view('register.register',compact('users','schedules'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register,$id)
    {

        $decrements = Schedule::where('id',$request->decrements)->first();
        $decrements->increments -= 1;
        $decrements->save();

        $users = Register::find($id);

        $users->nama =$request->nama;
        $users->jurusan =$request->jurusan;
        $users->email =$request->email;
        $users->nim =$request->nim;
        $users->tlp =$request->tlp;
        $users->lineId =$request->lineId;
        $users->bnccId =$request->bnccId;
        $users->payment =$request->payment;
        $users->schedule_id =$request->schedule_id;
        $users->pembayar =$request->pembayar;
        $users->save();


        $schedules = Schedule::where('id',$request->schedule_id)->first();

        $schedules->increments += 1;
        $schedules->save();
        return redirect('/search');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }

    public function search(Request $request){

        // if(request()->has('lane')){
        //     $registers =App\Register::where('lane', request('lane'))->paginate(5)->appends('lane',request('lane'));
        // }
        // else{
            $search = Input::get('search');
            // $user = Register::where('nim',$search)->first();

            if($search != ""){
                $register = Register::where('email','like','%'.$search.'%')
                                        ->orWhere('nim','like','%'.$search.'%')
                                        ->orWhere('tlp','like','%'.$search.'%')
                                        ->get();
                if(count($register)>0)
                    return view('search')->withDetails($register)->withQuery($search);
            }
        // }

        // if($user == null){
            return view('search')->withMessage('No data found');
        // }
        // $register = Register::where('nim', $search)->first();
        // return view('search', compact('register','user'));

                        // $register = Register::where('nim','=',$search)->first();
    }

    public function searchv1(Request $request){

        $search = Input::get('search');
            $user = Register::where('nim',$search)->first();

        if($user == null){
            return view('user.data',compact('user'))->withMessage('No data found');
        }
        $register = Register::where('nim', $search)->first();
        $schedules = Schedule::all();
        return view('user.data', compact('register','user','schedules'));
    }

    public function viewinput(){
        return view('user.input');
    }
    public function viewchanges(Request $request){
        $id =$request->id;
        $registers = Register::find($id);
        return view('user.data',compact('registers'));
    }
    public function changes(SoloLaneRequest $request)
    {

        $nim = Input::get('nim');
        $register = Register::where('nim',$nim)->first();

        $register->nama =$request->nama;
        $register->jurusan =$request->jurusan;
        $register->email =$request->email;
        $register->nim =$request->nim;
        $register->tlp =$request->tlp;
        $register->lineId =$request->lineId;
        $register->payment =$request->payment;
        $register->schedule_id =$request->schedule_id;
        $register->save();

        return redirect('/user');
    }

    public function games(){

        return view('games.games');
    }

    public function gameslogin(Request $request){

        $nim = Input::get('nim');
        $users = Register::where('nim',$nim)->first();

        if($users->game == 0){
            $users->game = 1;
            $users->save();
            return view('games.games-data',compact('users'));
        }

        return redirect('/games')->with('failed','Id sudah terpakai');
    }

    public function gamesdata(){
        return view('games.game-data');
    }

}
