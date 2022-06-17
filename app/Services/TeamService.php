<?php
namespace App\Services;

use App\Models\Team;
use Illuminate\Http\Request;


class TeamService{

    public function createTeam(Request $request){

        $team = Team::create([
            'title' => $request->name,
            'description' => $request->description,
        ]);

        return $team;
    }

}