<?php

namespace App\Exports;

use App\Models\ProductionCard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\Log;

class ProductionCardSheet implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function title(): string
    {
        return 'Production Cards';
    }

    public function collection()
    {
         Log::info('ProductionCardSheet called with IDs: ', $this->ids);
        return ProductionCard::whereIn('id', $this->ids)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Firm Name',
            'Order Date',
            'Owner Name',
            'Mobile',
            'Address',
            'Bill No',
            'Loom No',
            'Chalan No',
            'Delivery Date',
            'Jala No',
            'Reed',
            'Line',
            'PCS',
            'Pattern',
            'Bharai',
            'Pana',
            'Total Tar',
            'Upper Frame',
            'Size',
            'Lower Frame',
            'Kaski',
            'Upper Belt',
            'Lower Belt',
            'Labour',
            'Machine',
            'Spring',
            'Raj',
            'Patti',
            'Legpin',
            'Tube',
            'Total PCS',
            'Dori Type',
            'Dori Cut Person',
            'Dori KG',
            'Jala Bharai Team',
            'G Button Team',
            'Gathi Person',
            'Old Jala Khola Team',
            'Rs Set',
            'Tube Inner',
            'Spring Inner',
            'Raj Inner',
            'Kaccha Pakka Team',
            'Kaccha Pakka Date',
            'Button Texna',
            'Guide Board Texna',
            'Remark',
            'Checklist',
            'Grand Total',
            'Status',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->firm_name,
            $row->or_date ? \Carbon\Carbon::parse($row->or_date)->format('d-m-Y') : '',
            $row->own_name,
            $row->mo_no,
            $row->address,
            $row->bill_no,
            $row->loom_no,
            $row->chalan_no,
            $row->del_date ? \Carbon\Carbon::parse($row->del_date)->format('d-m-Y') : '',
            $row->jala_no,
            $row->f_reed,
            $row->line,
            $row->pcs,
            $row->pattern_no,
            $row->bharai,
            $row->pana,
            $row->t_tar,
            $row->u_frame,
            $row->size,
            $row->l_frame,
            $row->kaski,
            $row->u_belt,
            $row->l_belt,
            $row->labour,
            $row->mc_name,
            $row->spring,
            $row->raj,
            $row->patti,
            $row->legpin,
            $row->tube,
            $row->total_pcs,
            $row->dori_type,
            $row->dori_cut_person,
            $row->dori_kg,
            $row->jala_bharai_team,
            $row->g_button_team,
            $row->gathi_person,
            $row->old_jala_khola_team,
            $row->rs_set,
            $row->tubeInner,
            $row->springInner,
            $row->raj_inner,
            $row->kaccha_pakka_team,
            $row->kaccha_pakka_date ? \Carbon\Carbon::parse($row->kaccha_pakka_date)->format('d-m-Y') : '',
            $row->button_texna,
            $row->guide_board_texna,
            $row->remark,
            is_array($row->checklist) ? implode(', ', $row->checklist) : $row->checklist,
            $row->grand_total,
            ucfirst($row->status),
            $row->created_at ? $row->created_at->format('d-m-Y H:i') : '',
            $row->updated_at ? $row->updated_at->format('d-m-Y H:i') : '',
        ];
    }
}
