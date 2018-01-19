<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Namshi\JOSE\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required |email',
            'password' => 'required |min:5',
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'note' => 'required',
        ]);

        $user = User::query()->where('email','=',$request->input('email'))->get();
        if($user->count()>0)
            return response()->json(['msg' => 'existing user'], 401);

        $email = $request->input('email');
        $passwprd = $request->input('password');
        $username = $request->input('username');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $note = $request->input('note');

        $user = new User([
            'email' => $email,
            'username' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'shopname' => $username,
            'note' => $note,
            'date' => date('Y-m-d H:i:s'),
            'password' => bcrypt($passwprd),
        ]);
        if ($user->save()) {
            $user->signin = [
                'href' => '',
                'method' => 'POST',
                'params' => 'email,password',
                '' => '',
            ];
            $response = [
                'msg' => 'User created',
                'user' => $user
            ];
        }
        return response()->json($response, 201);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        //how to get authenticated user
        if(! $user = JWTAuth::parseToken()->authenticate()){
            return response()->json(['msg'=>'User not found'],404);
        }


        try {
            if (!$token = $this->jwt->attempt($credentials)) {
                return response()->json(['msg' => 'Invalid credential'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }

        return response()->json(['token' => $token], 200);
    }

    public function test(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['msg' => 'Invalid credential'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], 500);
        }

        return response()->json(['token' => "Works"], 200);
    }


}
