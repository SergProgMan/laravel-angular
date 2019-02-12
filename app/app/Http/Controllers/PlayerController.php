<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has(['start', 'n'])) {
            $start = $request->start;
            $n = $request->n;
            $last= $start + $n;
            $players = Player::whereBetween('id', [$start,$last] )->get();         
            //dd($players);
        }
        if ($request->has('level')){
            $level = $request->level;
            $players = Player::where('level', $level)->get();
            //dd($players);
        }
        if ($request->has('search')){
            $search = $request->search;
            $players = Player::where('id', $search)
                ->orWhere('name', $search)
                ->orWhere('level', $search)
                ->orWhere('score', $search)
                ->get()->all();  
            //dd($players);
        }

        $count = $players->count();

        return response($players, 200)
            ->header('x-total', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nane' => ['required', 'string', new Uppercase],
            'level'=> 'rookie'|'amateur'|'pro',
            'score' => digits_between(0,150),
        ]);

        $player = new Player();
        $player->name = $request->name;
        $player->level = $request->level;
        $player->score = $request->score;
        $player->save();

        return response($player->jsonSerialize(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
