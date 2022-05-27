<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $users = \App\Models\User::withCount(['posts', 'votes'])->withAvg('votes', 'vote')->limit(10)->get();

    $users->each(function(\App\Models\User $user){
//        dump([$user->id, $user->posts_count, $user->votes_count, $user->votes()->avg('vote')]);
        dump([$user->id, $user->posts_count, $user->votes_count, $user->votes_avg_vote]);
    });

    return '';

    return view('welcome');
});

Route::get('countries', function(){
    $countries = \App\Models\Country::withCount('posts')->get();

    dump($countries->pluck('posts_count'));

    $countries->each(function(\App\Models\Country $country){
        dump($country->posts_count);
    });

    dump($countries);
});
