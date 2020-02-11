<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function validator($data)
    {
        $value = [
            'phonenumber'   =>  'required',
        ];
        return Validator::make($data,$value);
    }
    public function registerView()
    {
        return view('auth.register');
    }

    public function registerVerification(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()){
            return response($validator->errors(),423);
        }
        $phonenumber = '09361374744';
        if ($request->phonenumber == $phonenumber){
            return response([
                'message' => 'your active code is : 12345',
            ],200);
        }else{
            return response([
                'message' => 'error when active your phonenumber',
            ],423);
        }
    }
    public function registerCheckVerification(Request $request)
    {
        dd($request->all());
    }
}
