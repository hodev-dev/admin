<?php

use App\Models\Phone;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
    return view('welcome');
});


Route::get('/', function (Request $request) {
    $count = ($request->count) ? $request->count : 25;
    if (isset($request->sys) && $request->sys != null) {
        $sum = Phone::where('system', $request->sys)->whereDate('created_at', Carbon::today())->count();
        $phones =  Phone::where('system', $request->sys)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($count)->get();
        $reports = Report::where('system', $request->sys)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($count)->get();
    } else {
        $sum =  Phone::whereDate('created_at', Carbon::today())->count();
        $phones =  Phone::whereDate('created_at', Carbon::today())->orderBy('system', 'desc')->take($count)->get();
        $reports = Report::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($count)->get();
    }
    return view('phones', ['phones' => $phones, 'reports' => $reports, 'sum' => $sum, 'count' =>  $request->query('count'), 'sys' =>  $request->query('sys')]);
});
