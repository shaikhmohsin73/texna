<?php

namespace App\Imports;

use App\Models\PartyDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartyDetailsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $partyName = trim($row['party_name'] ?? '');
        $mobileNo  = trim($row['mobile_no'] ?? '');
        if ($partyName === '' || $mobileNo === '') {
            return null;
        }
        if (PartyDetail::where('mobile_no', $mobileNo)->exists()) {
            return null;
        }
        return new PartyDetail([
            'sr_no'      => $row['sr_no'] ?? null,
            'party_name' => $partyName,
            'address'    => trim($row['address'] ?? ''),
            'mobile_no'  => $mobileNo,
        ]);
    }
}
