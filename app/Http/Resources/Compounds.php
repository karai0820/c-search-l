<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Compounds extends JsonResource
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
            'compound_name'=>$this->compound_name,
            'structure'=>$this->structure,
            'chemist'=>$this->chemist,
            'created_at' =>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
