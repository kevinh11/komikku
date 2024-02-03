<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $user_ctr = new UserController();
    $curr_user = $user_ctr->set_user();
    
    //if there are users registered in the application
    if ($curr_user != "") {
        $data = [
            'uid'=> $curr_user['id']
        ];
    } 

    else {
        $data = [
            'uid'=> ""
        ];
    }
   
    return view('pages.home', ['user_data'=> $data]);
});

Route::get('/login', function() {
    return view('pages.login');
});


Route::get('/signup', function() {
    return view('pages.signup');
});


Route::get('/signup/success', function() {
    return view('pages.success');
});

Route::get('/users/{id}', function($id) {
    $user_ctr = new UserController();
    $curr_user = $user_ctr->set_user();

    $result = $user_ctr->fetch_user_products($id);
    $reviews = $user_ctr->fetch_product_reviews($result);

    

    if ($result instanceof \Illuminate\Http\RedirectResponse) {
        return $result;
    }



    $data = [];
    
    //if there are users registered in the application
    if ($curr_user != "") {
        $data = [
            'uid'=> $curr_user['id'],
            'email'=> $curr_user['email'],
            'pfp'=>$curr_user['profile_picture'],
            'product_count'=> $curr_user['product_count'],
            'username'=> $curr_user['name'],
            'avg_rating' => $curr_user['avg_rating'],
            'products'=>$result
            
        ];
    } 

    else {
        $data = [
            'uid'=> ""
        ];
    }

    return view('pages.profile', ['user_data'=> $data]);
});


Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login/execute', [AuthController::class, 'login']);
Route::post('/signup/execute', [AuthController::class, 'signup']);


