<?php

use App\Exports\PhoneExport;
use App\Models\Phone;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;

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
    $count = ($request->count) ? $request->count : 30;
    if ($request->filled('sys')) {
        $sum = Phone::where('system', $request->sys)->whereDate('created_at', Carbon::today())->count();
        $phones =  Phone::where('system', $request->sys)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($count)->get();
        $reports = Report::where('system', $request->sys)->whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->take($count)->get();
    } else {
        $sum =  Phone::count();
        $phones =  Phone::whereDate('created_at',  Carbon::today()->toDateString())->take($count)->get();;
        $reports = Report::take($count)->get();
    }
    return view('phones', ['phones' => $phones, 'reports' => $reports, 'sum' => $sum, 'count' =>  $request->query('count'), 'sys' =>  $request->query('sys')]);
});


Route::get('/excel', function (Request $request) {
    return Excel::download(new PhoneExport($request->sys, $request->count), "اطلاعات مخاطبین و شماره ها.xlsx");
});
