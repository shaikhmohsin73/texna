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
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card" style="max-width: 1100px; margin: auto; padding: 40px; border: 1px solid #e2e8f0;">
            <div class="out-of-wrapper right-align">
                <input type="number" class="out-input" placeholder="__" name="number_1">
                <span class="out-text">OUT OF</span>
                <input type="number" class="out-input" placeholder="__" name="number_2">
            </div>
            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="firmName">Firm Name</label>
                        <input type="text" id="firm_name" name="firm_name">
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
                        <input type="date" id="or_date" name="or_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="ownName">Own Name</label>
                        <input type="text" id="own_name" name="own_name">
                    </div>
                    <div class="f-box">
                        <label for="moNo">MO. No</label>
                        <input type="number" id="mo_no" name="mo_no">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address">
                    </div>
                </div>
                <div class="form-row">
                    <div class="f-box">
                        <label for="billNo">Bill No.</label>
                        <input type="text" id="bill_no" name="bill_no">
                    </div>
                    <div class="f-box">
                        <label for="loomNo">Loom No</label>
                        <input type="text" id="loom_no" name="loom_no">
                    </div>
                    <div class="f-box">
                        <label for="chalanNo">Chalan No</label>
                        <input type="text" id="chalan_no" name="chalan_no">
                    </div>
                    <div class="f-box">
                        <label for="delDate">Del. Date</label>
                        <input type="date" id="del_date" name="del_date">
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <div class="bill-box">
                    <div class="form-row" style="border-top: 1px solid #cbd5e1;">
                        <div class="f-box">
                            <label for="jalaNo">Jala No</label>
                            <input type="text" id="jala_no" name="jala_no">
                        </div>
                        <div class="f-box">
                            <label for="fReed">F.Reed</label>
                            <input type="text" id="f_reed" name="f_reed">
                        </div>
                        <div class="f-box">
                            <label for="line">Line</label>
                            <input type="text" id="line" name="line">
                        </div>
                        <div class="f-box">
                            <label for="pcs">PCS</label>
                            <input type="text" id="pcs" name="pcs">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="pattern_no">Pattern NO</label>
                            <input type="text" id="pattern_no" name="pattern_no">
                        </div>
                        <div class="f-box">
                            <label for="pattern_no">Pattern File</label>
                            <input type="File" id="pattern_File" name="pattern_File">
                        </div>
                        <div class="f-box">
                            <label for="bharai">Bharai</label>
                            <input type="text" id="bharai" name="bharai">
                        </div>
                        <div class="f-box">
                            <label for="pana">Pana</label>
                            <input type="text" id="pana" name="pana">
                        </div>
                        <div class="f-box">
                            <label for="tTar">T.Tar</label>
                            <input type="text" id="t_tar" name="t_tar" readonly>
                        </div>
                    </div>
                </div>

                <div class="bill-box">
                    <div class="form-row">
                        <div class="f-box">
                            <label for="uFrame">U.Frame</label>
                            <input type="text" id="u_frame" name="u_frame">
                        </div>
                        <div class="f-box">
                            <label for="size">Size</label>
                            <input type="text" id="size" name="size">
                        </div>
                        <div class="f-box">
                            <label for="lFrame">L.Frame</label>
                            <input type="text" id="l_frame" name="l_frame">
                        </div>
                        <div class="f-box">
                            <label for="kaski">Kaski</label>
                            <input type="text" id="kaski" name="kaski">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="uBelt">U.Belt</label>
                            <input type="text" id="u_belt" name="u_belt">
                        </div>
                        <div class="f-box">
                            <label for="lBelt">L.Belt</label>
                            <input type="text" id="l_belt" name="l_belt">
                        </div>
                        <div class="f-box">
                            <label for="labour">Labour</label>
                            <input type="text" id="labour" name="labour">
                        </div>
                        <div class="f-box">
                            <label for="mcName">M/C Name</label>
                            <input type="text" id="mc_name" name="mc_name">
                        </div>
                    </div>
                </div>

                <div class="bill-box">
                    <div class="form-row">
                        <div class="f-box">
                            <label for="spring">Spring</label>
                            <input type="text" id="spring" name="spring">
                        </div>
                        <div class="f-box">
                            <label for="raj">Raj</label>
                            <input type="text" id="raj" name="raj">
                        </div>
                        <div class="f-box">
                            <label for="patti">Patti</label>
                            <input type="text" id="patti" name="patti">
                        </div>
                        <div class="f-box">
                            <label for="legpin">Legpin</label>
                            <input type="text" id="legpin" name="legpin">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="tube">Tube</label>
                            <input type="text" id="tube" name="tube">
                        </div>
                        <div class="f-box">
                            <label for="totalPcs">To.Pcs</label>
                            <input type="text" id="total_pcs" name="total_pcs">
                        </div>
                        <div class="f-box flex-2">
                            <label for="doriType">Dori Type</label>
                            <input type="text" id="dori_type" name="dori_type">
                        </div>
                        <div class="f-box">
                            <label for="doriCutPerson">Dori Cut person</label>
                            <input type="text" id="dori_cut_person" name="dori_cut_person">
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
                            <option value="jaadi">Jaadi</option>
                            <option value="patli">Patli</option>
                        </select>
                    </div>
                    <div class="dori-row-item">
                        <label>METER'S</label>
                        <input type="text" name="meter" id="meter" readonly>
                    </div>

                    <div class="dori-row-item">
                        <label>BR TAR</label>
                        <input type="text" name="br_tar" id="br_tar" readonly>
                    </div>
                    <div class="dori-row-item">
                        <label>TAR</label>
                        <input type="text" name="new_tar" id="new_tar" readonly>
                    </div>
                    <div class="dori-row-item">
                        <label>TOTAL TAR</label>
                        <input type="text" name="total_tar_new" id="total_tar_new" readonly>
                    </div>
                    <div class="dori-row-item">
                        <label>COLOUR-1 &nbsp;KG</label>
                        <input type="text" name="kg_1" id="kg_1">
                    </div>
                    <div class="dori-row-item">
                        <label>COLOUR-2&nbsp; KG</label>
                        <input type="text" name="kg_2" id="kg_2">
                    </div>
                    <div class="dori-row-item">
                        <label>Total KG</label>
                        <input type="text" name="total_kg" id="total_kg">
                    </div>
                    <input type="hidden" id="hidden_total_kg" name="hidden_total_kg">
                    <input type="hidden" id="jalabarai_value" name="jalabarai_value">

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
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="BORDER" readonly id="border_val">
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_1" name="production_gathi_items[0][border_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][to_tar]">
                            </div>
                            {{-- <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1" name="production_gathi_items[0][gathi_types_a]">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_2" name="production_gathi_items[0][gathi_types_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_1" name="production_gathi_items[0][height_a]">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_1" name="production_gathi_items[0][height_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">=</span>
                                        <input type="text" id="eq1_a_1" name="production_gathi_items[0][tar_qty_a]">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">=</span>
                                        <input type="text" id="eq1_b_1" name="production_gathi_items[0][tar_qty_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][to_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][to_tar]">
                            </div> --}}
                        </div>
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 1" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_2" name="production_gathi_items[1][border_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_2" name="production_gathi_items[1][to_tar]">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_2"
                                            name="production_gathi_items[1][gathi_types_a]">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_2"
                                            name="production_gathi_items[1][gathi_types_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_a_1_2" name="production_gathi_items[1][height_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_b_1_2" name="production_gathi_items[1][height_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_2" name="production_gathi_items[1][tar_qty_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_2" name="production_gathi_items[1][tar_qty_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_a]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_b]">
                            </div>
                        </div>
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 2" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_3" name="production_gathi_items[2][border_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_3" name="production_gathi_items[2][to_tar]">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_3"
                                            name="production_gathi_items[2][gathi_types_a]">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_3"
                                            name="production_gathi_items[2][gathi_types_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_3_3" name="production_gathi_items[2][height_a]">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_3_3" name="production_gathi_items[2][height_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_3" name="production_gathi_items[2][tar_qty_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_3" name="production_gathi_items[2][tar_qty_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_a]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_b]">
                            </div>
                        </div>
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 3" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_4" name="production_gathi_items[3][border_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_4" name="production_gathi_items[3][to_tar]">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_4"
                                            name="production_gathi_items[3][gathi_types_a]">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_4"
                                            name="production_gathi_items[3][gathi_types_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_a_4_4" name="production_gathi_items[3][height_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">*</span>
                                        <input type="text" id="mul1_b_4_4" name="production_gathi_items[3][height_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_4" name="production_gathi_items[3][tar_qty_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_4" name="production_gathi_items[3][tar_qty_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_a]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_b]">
                            </div>
                        </div>
                        <div class="grid-row">
                            <div class="cell w-gathi">
                                <input type="text" value="Gathi 4" readonly>
                            </div>
                            <div class="cell w-tar">
                                <input type="text" id="tar_5" name="production_gathi_items[4][border_tar]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_5" name="production_gathi_items[4][to_tar]">
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <input type="text" id="gathi_a_1_5"
                                            name="production_gathi_items[4][gathi_types_a]">
                                    </div>
                                    <div class="math-line">
                                        <input type="text" id="gathi_b_1_5"
                                            name="production_gathi_items[4][gathi_types_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0;">
                                <div class="math-box">
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_a_5_5" name="production_gathi_items[4][height_a]">
                                    </div>
                                    <div class="math-line">
                                        <span class="symbol">*</span>
                                        <input type="text" id="mul1_b_5_5" name="production_gathi_items[4][height_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-math" style="padding:0; border-right:none;">
                                <div class="math-box">
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_a_5" name="production_gathi_items[4][tar_qty_a]">
                                    </div>
                                    <div class="math-line"><span class="symbol">=</span>
                                        <input type="text" id="eq1_b_5" name="production_gathi_items[4][tar_qty_b]">
                                    </div>
                                </div>
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_a]">
                            </div>
                            <div class="cell w-total-tar">
                                <input type="text" id="totalTar_1" name="production_gathi_items[0][tar_qty_b]">
                            </div>
                        </div>

                        <div class="grid-row" style="height: 40px; background: #f8fafc;">
                            <div style="flex: 4.2; text-align: right; padding: 10px; font-weight: 800;">
                                TOTAL
                            </div>
                            <div class="cell" style="flex: 1; border-left: 1.5px solid #000;">
                                <span class="symbol">=</span>
                                <input type="text" id="grand_total" name="grand_total">
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
                            <input type="text" name="jala_bharai_team">
                        </div>
                        <div class="team-box single-input">
                            <label>G/B BUTTON TEAM</label>
                            <input type="text" name="g_button_team">
                        </div>
                        <div class="team-box section-grid">
                            <div class="row">
                                <div>
                                    <label>GATHI PERSON</label>
                                    <input type="text" name="gathi_items[0][gathi_person]">
                                </div>
                                <div>
                                    <label>NO</label>
                                    <input type="number" name="gathi_items[0][no]">
                                </div>
                                <div>
                                    <label>NO OF GAT</label>
                                    <input type="number" name="gathi_items[0][no_of_gat]">
                                </div>
                            </div>
                        </div>
                        <div class="team-box section-grid">
                            <div class="row">
                                <div>
                                    <input type="text" name="gathi_items[1][gathi_person]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[1][no]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[1][no_of_gat]">
                                </div>
                            </div>
                        </div>
                        <div class="team-box section-grid">
                            <div class="row">
                                <div>
                                    <input type="text" name="gathi_items[2][gathi_person]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[2][no]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[2][no_of_gat]">
                                </div>
                            </div>
                        </div>
                        <div class="team-box section-grid">
                            <div class="row">
                                <div>
                                    <input type="text" name="gathi_items[3][gathi_person]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[3][no]">
                                </div>
                                <div>
                                    <input type="number" name="gathi_items[3][no_of_gat]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-section">
                <div class="jala-khola">
                    <div class="sub-title" style="display: flex; align-items: center; gap: 10px;">
                        OLD JALA KHOLA Team
                        <input type="text" id="old_jala_khola_team" name="old_jala_khola_team"
                            style="flex: 1; border: none; border-bottom: 1px solid #334155; background: transparent; height: 18px; font-size: 13px; font-weight: 700; color: #1e293b; outline: none; padding: 0 5px;">
                    </div>
                    <div class="inner-row">
                        <label for="rsSet">R.S. SET</label>
                        <input type="text" id="rs_set" name="rs_set">
                    </div>
                    <div class="inner-row">
                        <label for="rajInner">RAJ</label>
                        <input type="text" id="raj_inner" name="raj_inner">
                    </div>
                    <div class="inner-row">
                        <label for="springInner">SPRING</label>
                        <input type="text" id="springInner" name="springInner">
                    </div>
                    <div class="inner-row">
                        <label for="tubeInner">TUBE</label>
                        <input type="text" id="tubeInner" name="tubeInner">
                    </div>
                    <div class="inner-row" style="background: #fdfdfd;">
                        <label for="kacchaPakkaTeam">Kaccha/Pakka Team</label>
                        <input type="text" id="kaccha_pakka_team" name="kaccha_pakka_team">
                        <div
                            style="width: 180px; border-left: 1px solid #cbd5e1; padding-left: 10px; display: flex; align-items: center; gap: 5px;">
                            <label for="kacchaPakkaDate" style="width: auto; margin: 0;">Date:</label>
                            <input type="date" id="kaccha_pakka_date" name="kaccha_pakka_date"
                                style="width: 130px; border-bottom: 1px dashed #ccc;">
                        </div>
                    </div>

                </div>
                <div class="guide-board">
                    <div class="sub-title">Guide Board / Texna</div>
                    <div class="inner-row" style="height: 60px;">
                        <label for="buttonTexna">BUTTON TEXNA</label>
                        <input type="text" id="button_texna" name="button_texna">
                    </div>
                    <div class="inner-row" style="height: 80px; flex-direction: column; align-items: flex-start;">
                        <label for="guideBoardTexna">GUIDE BOARD TEXNA</label>
                        <textarea id="guide_board_texna" name="guide_board_texna"
                            style="width: 100%; height: 100%; border: none; outline: none; resize: none; font-weight: 600; font-family: inherit; margin-top: 5px;">
                    </textarea>
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
                        style="width: 100%; min-height: 80px; border: none; outline: none; resize: vertical; font-size: 14px; font-weight: 600; font-family: 'Plus Jakarta Sans', sans-serif; color: #1e293b;">
                </textarea>
                </div>
            </div>
            <div class="checklist-wrapper">
                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="FIBER"> FIBER
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="DORI CUT"> DORI CUT
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="GATHI"> GATHI
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="JALA BHARAI"> JALA BHARAI
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="RSS"> RSS
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="GB & BTN"> GB & BTN
                </label>

                <label class="check-box-item">
                    <input type="checkbox" name="checklist[]" value="FRAME SET + ACCESSORIES">
                    FRAME SET + ACCESSORIES
                </label>
            </div>
            <div style="margin-top: 30px; text-align: right; border-top: 1px solid #e2e8f0; padding-top: 20px;">
                <button type="submit"
                    style="background: #2563eb; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: 800; font-size: 14px; cursor: pointer; transition: background 0.3s; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <i class="fas fa-save"></i> SAVE DATA
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
        const menuLinks = document.querySelectorAll('.menu a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                menuLinks.forEach(link => link.classList.remove('active'));
                link.classList.add('active');
            });
        });
        const currentUrl = window.location.pathname;
        menuLinks.forEach(link => {
            if (link.href.includes(currentUrl)) {
                link.classList.add('active');
            }
        });

        function calculateTotalToPCS() {
            let total = 0;
            document.querySelectorAll('.grid-row').forEach(row => {
                const tarInput = row.querySelector('input[id^="tar_"]');
                const totalTarInput = row.querySelector('input[id^="totalTar_"]');
                const borderTar = parseFloat(tarInput?.value) || 0;
                const toTar = parseFloat(totalTarInput?.value) || 0;
                total += borderTar * toTar;
            });
            const pcsInput = document.getElementById('t_tar');
            if (pcsInput) {
                pcsInput.value = total.toFixed(2);
            }
        }
        document.addEventListener('input', function(e) {
            if (
                e.target.id.includes('tar_') ||
                e.target.id.includes('totalTar_')
            ) {
                calculateTotalToPCS();
            }
        });
        document.addEventListener('input', function(e) {
            const tar1 = parseFloat(document.getElementById('tar_1')?.value) || 0;
            const totalTar1 = parseFloat(document.getElementById('totalTar_1')?.value) || 0;
            const brTarInput = document.getElementById('br_tar');

            const brTarValue = tar1 * totalTar1;
            if (brTarInput) brTarInput.value = brTarValue;
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

        });

        function calculateColor(b_tar, t_bar, gathi) {
            return (b_tar / 3) * gathi * t_bar;
        }

        function calculateAndLogColor() {
            let b_tar1 = parseFloat(document.getElementById('tar_1').value);
            let t_bar1 = parseFloat(document.getElementById('totalTar_1').value);
            let gathi_a1 = parseFloat(document.getElementById('gathi_a_1').value);
            let gathi_b1 = parseFloat(document.getElementById('gathi_b_2').value);
            let tar_2 = parseFloat(document.getElementById('tar_2').value);
            let totalTar_2 = parseFloat(document.getElementById('totalTar_2').value);
            let gathi_a_1_2 = parseFloat(document.getElementById('gathi_a_1_2').value);
            let gathi_b_1_2 = parseFloat(document.getElementById('gathi_b_1_2').value);
            let tar_3 = parseFloat(document.getElementById('tar_3').value);
            let totalTar_3 = parseFloat(document.getElementById('totalTar_3').value);
            let gathi_a_1_3 = parseFloat(document.getElementById('gathi_a_1_3').value);
            let gathi_b_1_3 = parseFloat(document.getElementById('gathi_b_1_3').value);
            let tar_4 = parseFloat(document.getElementById('tar_4').value);
            let totalTar_4 = parseFloat(document.getElementById('totalTar_4').value);
            let gathi_a_1_4 = parseFloat(document.getElementById('gathi_a_1_4').value);
            let gathi_b_1_4 = parseFloat(document.getElementById('gathi_b_1_4').value);
            let tar_5 = parseFloat(document.getElementById('tar_5').value);
            let totalTar_5 = parseFloat(document.getElementById('totalTar_5').value);
            let gathi_a_1_5 = parseFloat(document.getElementById('gathi_a_1_5').value);
            let gathi_b_1_5 = parseFloat(document.getElementById('gathi_b_1_5').value);

            console.log("Result for Gathi A1: " + calculateColor(b_tar1, t_bar1, gathi_a1));
            console.log("Result for Gathi B1: " + calculateColor(b_tar1, t_bar1, gathi_b1));
            console.log("Result for Gathi A1: " + calculateColor(tar_2, totalTar_2, gathi_a_1_2));
            console.log("Result for Gathi B1: " + calculateColor(tar_2, totalTar_2, gathi_b_1_2));
            console.log("Result for Gathi A1: " + calculateColor(tar_3, totalTar_3, gathi_a_1_3));
            console.log("Result for Gathi B1: " + calculateColor(tar_3, totalTar_3, gathi_b_1_3));
            console.log("Result for Gathi A1: " + calculateColor(tar_4, totalTar_4, gathi_a_1_4));
            console.log("Result for Gathi B1: " + calculateColor(tar_4, totalTar_4, gathi_b_1_4));
            console.log("Result for Gathi A1: " + calculateColor(tar_5, totalTar_5, gathi_a_1_5));
            console.log("Result for Gathi B1: " + calculateColor(tar_5, totalTar_5, gathi_b_1_5));
        }
        window.onload = function() {
            const btn = document.getElementById('calculateBtn');
            if (btn) {
                btn.addEventListener('click', function() {
                    const elTar = document.getElementById('total_tar_new');
                    const elMeter = document.getElementById('meter');
                    const elGathiA = document.getElementById('mul1_a_1_2');
                    const elGathiB = document.getElementById('mul1_b_1_2');
                    if (!elTar || !elMeter || !elGathiA || !elGathiB) {
                        alert("Please check: Inputs missing on page!");
                        return;
                    }
                    let valTotalTar = parseFloat(elTar.value) || 0;
                    let valMeter = parseFloat(elMeter.value) || 0;
                    let valGathiA = parseFloat(elGathiA.value) || 0;
                    let valGathiB = parseFloat(elGathiB.value) || 0;
                    const divider = 39.37;
                    const factor1 = 0.50;
                    const factor2 = 0.50;
                    let a_step1 = valTotalTar * valGathiA;
                    let a_step2 = a_step1 / divider;
                    let a_step3 = a_step2 * factor1;
                    let a_final = a_step3 / valMeter;
                    let b_step1 = valTotalTar * valGathiB;
                    let b_step2 = b_step1 / divider;
                    let b_step3 = b_step2 * factor2;
                    let b_final = b_step3 / valMeter;
                    // console.log("COLOR A FINAL:", a_final.toFixed(2));
                    // console.log("COLOR B FINAL:", b_final.toFixed(2));
                    const inputKg1 = document.getElementById('kg_1');
                    if (inputKg1) {
                        inputKg1.value = a_final.toFixed(2);
                    }
                    const inputKg2 = document.getElementById('kg_2');
                    if (inputKg2) {
                        inputKg2.value = b_final.toFixed(2);
                    }
                    const inputTotalKg = document.getElementById('total_kg');
                    if (inputTotalKg) {
                        let combinedTotal = a_final + b_final;
                        inputTotalKg.value = combinedTotal.toFixed(2);
                    }
                    const cuttingrs = document.getElementById('total_kg');
                    if (cuttingrs) {
                        let combinedTotal = a_final + b_final;
                        cuttingrs.value = combinedTotal.toFixed(2);
                        const hiddenInput = document.getElementById('hidden_total_kg');
                        if (hiddenInput) {
                            let multipliedValue = combinedTotal * 5.5;
                            hiddenInput.value = multipliedValue.toFixed(2);
                            console.log("Hidden Input Value (Total KG * 5.5):", multipliedValue.toFixed(2));
                        }
                    }
                    const jalabarai = document.getElementById('total_tar_new');
                    const jalabaraiResult = document.getElementById('jalabarai_value');
                    if (jalabarai) {
                        let tarValue = parseFloat(jalabarai.value) || 0;
                        let calculatedJalabarai = tarValue * 0.25;
                        if (jalabaraiResult) {
                            jalabaraiResult.value = calculatedJalabarai.toFixed(2);
                        }
                        console.log("Jalabarai (total_tar_new * 0.25):", calculatedJalabarai.toFixed(2));
                    }
                });
            } else {
                console.error("Error: 'calculateBtn' id wala button nahi mila. HTML mein id sahi check karein.");
            }
        };
    </script>
@endsection
