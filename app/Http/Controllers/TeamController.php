<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateTeamRequest as TeamRequest;
use Illuminate\Support\Facades\Request;
use App\Services\TeamService;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index()
    {
        
    }

/**
 * Admin can create multipale teamss
 * 
 * @param Request $request
 * 
 */
    public function create()
    {

      return Inertia::render('Teams');

    }

    public function store(TeamRequest $request)
    {
      // $team = $teamService->createTeam($request->validated());
        // dd($request);
      Team::create([
          'name' => $request->name,
          'description' => $request->description
      ]);

      return redirect()->back();
    }

    public function update()
    {

    }

    public function delete()
    {

    }


}
