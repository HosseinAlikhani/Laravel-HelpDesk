<?php

namespace App\Http\Resources\ticket;

use App\Http\Resources\user\ReadUser;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketRead extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'user'  =>  new ReadUser($this->user),
            'state' =>  $this->state->name,
            'department'    =>  $this->department->name,
            'priority'  =>  $this->priority->name,
            'title' =>  $this->title,
            'message'   =>  $this->message,
            'attachment'    =>  $this->attachment,
            'created_at_time'   =>  verta($this->created_at)->formatTime(),
            'created_at_date'   =>  verta($this->created_at)->formatDate(),
            'update_at_time'   =>  verta($this->update_at)->formatTime(),
            'update_at_date'   =>  verta($this->update_at)->formatDate(),
        ];
    }
}
