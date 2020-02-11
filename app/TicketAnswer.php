<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    protected $table = 'ticket_answers';
    protected $fillable = [
        'user_id', 'ticket_id', 'message', 'attachment',
        'created_at', 'updated_at',
    ];
    public $timestamps = false;
}
