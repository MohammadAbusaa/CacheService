<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('cache/info/{id}',function($id){
    return array(Cache::get('info'.$id));
});
$router->get('cache/books',function(){
    return ([Cache::get('Books')]);
});

$router->post('cache/info/create/{id}',function(Request $request,$id){
    Cache::put('info'.$id,$request->data,60);
});
$router->post('cache/books/create',function(Request $request){
    Cache::put('Books',$request->books,60);
});

$router->delete('cache/invalidate/{id}',function($id){
    Cache::forget('info'.$id);
});