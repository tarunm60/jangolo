<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile(Request $request)
    {
        $user = \Auth::user();

        $orders = Order::where('customer_id',$user['id'])->orderBy('id','desc')->take(5)->get();
        
        return view('users.profile',compact('user','orders'));
    }

    public function index()
    {
        $users = User::take(30)->get();
        return response()->json([
            'message' => 'List of all users',
            'count' => count($users),
            'users' => $users
        ], 200);
    }
    public function Session(Request $request, $id)
    {
        $value = $request->session()->get('key');
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

    public function createwithemail($email)
    {
        $currentUser = User::query()->where('email', '=', $email)->first();
        if (count($currentUser) > 0) {
            if(!$currentUser->newsletters->contains(57))
            $currentUser->newsletters()->attach(57);
            $currentUser->newsletters = $currentUser->newsletters();

            $response = [
                'msg' => 'Existing user',
                'user' => $currentUser,
            ];
            return response()->json($response, 200);
        } else {
            $user = new User();
            $user->email = $email;
            $user->username = $email;
            $user->date = date('y-m-d H:i:s');

            try {
                $user->save();
                if(!$user->newsletters->contains(57))
                $user->newsletters()->attach(57);
                $user->newsletters = $currentUser->newsletters();
                $response = [
                    'msg' => 'New user created',
                    'user' => $user,
                ];
                return response()->json($response, 200);
            } catch (Exception $e) {
                $response = [
                    'msg' => $e,
                    'user' => [],
                ];
                return response()->json($response, 500);
            }

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->products = $user->products()->get();
        $user->newsletters = $user->newsletters()->get();
        return response()->json([
            'message' => 'This is a test',
            'user' => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->exists){
            $user->newsletters()->detach();
            $user->delete();
            return response()->json([
                'message' => 'User deleted',
                'user' => $user
            ], 200);
        }
        else
            return response()->json([
                'message' => 'User not found',

            ], 200);



    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required |min:4',
        ]);
        $search = $request->input('search');
        $users = User::query()
            ->where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();
        $response = [
            'msg' => 'Users found',
            'count' => count($users),
            'users' => $users,
        ];


        return response()->json($response, 200)->header('Access-Control-Allow-Origin', 'http://intranet.jangolo.cm')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function searchs($search)
    {

        $users = User::query()
            ->where('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();
        $response = [
            'msg' => 'Users found',
            'count' => count($users),
            'users' => $users,
        ];

        return response()->json($response, 200)
//            ->header('Access-Control-Allow-Origin', 'http://intranet.jangolo.cm')
//            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ;
    }

    public function profile(){
        $user = Auth::user();
        $customer = Customer::find(Auth::id());
        $orders = $customer->orders;
        $products = $user->products;

        return view('users.profile.show',compact('user','customer','orders','products'));
    }

    // public function login()
    // {
    //     $message = '';
    //     $errors = array();

    //     return view('users.login.relog', compact('errors', 'message'));
    // }
    public function login()
    {
       return view('users.login.new_login');
    }

    public function getRegister()
    {
       return view('users.login.register');
    }
//

}
