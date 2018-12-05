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

/**
 * Display all quotes
 */
Route::get('/', function () {
    $quotes = \App\Quote::orderBy('created_at', 'asc')->get();

    return view('quotes', [
        'quotes' => $quotes
    ]);
});

/**
 * Add a new quote
 */
Route::post('/quote', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'quote' => 'required|max:1023',
        'quotist' => 'required|max:63',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $quote = new \App\Quote;
    $quote->quote = $request->quote;
    $quote->quotist = $request->quotist;
    $quote->save();

    //return redirect('/');
});
