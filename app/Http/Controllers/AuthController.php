<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    private $data = [];
    private $login_counter = 0;
    private $previous_email = "";
    
    function set_user_cookies($user) {
        //30 days
        $period = 60 * 24 * 30;

        Cookie::queue(Cookie::make('loggedIn', 'true', $period));
        Cookie::queue(Cookie::make('currentUser', $user, $period));
    }

    function logout() {
        $loggedIn = Cookie::forget('loggedIn');
        $current = Cookie::forget('currentUser');

        Cookie::queue($loggedIn);
        Cookie::queue($current);
        return redirect('/');
    }    
    function login(Request $request) {
        $this->data = $request->toArray();
        $email = $this->data['email'];
        $pass = $this->data['pwd'];
        $matching = User::where('email', $email)->get();

        //if there are any matching names in Database
        if (count($matching) > 0) {
            $match = $matching[0];

            //if entered password matches decrypted hash, set login cookies
            if (password_verify($pass, $match->password)) {
                $this->set_user_cookies($match->name);
                return redirect('/');
            }
            return redirect()->back()->with('loginMsg', 'password tidak cocok dengan email. Coba lagi');
        }

        return redirect()->back()->with('loginMsg', 'email tidak ditemukan');
        
    }

     function signup(Request $request) {
        $this->data = $request->toArray();

        //get all necessary details of request
        $username = $this->data['username'];
        $email = $this->data['email'];
        $pass = $this->data['pwd'];
        $birthdate = $this->data['dob'];

        $matching = User::where('name', $username)->get();

        $validator = Validator::make($request->all(), [
            'username'=>'required|max:15',
            'email' => 'required|email',
            'pwd' => 'required|min:8',
        ]);
    
        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //if there are no matching records, make account. Otherwise tell it 
        if (count($matching) == 0) {
            User::create([
                'name'=> $username,
                'email'=> $email,
                'password'=> password_hash($pass, PASSWORD_BCRYPT),
                'user_dob' => $birthdate
            ]);

            return redirect('/signup/success');
        }

        
        return back()->with('success', 'username already exists');
        
    }
}
