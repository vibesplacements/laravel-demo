<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Teepluss\Restable\Restable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ApiController extends Controller
{

    use AuthenticatesUsers;
    /**
     * Checking permission.
     *
     * @return Response
     */
    public function __construct(Restable $rest)
    {
        $this->rest = $rest;
    }
    
    public function auth(Request $request){
        if (auth()->guard()->attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $token = base64_encode($request->get('email').':'.$request->get('password'));
            $user = auth()->user();
            $data = [
                'token' => $token,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                ];
            
        }else{
            $data = ['message' => 'Invalid email or password or inactive user', 'code' => 401];
        }
        return $this->rest->single($data)->render();
    }
}
