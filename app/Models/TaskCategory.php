<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $fillable = [ //2
        'name'
    ];

    protected $dates = [ //3
        'created_at',
        'updated_at'
    ];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
