<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGemRequest;
use App\Http\Requests\UpdateGemRequest;
use App\Models\Gem;
use App\Models\GemTransaction;

class GemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gems = Gem::take(10)->latest()->get();

        // I made some views too
        // return view('gem.index', ['gems'=>$gems]);
        
        return response()->json(['gems' => $gems]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GemTransaction  $gemTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(int $userId)
    {
        // $userId could be Auth::user()->id;
        $gem = Gem::where('user_id', $userId)->with(['transactions' => function($query){
            return $query->take(5)->latest();
        }])->firstOrFail();

        // I made some views too
        // return view('gem.show', ['gem'=>$gem]);

        return response()->json(['gem' => $gem]);
    }
}
