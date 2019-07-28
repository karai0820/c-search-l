<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Paddy extends JsonResource
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
        'compound_id'=>$this->compound_id,
        'method_id' => $this->method_id,
        'mode_of_action' => $this->mode_of_action,
        'ECHCG' => $this->ECHCG,
        'ORYSP_1' => $this->ORYSP_1,
        'ORYSP_3' => $this->ORYSP_3,
        'symptom' => $this->symptom,
        'comment' => $this->comments,
        'author' => $this->author,
        'updater' => $this->updater,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
    }
}
