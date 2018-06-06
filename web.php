<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/signUp', function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$a=App\User::create([
		"login"=>$req->login,
		"email"=>$req->email,
		"password"=>$req->password
	]);
	return $a;
});





Route::get("/signIn", function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$b=DB::table('users')->where("login", $req->login)->where("password", $req->password)->get();
	return $b;
});
Route::get("/ajax", function(){
	header("Access-Control-Allow-Origin:*");
	//$b=DB:table("clients")->where("")->get(),
	
});
Route::get("/endUpN", function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$a=App\Client::create([
		"nameMain"=>$req->nameMain,
		"lastnameMain"=> $req->lastnameMain,
		"nameChild"=> $req->nameChild,
		"lastnameChild"=> $req->lastnameChild,
		"contact"=> $req->contact,
		"diagnosis"=> $req->diagnosis,
		"limitation"=> $req->limitation,
	]);
	return $a;
});
Route::get("/endUpV", function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$a=App\Volonter::create([
		"name"=>$req->name,
		"lastname"=> $req->lastname,
		"passport"=> $req->passport,
	
		"contact"=> $req->contact,
		
	]);
	return $a;
});
Route::get("/addPost", function(Request $req){
	header("Access-Control-Allow-Origin:*");
	$a=App\Post::create([
		"from"=>$req->from,
		"to"=>$req->to,
		"description"=> $req->description,
		"status"=>0,
		"user_id"=>$req->user_id,
		
	]);
	return $a;
});
Route::get('/ads', function(){
     header('Access-Control-Allow-Origin:*');
   $b=DB::table('posts')->where("status",0)->get();
    return $b;
    
});
/*Route::get('/name', function(Request $req){
     header('Access-Control-Allow-Origin:*');
   $b=DB::table('volonters')->where("name",$req->name)->get();
	 //$c=DB::table('users')->where("email",$req->email)->get();
    return $b;
    
});*/