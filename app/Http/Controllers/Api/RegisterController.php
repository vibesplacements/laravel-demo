<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Teepluss\Restable\Restable;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Restable $rest)
    {
        $this->rest = $rest;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|digits:10|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        else{
            $data = ['message' => 'Invalid email or password or inactive user', 'code' => 401];
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $token = base64_encode($user->email.':'.$request->get('password'));
        $data = [
            'token' => $token,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
        ];
        return $this->rest->single($data)->render();
    }
}