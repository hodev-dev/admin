<?php

use Carbon\Carbon;
use App\Models\Phone;
use App\Models\Report;
use App\Exports\PhoneExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNull;
use Hekmatinasser\Verta\Facades\Verta;

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
    $v = Verta::createTimestamp((int) $request->date);
    if ($request->filled('sys')) {
        $sum = Phone::where('system', $request->sys)->whereDay('created_at', $v->toCarbon()->day)->count();
        $phones =  Phone::where('system', $request->sys)->whereDay('created_at', $v->toCarbon()->day)->orderBy('id', 'desc')->take($count)->get();
        $reports = Report::where('system', $request->sys)->whereDay('created_at', $v->toCarbon()->day)->orderBy('id', 'desc')->take($count)->get();
    } else {
        $sum =  Phone::whereDay('created_at', $v->toCarbon()->day)->count();
        $phones =  Phone::whereDay('created_at', $v->toCarbon()->day)->take($count)->get();;
        $reports = Report::whereDay('created_at', $v->toCarbon()->day)->take($count)->get();
    }
    return view('phones', [
        'phones' => $phones,
        'reports' => $reports,
        'sum' => $sum,
        'count' =>  $request->query('count'),
        'sys' =>  $request->query('sys'),
        'date' => $request->query('date')
    ]);
});


Route::get('/excel', function (Request $request) {
    return Excel::download(new PhoneExport($request->sys, $request->count . $request->date), "اطلاعات مخاطبین و شماره ها.xlsx");
});
