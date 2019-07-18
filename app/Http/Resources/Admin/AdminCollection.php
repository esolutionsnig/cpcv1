<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\Resource;

class AdminCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'firstname' => $this->firstname,
            'othernames' => $this->othernames,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'href' => [
                'link' => route('users.show', $this->id)
            ]
        ];
    }
}
