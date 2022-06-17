<?php

use App\Models\User;
use App\Models\Team;

it('has teamtable page', function () {
    $user = User::factory()->create();

    actingAs($user)->get('/dashboard')->assertOk();

    // $response = $this->get('/dashboard');

    // $response->assertSee('Employee name');
});


it('can add users to teams', function () {
    // User::factory(5)->create();
    // Team::factory(5)->create();
    // $user = User::findOrFail(13);
    // $team_id = Team::findOrFail(1);
    // $user->teams()->attach($team_id);
    // // actingAs($user)->get('/attach')->assertOk();
    $user = User::factory(5)
                ->hasAttached(Team::factory()->count(3),
                ['user_id' => 1, 'team_id' => 3]
                )
                ->create();

});