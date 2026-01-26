@extends('layouts.header')
@section('content')
    <style>
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        input[type="password"],
        textarea {
            color: #193eeb !important;
        }

        .form-row {
            display: flex;
            border-bottom: 1px solid #cbd5e1;
            min-height: 45px;
        }

        .form-row:last-child {
            border-bottom: none;
        }

        .f-box {
            padding: 8px 12px;
            border-right: 2.5px solid #000000;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .f-box:last-child {
            border-right: none;
        }

        .f-box label {
            font-size: 11px;
            font-weight: 800;
            color: #000000;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .f-box input {
            border: none;
            outline: none;
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
            background: transparent;
            width: 100%;
        }

        .flex-2 {
            flex: 2;
        }

        .flex-3 {
            flex: 3;
        }

        .bill-box {
            border: 2.5px solid #000;
            padding: 14px;
            margin-bottom: 15px;
        }

        .dori-row-container {
            display: flex;
            border: 2.5px solid #000;
            background: #fff;
            margin-bottom: 10px;
            min-height: 70px;
        }

        .dori-row-item {
            flex: 1;
            border-right: 2px solid #000;
            padding: 6px 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .dori-row-item:last-child {
            border-right: none;
        }

        .dori-row-item label {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 2px;
            color: #000;
        }

        .dori-row-item select,
        .dori-row-item input {
            border: none;
            outline: none;
            font-size: 14px;
            font-weight: 700;
            background: transparent;
            width: 100%;
            border-bottom: 1px dashed #ccc;
        }

        .prod-grid {
            display: flex;
            border: 1.5px solid #000;
            margin-top: 20px;
        }

        .left-table {
            flex: 2;
            border-right: 1.5px solid #000;
        }

        .right-team {
            flex: 1;
        }

        .grid-header {
            display: flex;
            background: #f1f5f9;
            border-bottom: 1.5px solid #000;
            font-weight: 800;
            font-size: 11px;
            text-align: center;
        }

        .grid-row {
            display: flex;
            border-bottom: 1.5px solid #000;
            height: 80px;
        }

        .grid-row:last-child {
            border-bottom: none;
        }

        .cell {
            border-right: 1px solid #cbd5e1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
            position: relative;
        }

        .cell:last-child {
            border-right: none;
        }

        .cell input {
            width: 100%;
            border: none;
            outline: none;
            text-align: center;
            font-weight: 700;
            font-size: 15px;
            background: transparent;
        }

        .math-box {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        .math-line {
            flex: 1;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .symbol {
            width: 30px;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }

        .team-box {
            border-bottom: 1.5px solid #000;
            height: 80px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .bottom-section {
            display: flex;
            border: 1.5px solid #000;
            border-top: none;
        }

        .jala-khola {
            flex: 2;
            border-right: 1.5px solid #000;
        }

        .guide-board {
            flex: 1;
        }

        .sub-title {
            background: #f1f5f9;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 800;
            border-bottom: 1px solid #000;
            text-transform: uppercase;
        }

        .inner-row {
            display: flex;
            border-bottom: 1px solid #eee;
            padding: 8px 10px;
            align-items: center;
        }

        .checklist-wrapper {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
            border: 1px dashed #cbd5e1;
            background: #fff;
        }

        .check-box-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            color: #1e293b;
        }

        .w-gathi {
            width: 80px;
        }

        .w-tar {
            width: 100px;
        }

        .w-total-tar {
            width: 80px;
        }

        .w-math {
            flex: 1;
        }
    </style>
    <style>
        .dori-row-container {
            display: flex;
            border: 2.5px solid #000;
            background: #fff;
            margin-bottom: 10px;
            min-height: 70px;
        }

        .dori-row-item {
            flex: 1;
            border-right: 2px solid #000;
            padding: 6px 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .dori-row-item:last-child {
            border-right: none;
        }

        .dori-row-item label {
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 2px;
            color: #000;
        }

        .dori-row-item select,
        .dori-row-item input {
            border: none;
            outline: none;
            font-size: 14px;
            font-weight: 700;
            background: transparent;
            width: 100%;
            border-bottom: 1px dashed #ccc;
        }
    </style>

    <style>
        .right-team {
            border: 1px solid #000;
            padding: 10px;
            font-family: Arial, sans-serif;
        }

        .grid-header {
            background: #f2f2f2;
            font-weight: bold;
            border: 1px solid #000;
        }

        .header-cell {
            padding: 10px;
        }

        .team-box {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 10px;
        }

        .team-box label {
            font-size: 12px;
            font-weight: bold;
            display: block;
            margin-bottom: 4px;
        }

        .team-box input {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }

        .single-input {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .single-input label {
            width: 200px;
        }

        .section-grid h4 {
            margin: 0 0 8px 0;
            font-size: 14px;
            text-decoration: underline;
        }

        .row {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 10px;
        }
    </style>
    <form action="{{ route('production-cards.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card" style="max-width: 1100px; margin: auto; padding: 40px; border: 1px solid #e2e8f0;">

            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label>Firm Name</label>
                        <input type="text" name="firm_name" value="{{ $data->firm_name }}">
                    </div>
                    <div class="f-box">
                        <label>OR. Date</label>
                        <input type="date" name="or_date"
                            value="{{ $data->or_date ? $data->or_date->format('Y-m-d') : '' }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label>Own Name</label>
                        <input type="text" name="own_name" value="{{ $data->own_name }}">
                    </div>
                    <div class="f-box">
                        <label>MO. No</label>
                        <input type="number" name="mo_no" value="{{ $data->mo_no }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box"><label>Address</label><input type="text" name="address"
                            value="{{ $data->address }}"></div>
                </div>
                <div class="form-row">
                    <div class="f-box"><label>Bill No.</label><input type="text" name="bill_no"
                            value="{{ $data->bill_no }}"></div>
                    <div class="f-box"><label>Loom No</label><input type="text" name="loom_no"
                            value="{{ $data->loom_no }}"></div>
                    <div class="f-box"><label>Chalan No</label><input type="text" name="chalan_no"
                            value="{{ $data->chalan_no }}"></div>
                    <div class="f-box"><label>Del. Date</label><input type="date" name="del_date"
                            value="{{ $data->del_date ? $data->del_date->format('Y-m-d') : '' }}"></div>
                </div>
            </div>

            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box"><label>Jala No</label><input type="text" name="jala_no"
                            value="{{ $data->jala_no }}"></div>
                    <div class="f-box"><label>F.Reed</label><input type="text" name="f_reed"
                            value="{{ $data->f_reed }}"></div>
                    <div class="f-box"><label>Line</label><input type="text" name="line"
                            value="{{ $data->line }}"></div>
                    <div class="f-box"><label>PCS</label><input type="text" name="pcs" value="{{ $data->pcs }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box"><label>Pattern NO</label><input type="text" name="pattern_no"
                            value="{{ $data->pattern_no }}"></div>
                    <div class="f-box"><label>Bharai</label><input type="text" name="bharai"
                            value="{{ $data->bharai }}"></div>
                    <div class="f-box"><label>Pana</label><input type="text" name="pana"
                            value="{{ $data->pana }}"></div>
                    <div class="f-box"><label>T.Tar</label><input type="text" id="t_tar" name="t_tar"
                            value="{{ $data->t_tar }}" readonly></div>
                </div>
            </div>

            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box"><label>U.Frame</label><input type="text" name="u_frame"
                            value="{{ $data->u_frame }}"></div>
                    <div class="f-box"><label>Size</label><input type="text" name="size"
                            value="{{ $data->size }}"></div>
                    <div class="f-box"><label>L.Frame</label><input type="text" name="l_frame"
                            value="{{ $data->l_frame }}"></div>
                    <div class="f-box"><label>Kaski</label><input type="text" name="kaski"
                            value="{{ $data->kaski }}"></div>
                </div>
                <div class="form-row">
                    <div class="f-box"><label>U.Belt</label><input type="text" name="u_belt"
                            value="{{ $data->u_belt }}"></div>
                    <div class="f-box"><label>L.Belt</label><input type="text" name="l_belt"
                            value="{{ $data->l_belt }}"></div>
                    <div class="f-box"><label>Labour</label><input type="text" name="labour"
                            value="{{ $data->labour }}"></div>
                    <div class="f-box"><label>M/C Name</label><input type="text" name="mc_name"
                            value="{{ $data->mc_name }}"></div>
                </div>
            </div>

            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box"><label>Spring</label><input type="text" name="spring"
                            value="{{ $data->spring }}"></div>
                    <div class="f-box"><label>Raj</label><input type="text" name="raj"
                            value="{{ $data->raj }}"></div>
                    <div class="f-box"><label>Patti</label><input type="text" name="patti"
                            value="{{ $data->patti }}"></div>
                    <div class="f-box"><label>Legpin</label><input type="text" name="legpin"
                            value="{{ $data->legpin }}"></div>
                </div>
                <div class="form-row">
                    <div class="f-box"><label>Tube</label><input type="text" name="tube"
                            value="{{ $data->tube }}"></div>
                    <div class="f-box"><label>To.Pcs</label><input type="text" name="total_pcs"
                            value="{{ $data->total_pcs }}"></div>
                    <div class="f-box flex-2"><label>Dori Type</label><input type="text" name="dori_type"
                            value="{{ $data->dori_type }}"></div>
                    <div class="f-box"><label>Dori Cut person</label><input type="text" name="dori_cut_person"
                            value="{{ $data->dori_cut_person }}"></div>
                    <div class="f-box"><label>Dori Kg</label><input type="text" name="dori_kg"
                            value="{{ $data->dori_kg }}"></div>
                </div>
            </div>

            <div class="dori-row-container">
                <div class="dori-row-item">
                    <label>Dori Type</label>
                    <select name="dori_type_dropdown" id="dori_type_dropdown">
                        <option value="">Select</option>
                        <option value="jaadi" {{ $data->dori_type_dropdown == 'jaadi' ? 'selected' : '' }}>Jaadi</option>
                        <option value="patli" {{ $data->dori_type_dropdown == 'patli' ? 'selected' : '' }}>Patli</option>
                    </select>
                </div>
                <div class="dori-row-item"><label>METER'S</label><input type="text" name="meter" id="meter"
                        value="{{ $data->meter }}" readonly></div>
                <div class="dori-row-item"><label>BR TAR</label><input type="text" name="br_tar" id="br_tar"
                        value="{{ $data->br_tar }}" readonly></div>
                <div class="dori-row-item"><label>TAR</label><input type="text" name="new_tar" id="new_tar"
                        value="{{ $data->new_tar }}" readonly></div>
                <div class="dori-row-item"><label>TOTAL TAR</label><input type="text" name="total_tar_new"
                        id="total_tar_new" value="{{ $data->total_tar_new }}" readonly></div>
                <div class="dori-row-item"><label>COLOUR-1 KG</label><input type="text" name="kg_1" id="kg_1"
                        value="{{ $data->kg_1 }}"></div>
                <div class="dori-row-item"><label>COLOUR-2 KG</label><input type="text" name="kg_2" id="kg_2"
                        value="{{ $data->kg_2 }}"></div>
                <div class="dori-row-item"><label>Total KG</label><input type="text" name="total_kg" id="total_kg"
                        value="{{ $data->total_kg }}"></div>
            </div>

            <div class="prod-grid">
                <div class="left-table">
                    <div class="grid-header">
                        <div class="w-gathi" style="padding:10px;">BORDER GATHI</div>
                        <div class="w-tar" style="padding:10px;">BORDER TAR</div>
                        <div class="w-total-tar" style="padding:10px;">TO TAR</div>
                        <div class="w-total-tar" style="padding:10px;">GATHI TYPE</div>
                        <div style="flex:1; padding:10px;">HEIGHT</div>
                        <div style="flex:1; padding:10px;">TAR QTY</div>
                        <div style="flex:1; padding:10px;">Colour-1</div>
                        <div style="flex:1; padding:10px;">Colour-2</div>
                    </div>

                    @for ($i = 0; $i < 5; $i++)
                        @php $item = $data->items->get($i); @endphp
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="{{ $i == 0 ? 'BORDER' : 'Gathi ' . $i }}" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_{{ $i + 1 }}"
                                    name="gathi_items[{{ $i }}][border_tar]"
                                    value="{{ $item->border_tar ?? '' }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_{{ $i + 1 }}"
                                    name="gathi_items[{{ $i }}][to_tar]" value="{{ $item->to_tar ?? '' }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><input type="text" id="gathi_a_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][gathi_types_a]"
                                            value="{{ $item->gathi_types_a ?? '' }}"></div>
                                    <div class="math-line"><input type="text" id="gathi_b_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][gathi_types_b]"
                                            value="{{ $item->gathi_types_b ?? '' }}"></div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">*</span><input type="text"
                                            id="mul1_a_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][height_a]"
                                            value="{{ $item->height_a ?? '' }}"></div>
                                    <div class="math-line"><span class="symbol">*</span><input type="text"
                                            id="mul1_b_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][height_b]"
                                            value="{{ $item->height_b ?? '' }}"></div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span><input type="text"
                                            id="eq1_a_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][tar_qty_a]"
                                            value="{{ $item->tar_qty_a ?? '' }}"></div>
                                    <div class="math-line"><span class="symbol">=</span><input type="text"
                                            id="eq1_b_{{ $i + 1 }}"
                                            name="gathi_items[{{ $i }}][tar_qty_b]"
                                            value="{{ $item->tar_qty_b ?? '' }}"></div>
                                </div>
                            </div>
                            <div class="cell w-total-tar"><input type="text"
                                    name="gathi_items[{{ $i }}][color_1]" value="{{ $item->color_1 ?? '' }}">
                            </div>
                            <div class="cell w-total-tar"><input type="text"
                                    name="gathi_items[{{ $i }}][color_2]" value="{{ $item->color_2 ?? '' }}">
                            </div>
                        </div>
                    @endfor

                    <div class="grid-row" style="height: 40px; background: #f8fafc;">
                        <div style="flex: 4.2; text-align: right; padding: 10px; font-weight: 800;">TOTAL</div>
                        <div class="cell" style="flex: 1; border-left: 1.5px solid #000;">
                            <span class="symbol">=</span>
                            <input type="text" id="grand_total" name="grand_total" value="{{ $data->grand_total }}">
                        </div>
                    </div>
                </div>
                <div class="right-team">
                    <div class="grid-header">
                        <div class="header-cell">
                            PERSONNEL / TEAM
                        </div>
                    </div>
                    <div class="team-box single-input">
                        <label>JALA BHARAI TEAM</label>
                        <input type="text" name="jala_bharai_team" value="{{ $data->jala_bharai_team }}">
                    </div>
                    <div class="team-box single-input">
                        <label>G/B BUTTON TEAM</label>
                        <input type="text" name="g_button_team" value="{{ $data->g_button_team }}">
                    </div>
                    {{-- @for ($i = 0; $i < 3; $i++)
                        @php $item = $data->items->get($i); @endphp
                        <div class="team-box section-grid">
                            <div class="row">
                                <div>
                                    <label>GATHI PERSON</label>
                                    <input type="text" name="gathi_items[{{ $i }}][gathi_person]"
                                        value="{{ $item->gathi_person }}">
                                </div>
                                <div>
                                    <label>NO</label>
                                    <input type="number" name="gathi_items[0][no]" value="{{ $item->no }}">
                                </div>
                                <div>
                                    <label>NO OF GAT</label>
                                    <input type="number" name="gathi_items[0][no_of_gat]" value="{{ $item->no_of_gat }}">
                                </div>
                            </div>
                        </div>
                    @endfor --}}
                </div>
            </div>

            <div class="bottom-section">
                <div class="jala-khola">
                    <div class="sub-title">OLD JALA KHOLA Team
                        <input type="text" name="old_jala_khola_team" value="{{ $data->old_jala_khola_team }}"
                            style="width:200px; border:none; border-bottom:1px solid #000; background:transparent;">
                    </div>
                    <div class="inner-row"><label>R.S. SET</label><input type="text" name="rs_set"
                            value="{{ $data->rs_set }}"></div>
                    <div class="inner-row"><label>RAJ</label><input type="text" name="raj_inner"
                            value="{{ $data->raj_inner }}"></div>
                    <div class="inner-row"><label>SPRING</label><input type="text" name="springInner"
                            value="{{ $data->springInner }}"></div>
                    <div class="inner-row"><label>TUBE</label><input type="text" name="tubeInner"
                            value="{{ $data->tubeInner }}"></div>
                    <div class="inner-row">
                        <label>Kaccha/Pakka Team</label><input type="text" name="kaccha_pakka_team"
                            value="{{ $data->kaccha_pakka_team }}">
                        <label style="width:auto; margin-left:10px;">Date:</label><input type="date"
                            name="kaccha_pakka_date"
                            value="{{ $data->kaccha_pakka_date ? $data->kaccha_pakka_date->format('Y-m-d') : '' }}">
                    </div>
                </div>
                <div class="guide-board">
                    <div class="sub-title">Guide Board / Texna</div>
                    <div class="inner-row" style="height: 60px;"><label>BUTTON TEXNA</label><input type="text"
                            name="button_texna" value="{{ $data->button_texna }}"></div>
                    <div class="inner-row" style="height: 80px; flex-direction: column; align-items: flex-start;">
                        <label>GUIDE BOARD TEXNA</label>
                        <textarea name="guide_board_texna" style="width:100%; height:100%; border:none; outline:none; resize:none;">{{ $data->guide_board_texna }}</textarea>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; border: 1.5px solid #000;">
                <div class="sub-title">Remark / Special Instructions</div>
                <div style="padding: 10px;">
                    <textarea name="remark" style="width: 100%; min-height: 80px; border: none; outline: none;">{{ $data->remark }}</textarea>
                </div>
            </div>

            <div class="checklist-wrapper">
                @php $checked_items = $data->checklist ?? []; @endphp
                @foreach (['FIBER', 'DORI CUT', 'GATHI', 'JALA BHARAI', 'RSS', 'GB & BTN', 'FRAME SET + ACCESSORIES'] as $check)
                    <label class="check-box-item">
                        <input type="checkbox" name="checklist[]" value="{{ $check }}"
                            {{ in_array($check, $checked_items) ? 'checked' : '' }}> {{ $check }}
                    </label>
                @endforeach
            </div>

            <div style="margin-top: 30px; text-align: right;">
                <button type="button" id="calculateBtn"
                    style="background: #10b981; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px; font-weight: 800; margin-right: 10px;">CALCULATE</button>
                <button type="submit"
                    style="background: #2563eb; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: 800; cursor: pointer;">UPDATE
                    DATA</button>
            </div>
        </div>
    </form>

    <script>
        const doriDropdown = document.getElementById('dori_type_dropdown');
        const brTarInput = document.getElementById('meter');
        doriDropdown.addEventListener('change', function() {
            if (this.value === 'jaadi') {
                brTarInput.value = 1710;
            } else if (this.value === 'patli') {
                brTarInput.value = 2100;
            } else {
                brTarInput.value = '';
            }
        });
        document.addEventListener('input', function(e) {
            const tar1 = parseFloat(document.getElementById('tar_1')?.value) || 0;
            const totalTar1 = parseFloat(document.getElementById('totalTar_1')?.value) || 0;
            const brTarInputVal = document.getElementById('br_tar');
            const brTarValue = tar1 * totalTar1;
            if (brTarInputVal) brTarInputVal.value = brTarValue;

            let tarTotal = 0;
            for (let i = 2; i <= 5; i++) {
                const tar = parseFloat(document.getElementById('tar_' + i)?.value) || 0;
                const totalTar = parseFloat(document.getElementById('totalTar_' + i)?.value) || 0;
                tarTotal += tar * totalTar;
            }
            const newTarInput = document.getElementById('new_tar');
            if (newTarInput) newTarInput.value = tarTotal;

            const totalTarNewInput = document.getElementById('total_tar_new');
            if (totalTarNewInput) {
                totalTarNewInput.value = brTarValue + tarTotal;
            }
            const tTarInput = document.getElementById('t_tar');
            if (tTarInput) {
                tTarInput.value = brTarValue + tarTotal;
            }
        });

        document.getElementById('calculateBtn').addEventListener('click', function() {
            const elTar = document.getElementById('total_tar_new');
            const elMeter = document.getElementById('meter');
            const valTotalTar = parseFloat(elTar.value) || 0;
            const valMeter = parseFloat(elMeter.value) || 0;
            const divider = 39.37;
            const factor1 = 0.33;
            const factor2 = 0.66;
            let a_final = ((valTotalTar / divider) * factor1) / valMeter;
            let b_final = ((valTotalTar / divider) * factor2) / valMeter;
            document.getElementById('kg_1').value = a_final.toFixed(2);
            document.getElementById('kg_2').value = b_final.toFixed(2);
            document.getElementById('total_kg').value = (a_final + b_final).toFixed(2);
        });
    </script>
@endsection
