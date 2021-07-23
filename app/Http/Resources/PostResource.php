<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->description,
            'user'=> new UserResource($this->user),


        //     'post_creator' => $this->user ? $this->user->name : 'not found ',
        // //  'creator_id' => $this-> user -> id,
        // 'creator_id' => $this->user_id,
        // 'creator_email' => $this->user ? $this->user->email  : 'not found ',
        ];
    }
}
