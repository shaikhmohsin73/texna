<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class FormExport implements WithMultipleSheets
{
    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function sheets(): array
    {
        return [
            new ProductionGathiItemSheet($this->ids), 
            new ProductionCardSheet($this->ids),      
        ];
    }
}