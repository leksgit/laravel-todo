<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Task
 *
 * @mixin \Eloquent
 */
class Task extends Model
{
    protected $fillable =['name', 'descriptions', 'priority', 'status', 'user_id',];

    protected $table = 'task';

    use SoftDeletes;
}
