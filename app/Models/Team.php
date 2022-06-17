<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    //Admin can  create  teams 
    use HasFactory;
    protected $fillable = ['name','description'];

    public function employees(){
        return $this->belongsToMany(related: Employee::class, foreignPivotKey:'employee_id' );
    }

}
