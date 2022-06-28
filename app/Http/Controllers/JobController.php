<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Redirect;
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

        $jobs = Job::orderBy('title')
                ->paginate(5)
                ->withQueryString()->all();
                
        return Inertia::render('Jobs/Index',[
            'jobs' => $jobs
        ]);
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
    public function store(HttpRequest $request)
    {
        $skills = collect($request->skills)->implode('myskills',',');

        Job::create([
            'title' => $request->title,
            'branch' => $request->branch,
            'type' => $request->type,
            'content' => $request->content,
            'skills' => $skills,
        ]);

        return Redirect::route('jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(job $job, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(job $job)
    {
        return Inertia::render('Jobs/Edit', [
            'job' => [ 
              'id' => $job->id,
              'title' => $job->title,
              'description' => $job->content,
              'branch' => $job->branch,
              'type' => $job->type,
              'skills' => $job->skills
             ]
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(job $job)
    {
        $job->update(Request::validate(
            [
                'title' => ['required'],
                'description' => ['required'],
                'branch' => ['required'],
                'type' => ['required'],
                'skills' => ['required']
           ]
        ));

        return Redirect::route('jobs');
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
