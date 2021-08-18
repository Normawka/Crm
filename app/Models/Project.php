<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function tasksWithStatus(){
        return $this->hasMany(Task::class)->with('status');
    }

}
