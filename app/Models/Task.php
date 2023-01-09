<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'user_id',
        'task_category_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskCategory(){
        return $this->belongsTo(TaskCategory::class);
    }

    public function assignedUser(){
        return $this->belongsTo(User::class,'assignee_id');
    }
}
