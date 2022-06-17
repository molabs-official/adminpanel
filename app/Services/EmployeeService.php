<?php

namespace App\Services;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\Request as HttpRequest;


class EmployeeService
{

    public function uploadAvatar(HttpRequest $request): ?string
    {
        return ($request->hasFile('avatar'))
            ? $request->file('avatar')->store('avatars')
            : NULL;
    }

    

    public function createEmployee(HttpRequest $request): ?string
    {
        
        $employee = Employee::create(
            [
                'firstname' => $request->firstname,
                'lastname' => $request->lasttname,
                'email' => $request->email,
            ]
        );

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars');
            $employee->update(['avatar' => $avatar]);
        }

        return $employee;
    }
}

