<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Team extends Model
{

    //Admin can  create  teams 
    use HasFactory;
    protected $fillable = [ 'auth_id','team_name'];

    public function scopeActive($query){
        return $query->where('auth_id','=', Auth::user()->id);
    }

    public function users(){
        return $this->belongsToMany(related: User::class )->using(TeamUser::class);
    }

}
