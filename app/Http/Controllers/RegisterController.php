<?php

namespace App\Http\Controllers;

use App\Register;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


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
        return view('register.register',compact('users'));

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
        $users = Register::find($id);

        $users->nama =$request->nama;
        $users->email =$request->email;
        $users->nim =$request->nim;
        $users->tlp =$request->tlp;
        $users->lineId =$request->lineId;
        $users->bnccId =$request->bnccId;
        $users->save();

        return redirect('/register/a');
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
            if($search != ""){
                $register = Register::where('email','like','%'.$search.'%')
                                        ->orWhere('nim','like','%'.$search.'%')
                                        ->orWhere('tlp','like','%'.$search.'%')
                                        ->get();
                if(count($register)>0)
                    return view('search')->withDetails($register)->withQuery($search);
            }
        // }
        return view('search')->withMessage('No data found');
    }
}
