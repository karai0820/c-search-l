<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Like extends JsonResource
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
            'id'=>$this->id,
            'user_id' => $this->user_id,
            'compound_id' => $this->compound_id,
            'date' =>$this->created_at,
            'update'=>$this->updated_at

        ];
    }
}
