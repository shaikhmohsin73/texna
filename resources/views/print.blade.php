<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Production Card - Final Design</title>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 5mm;
            }

            .no-print {
                display: none;
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #fff;
            color: #000;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        .section-box {
            border: 1.5px solid #000;
            margin-bottom: 12px;
            padding: 0;
        }

        .row {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .row:last-child {
            border-bottom: none;
        }

        .field {
            padding: 5px 10px;
            border-right: 1px solid #000;
            flex: 1;
        }

        .field:last-child {
            border-right: none;
        }

        .field label {
            display: block;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .field .value {
            font-size: 13px;
            font-weight: 700;
            color: #193eeb;
            min-height: 18px;
        }

        /* --- Naya Section: Dori Calculation Row --- */
        .dori-calc-row {
            display: flex;
            border: 1.5px solid #000;
            margin-bottom: 12px;
            background: #fff;
        }

        .dori-item {
            flex: 1;
            border-right: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        .dori-item:last-child {
            border-right: none;
        }

        .dori-item label {
            display: block;
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .dori-item .val {
            font-size: 12px;
            font-weight: 700;
            color: #193eeb;
        }

        /* Grid / Table Styles */
        .grid-container {
            display: flex;
            border: 1.5px solid #000;
            margin-bottom: 12px;
        }

        .grid-left {
            flex: 2.5;
            border-right: 1.5px solid #000;
        }

        .grid-right {
            flex: 1;
        }

        .grid-row {
            display: flex;
            border-bottom: 1px solid #000;
            height: 55px;
            align-items: center;
        }

        .grid-header {
            background: #fff;
            height: 25px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            border-bottom: 1.5px solid #000;
        }

        .grid-cell {
            flex: 1;
            border-right: 1px solid #000;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .grid-cell:last-child {
            border-right: none;
        }

        .grid-cell.blue-text {
            color: #193eeb;
            font-weight: bold;
            font-size: 14px;
        }

        .team-box {
            border-bottom: 1px solid #000;
            padding: 5px 10px;
            height: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .team-box:last-child {
            border-bottom: none;
        }

        .team-box label {
            font-size: 10px;
            font-weight: bold;
            color: #4361ee;
            margin-bottom: 4px;
        }

        .team-box .dotted-line {
            border-bottom: 1px dashed #ccc;
            width: 100%;
            color: #193eeb;
            font-weight: bold;
        }

        .footer-flex {
            display: flex;
            border: 1.5px solid #000;
            margin-bottom: 10px;
        }

        .footer-left {
            flex: 2;
            border-right: 1.5px solid #000;
            padding: 5px 10px;
        }

        .footer-right {
            flex: 1;
            padding: 5px 10px;
        }

        .dotted-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 11px;
            font-weight: bold;
        }

        .dotted-row span.line {
            flex: 1;
            border-bottom: 1px dashed #ccc;
            margin-left: 10px;
            color: #193eeb;
        }

        .checklist {
            display: flex;
            gap: 15px;
            font-size: 11px;
            font-weight: bold;
            padding: 10px;
            border: 1px dashed #ccc;
            margin-bottom: 15px;
        }

        .btn-update {
            background-color: #2b59ff;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            float: right;
        }
    </style>
</head>

<body>

    <form action="{{ route('production-cards.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="section-box">
                <div class="row">
                    <div class="field" style="flex:3;"><label>Firm Name <span
                                class="value">{{ $data->firm_name }}</span></label></div>
                    <div class="field"><label>OR. Date <span
                                class="value">{{ $data->or_date ? $data->or_date->format('d-m-Y') : '01-01-2026' }}</span></label>
                    </div>
                </div>
                <div class="row">
                    <div class="field" style="flex:3;"><label>Own Name <span
                                class="value">{{ $data->own_name }}</span></label></div>
                    <div class="field"><label>MO. No <span class="value">{{ $data->mo_no }}</span></label></div>
                </div>
                <div class="row">
                    <div class="field"><label>Address <span class="value">{{ $data->address }}</span></label></div>
                </div>
                <div class="row">
                    <div class="field"><label>Bill No. <span class="value">{{ $data->bill_no }}</span></label></div>
                    <div class="field"><label>Loom No <span class="value">{{ $data->loom_no }}</span></label></div>
                    <div class="field"><label>Chalan No <span class="value">{{ $data->chalan_no }}</span></label>
                    </div>
                    <div class="field"><label>Del. Date <span
                                class="value">{{ $data->del_date ? $data->del_date->format('d-m-Y') : '09-01-2026' }}</span></label>
                    </div>
                </div>
            </div>

            <div class="section-box">
                <div class="row">
                    <div class="field"><label>Jala No <span class="value">{{ $data->jala_no }}</span></label></div>
                    <div class="field"><label>F. Reed <span class="value">{{ $data->f_reed }}</span></label></div>
                    <div class="field"><label>Line <span class="value">{{ $data->line }}</span></label></div>
                    <div class="field"><label>Pcs <span class="value">{{ $data->pcs }}</span></label></div>
                </div>
                <div class="row">
                    <div class="field"><label>Pattern No <span class="value">{{ $data->pattern_no }}</span></label>
                    </div>
                    <div class="field"><label>Bharai <span class="value">{{ $data->bharai }}</span></label></div>
                    <div class="field"><label>Pana <span class="value">{{ $data->pana }}</span></label></div>
                    <div class="field"><label>T.Tar <span class="value">{{ $data->t_tar }}</span></label></div>
                </div>
            </div>

            <div class="section-box">
                <div class="row">
                    <div class="field"><label>U. Frame <span class="value">{{ $data->u_frame }}</span></label></div>
                    <div class="field"><label>Size <span class="value">{{ $data->size }}</span></label></div>
                    <div class="field"><label>L. Frame <span class="value">{{ $data->l_frame }}</span></label></div>
                    <div class="field"><label>Kaski <span class="value">{{ $data->kaski }}</span></label></div>
                </div>
            </div>

            <div class="dori-calc-row">
                <div class="dori-item"><label>Dori Type</label>
                    <div class="val">{{ $data->dori_type_dropdown ?? 'N/A' }}</div>
                </div>
                <div class="dori-item"><label>Meter's</label>
                    <div class="val">{{ $data->meter ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>BR Tar</label>
                    <div class="val">{{ $data->br_tar ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>Tar</label>
                    <div class="val">{{ $data->new_tar ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>Total Tar</label>
                    <div class="val">{{ $data->total_tar_new ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>Col-1 Kg</label>
                    <div class="val">{{ $data->kg_1 ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>Col-2 Kg</label>
                    <div class="val">{{ $data->kg_2 ?? '0' }}</div>
                </div>
                <div class="dori-item"><label>Total Kg</label>
                    <div class="val">{{ $data->total_kg ?? '0' }}</div>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-left">
                    <div class="grid-header" style="display:flex;">
                        <div style="flex:1; border-right:1px solid #000;">GATHI</div>
                        <div style="flex:1; border-right:1px solid #000;">BORDER TAR</div>
                        <div style="flex:1; border-right:1px solid #000;">TO TAR</div>
                        <div style="flex:2; border-right:1px solid #000;">HEIGHT (A/B)</div>
                        <div style="flex:2;">TAR QTY (A/B)</div>
                    </div>
                    @for ($i = 0; $i < 5; $i++)
                        @php $item = $data->items->get($i); @endphp
                        <div class="grid-row">
                            <div class="grid-cell blue-text" style="font-size:11px;">
                                {{ $i == 0 ? 'BORDER' : 'Gathi ' . $i }}</div>
                            <div class="grid-cell blue-text">{{ $item->border_tar ?? '' }}</div>
                            <div class="grid-cell blue-text">{{ $item->to_tar ?? '' }}</div>
                            <div class="grid-cell" style="flex:2; flex-direction:column; font-size:11px;">
                                <div style="border-bottom:1px solid #eee; width:100%; color:#193eeb;">
                                    {{ $item->gathi_types_a ?? '' }}</div>
                                <div style="width:100%; color:#193eeb;">{{ $item->gathi_types_b ?? '' }}</div>
                            </div>
                            <div class="grid-cell" style="flex:2; flex-direction:column; font-size:11px;">
                                <div style="border-bottom:1px solid #eee; width:100%; color:#193eeb;">
                                    {{ $item->tar_qty_a ?? '' }}</div>
                                <div style="width:100%; color:#193eeb;">{{ $item->tar_qty_b ?? '' }}</div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="grid-right">
                    <div class="team-box"><label>JALA BHARAI TEAM</label>
                        <div class="dotted-line">{{ $data->jala_bharai_team }}</div>
                    </div>
                    <div class="team-box"><label>G/B BUTTON TEAM</label>
                        <div class="dotted-line">{{ $data->g_button_team }}</div>
                    </div>
                    <div class="team-box"><label>GATHI PERSON</label>
                        <div class="dotted-line">{{ $data->gathi_person }}</div>
                    </div>
                </div>
            </div>

            <div class="footer-flex">
                <div class="footer-left">
                    <div style="font-size:10px; font-weight:bold; margin-bottom:10px;">OLD JALA KHOLA TEAM: <span
                            class="line" style="color:#193eeb;">{{ $data->old_jala_khola_team }} </span></div>
                    <div class="dotted-row"><span>R.S. SET</span> <span class="line">{{ $data->rs_set }}</span>
                    </div>
                    <div class="dotted-row"><span>RAJ</span> <span class="line">{{ $data->raj_inner }}</span></div>
                    <div class="dotted-row"><span>SPRING</span> <span class="line">{{ $data->springInner }}</span>
                    </div>
                    <div class="dotted-row"><span>Kaccha/Pakka</span> <span
                            class="line">{{ $data->kaccha_pakka_team }}</span> <span
                            style="margin-left:5px;">Date:</span> <span
                            class="line">{{ $data->kaccha_pakka_date ? $data->kaccha_pakka_date->format('d-m-Y') : '' }}</span>
                    </div>
                </div>
                <div class="footer-right">
                    <div class="dotted-row"><span>BUTTON TEXNA</span> <span
                            class="line">{{ $data->button_texna }}</span></div>
                    <div style="font-size:11px; font-weight:bold; margin-top:10px;">GUIDE BOARD TEXNA</div>
                    <div style="border-bottom:1px dashed #ccc; color:#193eeb; font-weight:bold; min-height:40px;">
                        {{ $data->guide_board_texna }}</div>
                </div>
            </div>

            <div class="section-box" style="padding:5px;">
                <label style="font-size:10px; font-weight:bold;">REMARK</label>
                <div style="color:#193eeb; font-weight:bold; min-height:30px;">{{ $data->remark }}</div>
            </div>

            <div class="checklist">
                @php $checked_items = $data->checklist ?? []; @endphp
                @foreach (['FIBER', 'DORI CUT', 'GATHI', 'JALA BHARAI', 'RSS', 'GB & BTN', 'FRAME SET'] as $check)
                    <span>{{ in_array($check, $checked_items) ? '☒' : '☐' }} {{ $check }}</span>
                @endforeach
            </div>

            <button onclick="window.print()" class="no-print">Print Karein</button>
        </div>
    </form>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>
