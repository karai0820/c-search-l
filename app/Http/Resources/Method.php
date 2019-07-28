<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Method extends JsonResource
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
            'compound_id' => $this->compound_id,
            'test_area' => $this->test_area,
            'test_title' => $this->id,
            'test_day' => $this->id,
            'test_scale' => $this->id,
            'concentration' => $this->id,
            'conc_unit' => $this->id,

        ];
    }
}
