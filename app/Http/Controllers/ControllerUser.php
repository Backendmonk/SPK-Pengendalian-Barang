<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerUser extends Controller
{
    //


    public function loginAkun(Request $reqdatainput){

        $reqdatainput->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);


        $infolog = [

            'email'=>$reqdatainput->email,
            'password'=>$reqdatainput->password
        ];

        if (Auth::attempt($infolog)) {
            # code...
            return redirect('/index');
          
        }else{
            echo "todak";
        }
        

    }

    public function registerAkunView(){

        return view('Users.registerUser');
    }


    public function RegisterAkunBaru(Request $requestData ){
                $nama = $requestData->nama;
                $email = $requestData->email;
                $password = bcrypt($requestData->pass);


                try {
                    $inputtotb = new User;

                    $inputtotb -> name = $nama;
                    $inputtotb -> email = $email;
                    $inputtotb -> password = $password;


                    $inputtotb->save();

                    return redirect()->route('akunview')->with('pesan','');
                } catch (\Throwable $th) {
                    //throw $th;

                    return redirect()->route('akunview')->with('pesanSalah','');
                }
    }



    public function logout(){

       Auth::logout();
       return redirect()->route('login');
    }
}
