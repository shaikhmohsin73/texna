<?php

namespace App\Imports;

use App\Models\Marketing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MarketingImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Marketing([
            'date'            => $row['date'] ?? null,
            'naam'            => $row['naam'] ?? null,
            'company_name'    => $row['company_name'] ?? null,
            'number'          => $row['number'] ?? null,
            'address'         => $row['address'] ?? null,
            'current_machine' => $row['current_machine'] ?? null,
            'new_machine'     => $row['new_machine'] ?? null,
            'jala_type'       => $row['jala_type'] ?? null,
        ]);
    }
}
