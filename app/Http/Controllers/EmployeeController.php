<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Hash;
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

    return Inertia::render('Dashboard', [
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
    
    $user = User::where('isAdmin', '=', 'admin')->firstOrFail();

    if ($user) {

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'isAdmin' => $request->role,
      ]);
    } else {
      return response()->json(['errot' => 403]);
    }
    return redirect()->back();
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
