<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'user_id', 'answer_by', 'state_id', 'priority_id', 'department_id', 'title', 'message', 'attachment',
        'created_at', 'updated_at',
    ];
    public $timestamps = false;
    public function priority()
    {
        return $this->hasOne(Priority::class,
            'id',
            'priority_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class,
            'id',
            'department_id');
    }
    public function state()
    {
        return $this->hasOne(State::class,
            'id',
            'state_id');
    }
}
