<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Jobs/Job');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'unique:title', 'max:255'],
            'branch' => ['required', 'max:255'],
            'type' => ['required','max:255']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(job $job)
    {
        //
    }
}
