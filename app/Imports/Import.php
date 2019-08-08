<?php

namespace App\Imports;

use App\Method
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class Import implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new Method([
        'compound_id' => $collection[0],
        'test_area' => $collection[1],
        'test_title' => $collection[2],
        'test_day' => $collection[3],
        'test_scale' => $collection[4],
        'concentration' => $collection[5],
        'conc_unit' => $collection[6],










        ]);
    }
}
