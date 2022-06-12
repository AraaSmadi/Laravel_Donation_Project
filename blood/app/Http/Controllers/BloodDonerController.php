<?php

namespace App\Http\Controllers;

use App\Models\blood_doner;
use App\Http\Requests\Storeblood_donerRequest;
use App\Http\Requests\Updateblood_donerRequest;
use App\Models\blood_type;
use Illuminate\Http\Request;
use Validator;
 use Illuminate\Support\Facades\Hash;
class BloodDonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        return view('blood_doner.login');
    }
    public function check(Request $request){
        $user = blood_doner::where('b_d_email' , $request->input('Email'))->first();
        if(isset($user)){
            if(Hash::check($request->input('password'), $user->b_d_password)){
                return view('blood_doner.profile');
            }
            else{
                return 'email or password not correct ';
            }
        }
        else{
            return 'email not exiset';
        }
        
    }


    public function index()
    {
        $blood = blood_type::all();
        return view('blood_doner.create' )->with('blood' , $blood);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $blood = blood_type::all();
        return view('blood_doner.create' )->with('blood' , $blood);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeblood_donerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeblood_donerRequest $request)
    {
        $input = Validator::make($request->all(),['b_d_name'=>'required|max:255' ,
        'b_d_gender'=>'required|max:255' ,
        'b_d_phone' =>'required|max:255' ,
        'b_d_address'=>'required|max:255' ,
        'b_d_email'=>'required|unique:blood_doners' ,
        'b_d_password'=>'required|max:255' ,
        'b_d_reprt'=>'required|max:255' ,
        'b_d_age' =>'required|max:255',
        'status' =>'required|max:255',
        'b_d_blood_type'=>'required|max:255'])->validate();

        $input['b_d_password'] = Hash::make($request->input('b_d_password'));

        if($request->file('b_d_reprt')){
            $file= $request->file('b_d_reprt');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $input['b_d_reprt'] = "$filename";
        }  

        blood_doner::create($input);    
        return redirect('doner');
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blood_doner  $blood_doner
     * @return \Illuminate\Http\Response
     */
    public function show(blood_doner $blood_doner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blood_doner  $blood_doner
     * @return \Illuminate\Http\Response
     */
    public function edit(blood_doner $blood_doner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateblood_donerRequest  $request
     * @param  \App\Models\blood_doner  $blood_doner
     * @return \Illuminate\Http\Response
     */
    public function update(Updateblood_donerRequest $request, blood_doner $blood_doner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blood_doner  $blood_doner
     * @return \Illuminate\Http\Response
     */
    public function destroy(blood_doner $blood_doner)
    {
        //
    }
}
