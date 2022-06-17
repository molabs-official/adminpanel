<?php

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('can add employee', function () {
    Employee::factory(5)->create();
});
