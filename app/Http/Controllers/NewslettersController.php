<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Newsletter;
use Validator;
use App\User;

class NewslettersController extends Controller
{
    
    public function getSubscribe()
    {
        return view('articles.subscribe');
    }

    public function unsubscribe(User $user, Newsletter $newsletter)
    {
        $user->newsletters()->updateExistingPivot($newsletter->id,['status'=>'UNSUBSCRIBED']);
        $user->newsletters = $user->newsletters();
        $response = [
            'msg' => 'User unsubscribed ',
            'user' => $user,
        ];
        return response()->json($response, 200);
    }

    public function subscribe(User $user, Newsletter $newsletter){
        if(!$user->newsletters->contains($newsletter->id))
            $user->newsletters()->attach($newsletter->id);
        $user->newsletters = $user->newsletters();

        $response = [
            'msg' => 'User subscribed to'.$newsletter->title,
            'user' => $user,
        ];
        return response()->json($response, 200);
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }


    public function register(){
        
        $news = new Contacts();
        $news->email = $_GET['news'];
        $news->save();
        return redirect('/');


        }

    

}
