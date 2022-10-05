<?php

namespace Atom\Students\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user' => $this->user_id,
            'arrival_date' => date($this->arrival_date)
        ];
    }
}