<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=>$this->id,
          'fname'=>$this->fname,
          'lname'=>$this->lname,
          'email'=>$this->email,
          'user_name'=>$this->username,
          'token'=>$this->token,
        ];
    }
}
