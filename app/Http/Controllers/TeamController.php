<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateTeamRequest as TeamRequest;
use Illuminate\Support\Facades\Request;
use App\Services\TeamService;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function index(Team $team, User $user)
    {
        // $users = $team->users()->paginate(10);
        $media = $user->getMedia();

        $teams = Team::active()->with('users')->paginate(10);
        
        // dd($users);

      return Inertia::render('Employees/Index', [
        'filters' => Request::all('search', 'role'),
        'teams' => $teams,
        'media' => $media
      ]);
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
      ]);

      return redirect()->back();
    }

    public function show(Team $team){ 
      
        // dd($users);
        return Inertia::render('Employees/Index', [
          'users' => $team->users()->orderBy('name','desc')->paginate(10)
        ]);
    }
    
    public function edit()
    {

    }
    public function update()
    {

    }

    public function delete()
    {

    }


}
