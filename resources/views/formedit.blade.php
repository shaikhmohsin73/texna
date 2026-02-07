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

        .prod-table-wrapper {
            display: flex;
            border: 2.5px solid #000000;
            margin-top: 25px;
        }

        .table-main {
            flex: 2.5;
            border-right: 1px solid #000000;
        }

        .team-sidebar {
            flex: 1.2;
        }

        .t-header {
            background: #f1f5f9;
            font-weight: 800;
            font-size: 11px;
            text-align: center;
            border-bottom: 1px solid #cbd5e1;
            padding: 10px;
        }

        .t-row {
            display: flex;
            border-bottom: 1px solid #cbd5e1;
            min-height: 40px;
            align-items: center;
        }

        .t-cell {
            flex: 1;
            border-right: 1px solid #cbd5e1;
            padding: 5px;
            text-align: center;
        }

        .t-cell:last-child {
            border-right: none;
        }

        .t-cell input {
            width: 100%;
            border: none;
            text-align: center;
            outline: none;
            font-weight: 700;
        }

        .team-entry {
            padding: 15px;
            border-bottom: 1px solid #cbd5e1;
            height: 100px;
        }

        .team-entry:last-child {
            border-bottom: none;
        }

        .team-entry label {
            font-size: 11px;
            font-weight: 800;
            color: var(--primary);
            display: block;
            margin-bottom: 8px;
        }

        .team-entry input {
            width: 100%;
            border: none;
            border-bottom: 1px dashed #cbd5e1;
            outline: none;
            font-weight: 600;
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

        /* The "Math" part inside height/tar */
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

        .math-line:last-child {
            border-bottom: none;
        }

        .symbol {
            width: 30px;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }

        /* Team Section */
        .team-box {
            border-bottom: 1.5px solid #000;
            height: 60px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .team-box:last-child {
            border-bottom: none;
        }

        .team-box label {
            font-size: 11px;
            font-weight: 800;
            color: #4361ee;
            margin-bottom: 5px;
        }

        .team-box input {
            border: none;
            border-bottom: 1px dashed #ccc;
            outline: none;
            font-weight: 600;
            padding: 2px;
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

        .inner-row:last-child {
            border-bottom: none;
        }

        .inner-row label {
            font-size: 11px;
            font-weight: 700;
            width: 120px;
            color: #475569;
        }

        .inner-row input {
            flex: 1;
            border: none;
            border-bottom: 1px dashed #ccc;
            outline: none;
            font-weight: 600;
            padding: 2px;
            background: transparent;
        }

        .checklist-wrapper {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            background: #fff;
        }

        .check-box-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            color: #1e293b;
            cursor: pointer;
        }

        .check-box-item input {
            width: 16px;
            height: 16px;
            accent-color: #4361ee;
            cursor: pointer;
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

        .right-align {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
        }

        .out-input {
            width: 70px;
            padding: 6px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            color: #000;
            border: 2px solid #000;
        }

        .out-text {
            font-size: 18px;
            font-weight: 900;
            color: #000;
            letter-spacing: 1px;
        }

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

    <form action="{{ route('production-cards.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card" style="max-width: 1100px; margin: auto; padding: 40px; border: 1px solid #e2e8f0;">
            <div class="out-of-wrapper right-align">
                <input type="number" class="out-input" placeholder="__" name="number_1"
                    value="{{ old('number_1', $data->number_1) }}">
                <span class="out-text">OUT OF</span>
                <input type="number" class="out-input" placeholder="__" name="number_2"
                    value="{{ old('number_2', $data->number_2) }}">
            </div>
            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="firmName">Firm Name</label>
                        <input type="text" id="firm_name" name="firm_name"
                            value="{{ old('firm_name', $data->firm_name) }}">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="f-box">
                        <label for="orDate">OR. Date</label>
                        <input type="date" id="or_date" name="or_date" value="{{ old('or_date', optional($data->or_date)->format('Y-m-d')) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="ownName">Own Name</label>
                        <input type="text" id="own_name" name="own_name" value="{{ old('own_name', $data->own_name) }}">
                    </div>
                    <div class="f-box">
                        <label for="moNo">MO. No</label>
                        <input type="number" id="mo_no" name="mo_no" value="{{ old('mo_no', $data->mo_no) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $data->address) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box">
                        <label for="billNo">Bill No.</label>
                        <input type="text" id="bill_no" name="bill_no" value="{{ old('bill_no', $data->bill_no) }}">
                    </div>
                    <div class="f-box">
                        <label for="loomNo">Loom No</label>
                        <input type="text" id="loom_no" name="loom_no" value="{{ old('loom_no', $data->loom_no) }}">
                    </div>
                    <div class="f-box">
                        <label for="chalanNo">Chalan No</label>
                        <input type="text" id="chalan_no" name="chalan_no"
                            value="{{ old('chalan_no', $data->chalan_no) }}">
                    </div>
                    <div class="f-box">
                        <label for="delDate">Del. Date</label>
                        <input type="date" id="del_date" name="del_date"
                            value="{{ old('del_date', optional($data->del_date)->format('Y-m-d')) }}">
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <div class="bill-box">
                    <div class="form-row" style="border-top: 1px solid #cbd5e1;">
                        <div class="f-box">
                            <label for="jalaNo">Jala No</label>
                            <input type="text" id="jala_no" name="jala_no"
                                value="{{ old('jala_no', $data->jala_no) }}">
                        </div>
                        <div class="f-box">
                            <label for="fReed">F.Reed</label>
                            <input type="text" id="f_reed" name="f_reed" value="{{ old('f_reed', $data->f_reed) }}">
                        </div>
                        <div class="f-box">
                            <label for="line">Line</label>
                            <input type="text" id="line" name="line" value="{{ old('line', $data->line) }}">
                        </div>
                        <div class="f-box">
                            <label for="pcs">PCS</label>
                            <input type="text" id="pcs" name="pcs" value="{{ old('pcs', $data->pcs) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="pattern_no">Pattern NO</label>
                            <input type="text" id="pattern_no" name="pattern_no"
                                value="{{ old('pattern_no', $data->pattern_no) }}">
                        </div>
                        <div class="f-box">
                            <label for="pattern_no">Pattern File</label>
                            <input type="File" id="pattern_File" name="pattern_File">
                            @if ($data->pattern_File)
                                <small>Current: {{ basename($data->pattern_File) }}</small>
                            @endif
                        </div>
                        <div class="f-box">
                            <label for="bharai">Bharai</label>
                            <input type="text" id="bharai" name="bharai"
                                value="{{ old('bharai', $data->bharai) }}">
                        </div>
                        <div class="f-box">
                            <label for="pana">Pana</label>
                            <input type="text" id="pana" name="pana" value="{{ old('pana', $data->pana) }}">
                        </div>
                        <div class="f-box">
                            <label for="tTar">T.Tar</label>
                            <input type="text" id="t_tar" name="t_tar" readonly
                                value="{{ old('t_tar', $data->t_tar) }}">
                        </div>
                    </div>
                </div>

                <div class="bill-box">
                    <div class="form-row">
                        <div class="f-box">
                            <label for="uFrame">U.Frame</label>
                            <input type="text" id="u_frame" name="u_frame"
                                value="{{ old('u_frame', $data->u_frame) }}">
                        </div>
                        <div class="f-box">
                            <label for="size">Size</label>
                            <input type="text" id="size" name="size" value="{{ old('size', $data->size) }}">
                        </div>
                        <div class="f-box">
                            <label for="lFrame">L.Frame</label>
                            <input type="text" id="l_frame" name="l_frame"
                                value="{{ old('l_frame', $data->l_frame) }}">
                        </div>
                        <div class="f-box">
                            <label for="kaski">Kaski</label>
                            <input type="text" id="kaski" name="kaski"
                                value="{{ old('kaski', $data->kaski) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="uBelt">U.Belt</label>
                            <input type="text" id="u_belt" name="u_belt"
                                value="{{ old('u_belt', $data->u_belt) }}">
                        </div>
                        <div class="f-box">
                            <label for="lBelt">L.Belt</label>
                            <input type="text" id="l_belt" name="l_belt"
                                value="{{ old('l_belt', $data->l_belt) }}">
                        </div>
                        <div class="f-box">
                            <label for="labour">Labour</label>
                            <input type="text" id="labour" name="labour"
                                value="{{ old('labour', $data->labour) }}">
                        </div>
                        <div class="f-box">
                            <label for="mcName">M/C Name</label>
                            <input type="text" id="mc_name" name="mc_name"
                                value="{{ old('mc_name', $data->mc_name) }}">
                        </div>
                    </div>
                </div>

                <div class="bill-box">
                    <div class="form-row">
                        <div class="f-box">
                            <label for="spring">Spring</label>
                            <input type="text" id="spring" name="spring"
                                value="{{ old('spring', $data->spring) }}">
                        </div>
                        <div class="f-box">
                            <label for="raj">Raj</label>
                            <input type="text" id="raj" name="raj" value="{{ old('raj', $data->raj) }}">
                        </div>
                        <div class="f-box">
                            <label for="patti">Patti</label>
                            <input type="text" id="patti" name="patti"
                                value="{{ old('patti', $data->patti) }}">
                        </div>
                        <div class="f-box">
                            <label for="legpin">Legpin</label>
                            <input type="text" id="legpin" name="legpin"
                                value="{{ old('legpin', $data->legpin) }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="tube">Tube</label>
                            <input type="text" id="tube" name="tube" value="{{ old('tube', $data->tube) }}">
                        </div>
                        <div class="f-box">
                            <label for="totalPcs">To.Pcs</label>
                            <input type="text" id="total_pcs" name="total_pcs"
                                value="{{ old('total_pcs', $data->total_pcs) }}">
                        </div>
                        <div class="f-box flex-2">
                            <label for="doriType">Dori Type</label>
                            <input type="text" id="dori_type" name="dori_type"
                                value="{{ old('dori_type', $data->dori_type) }}">
                        </div>
                        <div class="f-box">
                            <label for="doriCutPerson">Dori Cut person</label>
                            <input type="text" id="dori_cut_person" name="dori_cut_person"
                                value="{{ old('dori_cut_person', $data->dori_cut_person) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" style="max-width: 1100px; margin: auto; padding: 30px; border: 1px solid #e2e8f0;">
                <div class="dori-row-container">
                    <div class="dori-row-item">
                        <label>Dori Type</label>
                        <select name="dori_type_dropdown" id="dori_type_dropdown">
                            <option value="">Select</option>
                            <option value="jaadi"
                                {{ old('dori_type_dropdown', $data->dori_type_dropdown) == 'jaadi' ? 'selected' : '' }}>
                                Jaadi</option>
                            <option value="patli"
                                {{ old('dori_type_dropdown', $data->dori_type_dropdown) == 'patli' ? 'selected' : '' }}>
                                Patli</option>
                        </select>
                    </div>
                    <div class="dori-row-item">
                        <label>METER'S</label>
                        <input type="text" name="meter" id="meter" readonly
                            value="{{ old('meter', $data->meter) }}">
                    </div>

                    <div class="dori-row-item">
                        <label>BR TAR</label>
                        <input type="text" name="br_tar" id="br_tar" readonly
                            value="{{ old('br_tar', $data->br_tar) }}">
                    </div>
                    <div class="dori-row-item">
                        <label>TAR</label>
                        <input type="text" name="new_tar" id="new_tar" readonly
                            value="{{ old('new_tar', $data->new_tar) }}">
                    </div>
                    <div class="dori-row-item">
                        <label>TOTAL TAR</label>
                        <input type="text" name="total_tar_new" id="total_tar_new" readonly
                            value="{{ old('total_tar_new', $data->total_tar_new) }}">
                    </div>
                    <div class="dori-row-item">
                        <label>COLOUR-1 &nbsp;KG</label>
                        <input type="text" name="kg_1" id="kg_1" value="{{ old('kg_1', $data->kg_1) }}">
                    </div>
                    <div class="dori-row-item">
                        <label>COLOUR-2&nbsp; KG</label>
                        <input type="text" name="kg_2" id="kg_2" value="{{ old('kg_2', $data->kg_2) }}">
                    </div>
                    <div class="dori-row-item">
                        <label>Total KG</label>
                        <input type="text" name="total_kg" id="total_kg"
                            value="{{ old('total_kg', $data->total_kg) }}">
                    </div>
                    <input type="hidden" id="hidden_total_kg" name="hidden_total_kg"
                        value="{{ old('hidden_total_kg', $data->hidden_total_kg) }}">
                    <input type="hidden" id="jalabarai_value" name="jalabarai_value"
                        value="{{ old('jalabarai_value', $data->jalabarai_value) }}">

                    <button type="button" id="calculateBtn">Calculate</button>
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

                        @php
                            $items = $data->items;
                            // Ensure we have at least 5 items
                            while (count($items) < 5) {
                                $items[] = new \App\Models\ProductionGathiItem();
                            }
                        @endphp

                        <!-- BORDER Row -->
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="BORDER" readonly id="border_val">
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_1" name="production_gathi_items[0][border_tar]"
                                    value="{{ old('production_gathi_items.0.border_tar', $items[0]->border_tar ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][to_tar]"
                                    value="{{ old('production_gathi_items.0.to_tar', $items[0]->to_tar ?? '') }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1"
                                            name="production_gathi_items[0][gathi_types_a]"
                                            value="{{ old('production_gathi_items.0.gathi_types_a', $items[0]->gathi_types_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_2"
                                            name="production_gathi_items[0][gathi_types_b]"
                                            value="{{ old('production_gathi_items.0.gathi_types_b', $items[0]->gathi_types_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_1" name="production_gathi_items[0][height_a]"
                                            value="{{ old('production_gathi_items.0.height_a', $items[0]->height_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_1" name="production_gathi_items[0][height_b]"
                                            value="{{ old('production_gathi_items.0.height_b', $items[0]->height_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">=</span>
                                        <input type="text" id="eq1_a_1" name="production_gathi_items[0][tar_qty_a]"
                                            value="{{ old('production_gathi_items.0.tar_qty_a', $items[0]->tar_qty_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">=</span>
                                        <input type="text" id="eq1_b_1" name="production_gathi_items[0][tar_qty_b]"
                                            value="{{ old('production_gathi_items.0.tar_qty_b', $items[0]->tar_qty_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour1_1" name="production_gathi_items[0][colour1]"
                                    value="{{ old('production_gathi_items.0.colour1', $items[0]->colour1 ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour2_1" name="production_gathi_items[0][colour2]"
                                    value="{{ old('production_gathi_items.0.colour2', $items[0]->colour2 ?? '') }}">
                            </div>
                        </div>

                        <!-- Gathi 1 Row -->
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 1" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_2" name="production_gathi_items[1][border_tar]"
                                    value="{{ old('production_gathi_items.1.border_tar', $items[1]->border_tar ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_2" name="production_gathi_items[1][to_tar]"
                                    value="{{ old('production_gathi_items.1.to_tar', $items[1]->to_tar ?? '') }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_2"
                                            name="production_gathi_items[1][gathi_types_a]"
                                            value="{{ old('production_gathi_items.1.gathi_types_a', $items[1]->gathi_types_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_2"
                                            name="production_gathi_items[1][gathi_types_b]"
                                            value="{{ old('production_gathi_items.1.gathi_types_b', $items[1]->gathi_types_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_a_1_2" name="production_gathi_items[1][height_a]"
                                            value="{{ old('production_gathi_items.1.height_a', $items[1]->height_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_b_1_2" name="production_gathi_items[1][height_b]"
                                            value="{{ old('production_gathi_items.1.height_b', $items[1]->height_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_2" name="production_gathi_items[1][tar_qty_a]"
                                            value="{{ old('production_gathi_items.1.tar_qty_a', $items[1]->tar_qty_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_2" name="production_gathi_items[1][tar_qty_b]"
                                            value="{{ old('production_gathi_items.1.tar_qty_b', $items[1]->tar_qty_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour1_2" name="production_gathi_items[1][colour1]"
                                    value="{{ old('production_gathi_items.1.colour1', $items[1]->colour1 ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour2_2" name="production_gathi_items[1][colour2]"
                                    value="{{ old('production_gathi_items.1.colour2', $items[1]->colour2 ?? '') }}">
                            </div>
                        </div>

                        <!-- Gathi 2 Row -->
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 2" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_3" name="production_gathi_items[2][border_tar]"
                                    value="{{ old('production_gathi_items.2.border_tar', $items[2]->border_tar ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_3" name="production_gathi_items[2][to_tar]"
                                    value="{{ old('production_gathi_items.2.to_tar', $items[2]->to_tar ?? '') }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_3"
                                            name="production_gathi_items[2][gathi_types_a]"
                                            value="{{ old('production_gathi_items.2.gathi_types_a', $items[2]->gathi_types_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_3"
                                            name="production_gathi_items[2][gathi_types_b]"
                                            value="{{ old('production_gathi_items.2.gathi_types_b', $items[2]->gathi_types_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_3_3" name="production_gathi_items[2][height_a]"
                                            value="{{ old('production_gathi_items.2.height_a', $items[2]->height_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_3_3" name="production_gathi_items[2][height_b]"
                                            value="{{ old('production_gathi_items.2.height_b', $items[2]->height_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_3" name="production_gathi_items[2][tar_qty_a]"
                                            value="{{ old('production_gathi_items.2.tar_qty_a', $items[2]->tar_qty_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_3" name="production_gathi_items[2][tar_qty_b]"
                                            value="{{ old('production_gathi_items.2.tar_qty_b', $items[2]->tar_qty_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour1_3" name="production_gathi_items[2][colour1]"
                                    value="{{ old('production_gathi_items.2.colour1', $items[2]->colour1 ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour2_3" name="production_gathi_items[2][colour2]"
                                    value="{{ old('production_gathi_items.2.colour2', $items[2]->colour2 ?? '') }}">
                            </div>
                        </div>

                        <!-- Gathi 3 Row -->
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 3" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_4" name="production_gathi_items[3][border_tar]"
                                    value="{{ old('production_gathi_items.3.border_tar', $items[3]->border_tar ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_4" name="production_gathi_items[3][to_tar]"
                                    value="{{ old('production_gathi_items.3.to_tar', $items[3]->to_tar ?? '') }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_4"
                                            name="production_gathi_items[3][gathi_types_a]"
                                            value="{{ old('production_gathi_items.3.gathi_types_a', $items[3]->gathi_types_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_4"
                                            name="production_gathi_items[3][gathi_types_b]"
                                            value="{{ old('production_gathi_items.3.gathi_types_b', $items[3]->gathi_types_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_a_4_4" name="production_gathi_items[3][height_a]"
                                            value="{{ old('production_gathi_items.3.height_a', $items[3]->height_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_b_4_4" name="production_gathi_items[3][height_b]"
                                            value="{{ old('production_gathi_items.3.height_b', $items[3]->height_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_4" name="production_gathi_items[3][tar_qty_a]"
                                            value="{{ old('production_gathi_items.3.tar_qty_a', $items[3]->tar_qty_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_4" name="production_gathi_items[3][tar_qty_b]"
                                            value="{{ old('production_gathi_items.3.tar_qty_b', $items[3]->tar_qty_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour1_4" name="production_gathi_items[3][colour1]"
                                    value="{{ old('production_gathi_items.3.colour1', $items[3]->colour1 ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour2_4" name="production_gathi_items[3][colour2]"
                                    value="{{ old('production_gathi_items.3.colour2', $items[3]->colour2 ?? '') }}">
                            </div>
                        </div>

                        <!-- Gathi 4 Row -->
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 4" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_5" name="production_gathi_items[4][border_tar]"
                                    value="{{ old('production_gathi_items.4.border_tar', $items[4]->border_tar ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_5" name="production_gathi_items[4][to_tar]"
                                    value="{{ old('production_gathi_items.4.to_tar', $items[4]->to_tar ?? '') }}">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_5"
                                            name="production_gathi_items[4][gathi_types_a]"
                                            value="{{ old('production_gathi_items.4.gathi_types_a', $items[4]->gathi_types_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_5"
                                            name="production_gathi_items[4][gathi_types_b]"
                                            value="{{ old('production_gathi_items.4.gathi_types_b', $items[4]->gathi_types_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_5_5" name="production_gathi_items[4][height_a]"
                                            value="{{ old('production_gathi_items.4.height_a', $items[4]->height_a ?? '') }}">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_5_5" name="production_gathi_items[4][height_b]"
                                            value="{{ old('production_gathi_items.4.height_b', $items[4]->height_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_5" name="production_gathi_items[4][tar_qty_a]"
                                            value="{{ old('production_gathi_items.4.tar_qty_a', $items[4]->tar_qty_a ?? '') }}">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_5" name="production_gathi_items[4][tar_qty_b]"
                                            value="{{ old('production_gathi_items.4.tar_qty_b', $items[4]->tar_qty_b ?? '') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour1_5" name="production_gathi_items[4][colour1]"
                                    value="{{ old('production_gathi_items.4.colour1', $items[4]->colour1 ?? '') }}">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="colour2_5" name="production_gathi_items[4][colour2]"
                                    value="{{ old('production_gathi_items.4.colour2', $items[4]->colour2 ?? '') }}">
                            </div>
                        </div>

                        <div class="grid-row" style="height: 40px; background: #f8fafc;">
                            <div style="flex: 4.2; text-align: right; padding: 10px; font-weight: 800;">
                                TOTAL
                            </div>
                            <div class="cell" style="flex: 1; border-left: 1.5px solid #000;">
                                <span class="symbol">=</span>
                                <input type="text" id="grand_total" name="grand_total"
                                    value="{{ old('grand_total', $data->grand_total) }}">
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
                            <input type="text" name="jala_bharai_team"
                                value="{{ old('jala_bharai_team', $data->jala_bharai_team) }}">
                        </div>
                        <div class="team-box single-input">
                            <label>G/B BUTTON TEAM</label>
                            <input type="text" name="g_button_team"
                                value="{{ old('g_button_team', $data->g_button_team) }}">
                        </div>

                        @php
                            $gathis = $data->gathis;
                            while (count($gathis) < 4) {
                                $gathis[] = new \App\Models\Gathi();
                            }
                        @endphp

                        @for ($i = 0; $i < 4; $i++)
                            <div class="team-box section-grid">
                                <div class="row">
                                    <div>
                                        <label>{{ $i == 0 ? 'GATHI PERSON' : '' }}</label>
                                        <input type="text" name="gathi_items[{{ $i }}][gathi_person]"
                                            value="{{ old('gathi_items.' . $i . '.gathi_person', $gathis[$i]->gathi_person ?? '') }}">
                                    </div>
                                    <div>
                                        <label>{{ $i == 0 ? 'NO' : '' }}</label>
                                        <input type="number" name="gathi_items[{{ $i }}][no]"
                                            value="{{ old('gathi_items.' . $i . '.no', $gathis[$i]->no ?? '') }}">
                                    </div>
                                    <div>
                                        <label>{{ $i == 0 ? 'NO OF GAT' : '' }}</label>
                                        <input type="number" name="gathi_items[{{ $i }}][no_of_gat]"
                                            value="{{ old('gathi_items.' . $i . '.no_of_gat', $gathis[$i]->no_of_gat ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="bottom-section">
                <div class="jala-khola">
                    <div class="sub-title" style="display: flex; align-items: center; gap: 10px;">
                        OLD JALA KHOLA Team
                        <input type="text" id="old_jala_khola_team" name="old_jala_khola_team"
                            style="flex: 1; border: none; border-bottom: 1px solid #334155; background: transparent; height: 18px; font-size: 13px; font-weight: 700; color: #1e293b; outline: none; padding: 0 5px;"
                            value="{{ old('old_jala_khola_team', $data->old_jala_khola_team) }}">
                    </div>
                    <div class="inner-row">
                        <label for="rsSet">R.S. SET</label>
                        <input type="text" id="rs_set" name="rs_set"
                            value="{{ old('rs_set', $data->rs_set) }}">
                    </div>
                    <div class="inner-row">
                        <label for="rajInner">RAJ</label>
                        <input type="text" id="raj_inner" name="raj_inner"
                            value="{{ old('raj_inner', $data->raj_inner) }}">
                    </div>
                    <div class="inner-row">
                        <label for="springInner">SPRING</label>
                        <input type="text" id="springInner" name="springInner"
                            value="{{ old('springInner', $data->springInner) }}">
                    </div>
                    <div class="inner-row">
                        <label for="tubeInner">TUBE</label>
                        <input type="text" id="tubeInner" name="tubeInner"
                            value="{{ old('tubeInner', $data->tubeInner) }}">
                    </div>
                    <div class="inner-row" style="background: #fdfdfd;">
                        <label for="kacchaPakkaTeam">Kaccha/Pakka Team</label>
                        <input type="text" id="kaccha_pakka_team" name="kaccha_pakka_team"
                            value="{{ old('kaccha_pakka_team', $data->kaccha_pakka_team) }}">
                        <div
                            style="width: 180px; border-left: 1px solid #cbd5e1; padding-left: 10px; display: flex; align-items: center; gap: 5px;">
                            <label for="kacchaPakkaDate" style="width: auto; margin: 0;">Date:</label>
                            <input type="date" id="kaccha_pakka_date" name="kaccha_pakka_date"
                                style="width: 130px; border-bottom: 1px dashed #ccc;"
                                value="{{ old('kaccha_pakka_date', $data->kaccha_pakka_date) }}">
                        </div>
                    </div>

                </div>
                <div class="guide-board">
                    <div class="sub-title">Guide Board / Texna</div>
                    <div class="inner-row" style="height: 60px;">
                        <label for="buttonTexna">BUTTON TEXNA</label>
                        <input type="text" id="button_texna" name="button_texna"
                            value="{{ old('button_texna', $data->button_texna) }}">
                    </div>
                    <div class="inner-row" style="height: 80px; flex-direction: column; align-items: flex-start;">
                        <label for="guideBoardTexna">GUIDE BOARD TEXNA</label>
                        <textarea id="guide_board_texna" name="guide_board_texna"
                            style="width: 100%; height: 100%; border: none; outline: none; resize: none; font-weight: 600; font-family: inherit; margin-top: 5px;">{{ old('guide_board_texna', $data->guide_board_texna) }}</textarea>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; border: 1.5px solid #000; background: #fff;">
                <div
                    style="background: #f1f5f9; padding: 5px 10px; font-size: 11px; font-weight: 800; border-bottom: 1px solid #000; text-transform: uppercase;">
                    Remark / Special Instructions
                </div>
                <div style="padding: 10px;">
                    <textarea name="remark" id="remark" placeholder="Yahan apna remark likhein..."
                        style="width: 100%; min-height: 80px; border: none; outline: none; resize: vertical; font-size: 14px; font-weight: 600; font-family: 'Plus Jakarta Sans', sans-serif; color: #1e293b;">{{ old('remark', $data->remark) }}</textarea>
                </div>
            </div>
            <div class="checklist-wrapper">
                @php
                    $checklist = is_array(old('checklist', $data->checklist)) ? old('checklist', $data->checklist) : [];
                @endphp

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="FIBER"
                        {{ in_array('FIBER', $checklist) ? 'checked' : '' }}> FIBER
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="DORI CUT"
                        {{ in_array('DORI CUT', $checklist) ? 'checked' : '' }}> DORI CUT
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="GATHI"
                        {{ in_array('GATHI', $checklist) ? 'checked' : '' }}> GATHI
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="JALA BHARAI"
                        {{ in_array('JALA BHARAI', $checklist) ? 'checked' : '' }}> JALA BHARAI
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="RSS"
                        {{ in_array('RSS', $checklist) ? 'checked' : '' }}> RSS
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="GB & BTN"
                        {{ in_array('GB & BTN', $checklist) ? 'checked' : '' }}> GB & BTN
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="FRAME SET + ACCESSORIES"
                        {{ in_array('FRAME SET + ACCESSORIES', $checklist) ? 'checked' : '' }}>
                    FRAME SET + ACCESSORIES
                </label>
            </div>
            <div style="margin-top: 30px; text-align: right; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <button type="submit"
                    style="background: #2563eb; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: 800; font-size: 14px; cursor: pointer; transition: background 0.3s; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <i class="fas fa-save"></i> UPDATE DATA
                </button>
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
