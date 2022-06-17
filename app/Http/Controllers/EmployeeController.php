<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Team;
use Inertia\Inertia;

class EmployeeController extends Controller
{

    public function index()
    {
      return Inertia::render('Dashboard',[
        'filters' => Request::all('search', 'role'),
        'users' => User::all()
    ]);
    }

    public function create()
    {

      return Inertia::render('Employee' ,[
        'teams' => Team::all(),
      ]);

    }

    public function store(StoreEmployeeRequest $request)
    {
      // dd($request);
      // dd($empRequest);
      // $avatar = $employeeService->uploadAvatar($empRequest);
      // $employee = $employeeService->createEmployee($empRequest->validated() + ['avatar' => $avatar]);
      // $request->validate([
      //   'name' => 'required|string|max:255',
      //   'email' => 'required|string|email|max:255|unique:users',
      //   'password' => ['required', Rules\Password::defaults()],
      // ]);

      $user = User::where('isAdmin', '=', 'admin')->firstOrFail();

     if($user){

          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->role,
        ]);
     
      }else{
        return response()->json(['errot' => 403]);
      }

    
 
  

        return redirect()->back();
    }

    public function edit(User $user)
    {
        return Inertia::render('Employees/Edit',[
          'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            ]
        ]);
    }


    public function update(){

    }

    public function delete()
    {

    }

}
