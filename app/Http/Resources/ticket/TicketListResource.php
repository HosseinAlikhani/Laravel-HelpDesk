<?php

namespace App\Http\Resources\ticket;

use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketListResource extends JsonResource
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
            'user'  =>  $this->user_id,
            'state' =>  $this->state->name,
            'priority'  =>  $this->priority->name,
            'department'    =>  $this->department->name,
            'title' =>  $this->title,
            'message'   =>  $this->message,
            'attachment'    =>  $this->attachment,
            'created_at_date'    =>  Verta::parse(verta($this->created_at))->formatDate(),
            'created_at_time'    =>  Verta::parse(verta($this->created_at))->formatTime(),
            'updated_at_date'    =>  Verta::parse(verta($this->updated_at))->formatDate(),
            'updated_at_time'    =>  Verta::parse(verta($this->updated_at))->formatTime(),
        ];
    }
}
