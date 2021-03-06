<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\User;
use App\Models\Team;
use Inertia\Inertia;

class EmployeeController extends Controller
{

  public function index()
  {
    

    $users = User::orderBy('name')
    ->paginate(5)
    ->withQueryString()->all();

    return Inertia::render('Employees/Index', [
      'filters' => Request::all('search', 'role'),
      'users' => $users,
    ]);
  }

  public function create()
  {

    return Inertia::render('Employee', [
      'teams' => Team::all(),
    ]);
  }

  public function store(StoreEmployeeRequest $request)
  {
    
    

   
    $team_id =  $request->team_id;
    $team = Team::find($team_id);


    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'isAdmin' => $request->role,
      ]);

      if($request->hasFile('image') && $request->file('image')->isValid()){ 
        $user->addMediaFromRequest('image')->toMediaCollection('images');
    }


      if($team){
        $employee = User::find($user->id);

        $team->users()->attach($employee);
      }else{
        $newteam = Team::create(['auth_id' => Auth::user()->id,'team_name' => $request->team_name]);
        $employee = User::find($user->id);
        $newteamId = $newteam->id;
        $attach = Team::find($newteamId);
        $attach->users()->attach($employee);
      }
     

      return Redirect::route('teams')->with('success','employee has been added');
  }


  public function fileImport(Request $request){
      Excel::import(new UsersImport, $request->file('file')->store('temp'));
      return redirect()->back();
  }


  public function edit(User $user)
  {
    return Inertia::render('Employees/Edit', [
      'user' => [ 
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
      ]
    ]);
  }


  public function update(User $user)
  {
    $user->update(
      Request::validate([
        'name' => ['required', 'max:100'],
        'email' => ['nullable', 'max:50', 'email'],
        ])
    );

    return redirect()->back();
  }

  public function delete()
  {
  }
}
