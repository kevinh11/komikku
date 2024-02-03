<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    private $current_user;
    private $reviews = [];
    function index() {
        $this->set_user();   
    }

    function fetch_user_products($id) {
        
        $user = User::find($id);
        $reviews = [];
        if (is_null($user)) {
            return redirect('/notfound');
        }


        return $user->products;
        
    }

    function fetch_product_reviews($products) {
        // dd($products);

        // foreach($products as $p) {
        //     dd($p->reviews->toArray());
        // }

        return $products;
    }

    function set_user() {
        
        $found_users = User::where('name', $_COOKIE['currentUser'])->get()->toArray();
    
        if (count($found_users) > 0) {
            $this->current_user = $found_users[0];
            return $this->current_user;
        }
        
        return "";
        

    }
}
