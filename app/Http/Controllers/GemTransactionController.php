<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGemTransactionRequest;
use App\Http\Requests\UpdateGemTransactionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Gem;
use App\Models\GemTransaction;

class GemTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        // Auth::user()->id;
        // $userId or $gemId both available

        // cache all gems
        $gem = \Cache::remember('gems', now()->addMinutes(10), function () {
            return Gem::latest()->get();
        });
        // it's possible to make a cache for each user_id too
        $gem = $gem->where('user_id', $userId)->firstOrFail();

        $page = \Request::input('page','1');

        // with pagination to use with theme
        // caching for each user & page
        // other way to cache the below mechanism is available by using macros 
        // for now let's keep going through this way
        // $transactions = \Cache::remember('gem_transactions_'.$gem->id.'_'.$page, now()->addMinutes(10), function () use($gem, $page) {
        //     return GemTransaction::where('gem_id', $gem->id)->latest()->limit(30)->paginate(10, ['*'], 'page', $page);
        // });

        $transactions = \Cache::remember('gem_transactions'.$userId, now()->addMinutes(10), function () use($gem, $page) {
            return GemTransaction::where('gem_id', $gem->id)->latest()->limit(30)->get();
        });

        // I made some views too
        // return view('gem_transactions.index', ['gem'=>$gem, 'transactions' => $transactions]);

        return response()->json(['transactions' => $transactions]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GemTransaction  $gemTransaction
     * @return \Illuminate\Http\Response
     */
    // public function show(GemTransaction $gemTransaction)
    public function show(int $id)
    {
        $transaction = \Cache::remember('gem_transactions', now()->addMinutes(10), function () {
            return GemTransaction::latest()->get();
        });
        $transaction = GemTransaction::latest()->where(['id' => $id])->firstOrFail();

        // I made some views too
        // return view('gem_transactions.show', ['transaction'=> $transaction]);

        return response()->json(['transaction' => $transaction]);
    }
}
