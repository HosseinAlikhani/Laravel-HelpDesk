<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class ReadUser extends JsonResource
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
            'name'  =>  $this->name,
            'email' =>  $this->email,
            'img'   =>  $this->img,
            'active'    =>  $this->active,
            'created_at_time'   =>  verta($this->created_at)->formatTime(),
            'created_at_date'   =>  verta($this->created_at)->formatDate(),
            'update_at_time'   =>  verta($this->updated_at)->formatTime(),
            'update_at_date'   =>  verta($this->updated_at)->formatDate(),
        ];
    }
}
