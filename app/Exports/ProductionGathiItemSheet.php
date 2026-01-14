<?php

namespace App\Exports;

use App\Models\ProductionGathiItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\Log;

class ProductionGathiItemSheet implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function title(): string
    {
        return 'Gathi Items';
    }

    public function collection()
    {
        Log::info('ProductionGathiItemSheet called with IDs: ', $this->ids);
        return ProductionGathiItem::whereIn('production_card_id', $this->ids)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Production Card ID',
            'Border Tar',
            'To Tar',
            'Gathi Type A',
            'Gathi Type B',
            'Height A',
            'Height B',
            'Tar Qty A',
            'Tar Qty B',
            'Created At',
            'Updated At'
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->production_card_id,
            $row->border_tar,
            $row->to_tar,
            $row->gathi_type_a,  
            $row->gathi_type_b,  
            $row->height_a,
            $row->height_b,
            $row->tar_qty_a,
            $row->tar_qty_b,
            $row->created_at ? $row->created_at->format('d-m-Y H:i') : '',
            $row->updated_at ? $row->updated_at->format('d-m-Y H:i') : '',
        ];
    }
}
