<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\blood_type;
use App\Models\blood_doner_needed;
use App\Models\blood_doner;
use Session ;


class login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if(Session::has('user_email'))
        {
            
         return redirect()->route('patient.index');
        }
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {if(Session::has('user_email'))
        {
            
            return 'you are all ready logged in ';
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $user= blood_doner::where('b_d_email',$email)->first(); 
        if(isset($user)){
            if(Hash::check($password,$user->b_d_password )){
                $request->session()->put( 'user_email' , $user-> b_d_email );
                return 'you logged in ';
            }
             else{
                return 'password incorrect ';
            }
        }
        else{
            $user= blood_doner_needed::where('b_d_n_email',$email)->first();
             if(isset($user)){
                if(Hash::check($password , $user->b_d_n_password )){
                    $request->session()->put( 'user_email' , $user-> b_d_n_email );
                    return 'you logged in ';
                }
                else{
                    return 'password incorrect ';
                }
             }
             else{
                return 'email dose not exsist';
             }
        }
       
         
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ,Request $request)
    {
       
    }
}
