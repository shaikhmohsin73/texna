@extends('layouts.header')
@section('content')
    <style>
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
    </style>
    <style>
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

        /* Rows */
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

        /* Row height matching image */
        .grid-row:last-child {
            border-bottom: none;
        }

        /* Cells */
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
            height: 80px;
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
    </style>
    <style>
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
    </style>
    <style>
        .bill-box {
            border: 2.5px solid #000;
            padding: 14px;
            margin-bottom: 15px;
        }
    </style>
    <div class="card" style="max-width: 1100px; margin: auto; padding: 40px; border: 1px solid #e2e8f0;">
        <div class="bill-box">
            <div class="form-row">
                <div class="f-box flex-3">
                    <label for="firmName">Firm Name</label>
                    <input type="text" id="firmName" name="firmName">
                </div>
                <div class="f-box">
                    <label for="orDate">OR. Date</label>
                    <input type="date" id="orDate" name="orDate">
                </div>
            </div>
            <div class="form-row">
                <div class="f-box flex-3">
                    <label for="ownName">Own Name</label>
                    <input type="text" id="ownName" name="ownName">
                </div>
                <div class="f-box">
                    <label for="moNo">MO. No</label>
                    <input type="number" id="moNo" name="moNo">
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
                    <input type="text" id="billNo" name="billNo">
                </div>
                <div class="f-box">
                    <label for="loomNo">Loom No</label>
                    <input type="text" id="loomNo" name="loomNo">
                </div>
                <div class="f-box">
                    <label for="chalanNo">Chalan No</label>
                    <input type="text" id="chalanNo" name="chalanNo">
                </div>
                <div class="f-box">
                    <label for="delDate">Del. Date</label>
                    <input type="date" id="delDate" name="delDate">
                </div>
            </div>

        </div>
        <div style="margin-top: 20px;">
            <div class="bill-box">
                <div class="form-row" style="border-top: 1px solid #cbd5e1;">
                    <div class="f-box">
                        <label for="jalaNo">Jala No</label>
                        <input type="text" id="jalaNo" name="jalaNo">
                    </div>
                    <div class="f-box">
                        <label for="fReed">F.Reed</label>
                        <input type="text" id="fReed" name="fReed">
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
                        <label for="bharai">Bharai</label>
                        <input type="text" id="bharai" name="bharai">
                    </div>
                    <div class="f-box">
                        <label for="pana">Pana</label>
                        <input type="text" id="pana" name="pana">
                    </div>
                    <div class="f-box">
                        <label for="tTar">T.Tar</label>
                        <input type="text" id="tTar" name="tTar" readonly>
                    </div>
                </div>
            </div>

            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box">
                        <label for="uFrame">U.Frame</label>
                        <input type="text" id="uFrame" name="uFrame">
                    </div>
                    <div class="f-box">
                        <label for="size">Size</label>
                        <input type="text" id="size" name="size">
                    </div>
                    <div class="f-box">
                        <label for="lFrame">L.Frame</label>
                        <input type="text" id="lFrame" name="lFrame">
                    </div>
                    <div class="f-box">
                        <label for="kaski">Kaski</label>
                        <input type="text" id="kaski" name="kaski">
                    </div>
                </div>

                <div class="form-row">
                    <div class="f-box">
                        <label for="uBelt">U.Belt</label>
                        <input type="text" id="uBelt" name="uBelt">
                    </div>
                    <div class="f-box">
                        <label for="lBelt">L.Belt</label>
                        <input type="text" id="lBelt" name="lBelt">
                    </div>
                    <div class="f-box">
                        <label for="labour">Labour</label>
                        <input type="text" id="labour" name="labour">
                    </div>
                    <div class="f-box">
                        <label for="mcName">M/C Name</label>
                        <input type="text" id="mcName" name="mcName">
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
                        <input type="text" id="totalPcs" name="totalPcs">
                    </div>
                    <div class="f-box flex-2">
                        <label for="doriType">Dori Type</label>
                        <input type="text" id="doriType" name="doriType">
                    </div>
                    <div class="f-box">
                        <label for="doriCutPerson">Dori Cut person</label>
                        <input type="text" id="doriCutPerson" name="doriCutPerson">
                    </div>
                    <div class="f-box">
                        <label for="doriKg">& Kg</label>
                        <input type="text" id="doriKg" name="doriKg">
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="max-width: 1100px; margin: auto; padding: 30px; border: 1px solid #e2e8f0;">
            <div class="prod-grid">
                <div class="left-table">
                    <div class="grid-header">
                        <div class="w-gathi" style="padding:10px;">GATHI</div>
                        <div class="w-tar" style="padding:10px;">BORDER TAR</div>
                        <div class="w-total-tar" style="padding:10px;">TO TAR</div>
                        <div style="flex:1; padding:10px;">HEIGHT</div>
                        <div style="flex:1; padding:10px;">TAR QTY</div>
                    </div>
                    <div class="grid-row">
                        <div class="cell w-gathi">
                            <input type="text" value="Gathi" readonly name="items[0][gathi_label]">
                        </div>
                        <div class="cell w-tar">
                            <input type="text" id="tar_1" name="items[0][border_tar]">
                        </div>
                        <div class="cell w-total-tar">
                            <input type="text" id="totalTar_1" name="items[0][to_tar]">
                        </div>
                        <div class="cell w-math" style="padding:0;">
                            <div class="math-box">
                                <div class="math-line">
                                    <span class="symbol">*</span>
                                    <input type="text" id="mul1_a_1" name="items[0][height_a]">
                                </div>
                                <div class="math-line">
                                    <span class="symbol">*</span>
                                    <input type="text" id="mul1_b_1" name="items[0][height_b]">
                                </div>
                            </div>
                        </div>
                        <div class="cell w-math" style="padding:0; border-right:none;">
                            <div class="math-box">
                                <div class="math-line">
                                    <span class="symbol">=</span>
                                    <input type="text" id="eq1_a_1" name="items[0][tar_qty_a]">
                                </div>
                                <div class="math-line">
                                    <span class="symbol">=</span>
                                    <input type="text" id="eq1_b_1" name="items[0][tar_qty_b]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-row">
                        <div class="cell w-gathi">
                            <input type="text" value="Gathi" readonly name="items[1][gathi_label]">
                        </div>
                        <div class="cell w-tar">
                            <input type="text" id="tar_2" name="items[1][border_tar]">
                        </div>
                        <div class="cell w-total-tar">
                            <input type="text" id="totalTar_2" name="items[1][to_tar]">
                        </div>
                        <div class="cell w-math" style="padding:0;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_a_2" name="items[1][height_a]">
                                </div>
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_b_2" name="items[1][height_b]">
                                </div>
                            </div>
                        </div>
                        <div class="cell w-math" style="padding:0; border-right:none;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_a_2" name="items[1][tar_qty_a]">
                                </div>
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_b_2" name="items[1][tar_qty_b]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-row">
                        <div class="cell w-gathi">
                            <input type="text" value="Gathi" readonly name="items[2][gathi_label]">
                        </div>
                        <div class="cell w-tar">
                            <input type="text" id="tar_3" name="items[2][border_tar]">
                        </div>
                        <div class="cell w-total-tar">
                            <input type="text" id="totalTar_3" name="items[2][to_tar]">
                        </div>
                        <div class="cell w-math" style="padding:0;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_a_3" name="items[2][height_a]">
                                </div>
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_b_3" name="items[2][height_b]">
                                </div>
                            </div>
                        </div>
                        <div class="cell w-math" style="padding:0; border-right:none;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_a_3" name="items[2][tar_qty_a]">
                                </div>
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_b_3" name="items[2][tar_qty_b]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-row">
                        <div class="cell w-gathi">
                            <input type="text" value="Gathi" readonly name="items[3][gathi_label]">
                        </div>
                        <div class="cell w-tar">
                            <input type="text" id="tar_4" name="items[3][border_tar]">
                        </div>
                        <div class="cell w-total-tar">
                            <input type="text" id="totalTar_4" name="items[3][to_tar]">
                        </div>
                        <div class="cell w-math" style="padding:0;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_a_4" name="items[3][height_a]">
                                </div>
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_b_4" name="items[3][height_b]">
                                </div>
                            </div>
                        </div>
                        <div class="cell w-math" style="padding:0; border-right:none;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_a_4" name="items[3][tar_qty_a]">
                                </div>
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_b_4" name="items[3][tar_qty_b]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-row">
                        <div class="cell w-gathi">
                            <input type="text" value="Gathi" readonly name="items[4][gathi_label]">
                        </div>
                        <div class="cell w-tar">
                            <input type="text" id="tar_5" name="items[4][border_tar]">
                        </div>
                        <div class="cell w-total-tar">
                            <input type="text" id="totalTar_5" name="items[4][to_tar]">
                        </div>
                        <div class="cell w-math" style="padding:0;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_a_5" name="items[4][height_a]">
                                </div>
                                <div class="math-line"><span class="symbol">*</span>
                                    <input type="text" id="mul1_b_5" name="items[4][height_b]">
                                </div>
                            </div>
                        </div>
                        <div class="cell w-math" style="padding:0; border-right:none;">
                            <div class="math-box">
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_a_5" name="items[4][tar_qty_a]">
                                </div>
                                <div class="math-line"><span class="symbol">=</span>
                                    <input type="text" id="eq1_b_5" name="items[4][tar_qty_b]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-row" style="height: 40px; background: #f8fafc;">
                        <div style="flex: 4.2; text-align: right; padding: 10px; font-weight: 800;">
                            TOTAL
                        </div>
                        <div class="cell" style="flex: 1; border-left: 1.5px solid #000;">
                            <span class="symbol">=</span>
                            <input type="text" id="grandTotal" name="grandTotal">
                        </div>
                    </div>
                </div>
                <div class="right-team">
                    <div class="grid-header">
                        <div style="flex:1; padding:10px; border-left:1px solid #000;">
                            PERSONNEL / TEAM
                        </div>
                    </div>
                    <div class="team-box">
                        <label for="jalaBharaiTeam">JALA BHARAI TEAM</label>
                        <input type="text" id="jalaBharaiTeam" name="jalaBharaiTeam">
                    </div>
                    <div class="team-box">
                        <label for="gButtonTeam">G/B BUTTON TEAM</label>
                        <input type="text" id="gButtonTeam" name="gButtonTeam">
                    </div>
                    <div class="team-box">
                        <label for="gathiPerson">GATHI PERSON | NO OF GAT</label>
                        <input type="text" id="gathiPerson" name="gathiPerson">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bottom-section">
            <div class="jala-khola">
                <div class="sub-title" style="display: flex; align-items: center; gap: 10px;">
                    OLD JALA KHOLA Team
                    <input type="text" id="oldJalaKholaTeam" name="oldJalaKholaTeam"
                        style="flex: 1; border: none; border-bottom: 1px solid #334155; background: transparent; height: 18px; font-size: 13px; font-weight: 700; color: #1e293b; outline: none; padding: 0 5px;">
                </div>
                <div class="inner-row">
                    <label for="rsSet">R.S. SET</label>
                    <input type="text" id="rsSet" name="rsSet">
                </div>
                <div class="inner-row">
                    <label for="rajInner">RAJ</label>
                    <input type="text" id="rajInner" name="rajInner">
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
                    <input type="text" id="kacchaPakkaTeam" name="kacchaPakkaTeam">
                    <div
                        style="width: 180px; border-left: 1px solid #cbd5e1; padding-left: 10px; display: flex; align-items: center; gap: 5px;">
                        <label for="kacchaPakkaDate" style="width: auto; margin: 0;">Date:</label>
                        <input type="date" id="kacchaPakkaDate" name="kacchaPakkaDate"
                            style="width: 130px; border-bottom: 1px dashed #ccc;">
                    </div>
                </div>

            </div>
            <div class="guide-board">
                <div class="sub-title">Guide Board / Texna</div>
                <div class="inner-row" style="height: 60px;">
                    <label for="buttonTexna">BUTTON TEXNA</label>
                    <input type="text" id="buttonTexna" name="buttonTexna">
                </div>
                <div class="inner-row" style="height: 80px; flex-direction: column; align-items: flex-start;">
                    <label for="guideBoardTexna">GUIDE BOARD TEXNA</label>
                    <textarea id="guideBoardTexna" name="guideBoardTexna"
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
            <label class="check-box-item" for="fiber">
                <input type="checkbox" id="fiber" name="checklist"> FIBER
            </label>
            <label class="check-box-item" for="dori-cut">
                <input type="checkbox" id="dori-cut" name="checklist"> DORI CUT
            </label>
            <label class="check-box-item" for="gathi">
                <input type="checkbox" id="gathi" name="checklist"> GATHI
            </label>
            <label class="check-box-item" for="jala-bharai">
                <input type="checkbox" id="jala-bharai" name="checklist"> JALA BHARAI
            </label>
            <label class="check-box-item" for="rss">
                <input type="checkbox" id="rss" name="checklist"> RSS
            </label>
            <label class="check-box-item" for="gb-btn">
                <input type="checkbox" id="gb-btn" name="checklist"> GB & BTN
            </label>
            <label class="check-box-item" for="frame-set">
                <input type="checkbox" id="frame-set" name="checklist"> FRAME SET + ACCESSORIES
            </label>
        </div>

    </div>
    <script>
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
    </script>
    <script>
        function calculateTotalToPCS() {
            let total = 0;
            document.querySelectorAll('.grid-row').forEach(row => {
                const tarInput = row.querySelector('input[id^="tar_"]');
                const totalTarInput = row.querySelector('input[id^="totalTar_"]');
                const borderTar = parseFloat(tarInput?.value) || 0;
                const toTar = parseFloat(totalTarInput?.value) || 0;
                total += borderTar * toTar;
            });
            const pcsInput = document.getElementById('tTar');
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
    </script>
@endsection
