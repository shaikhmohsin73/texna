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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <form method="POST">
        @csrf
        @method('PUT')
        <button type="button" onclick="generatePDF()"
            style="background: #059669; color: white; padding: 12px 30px; border: none; border-radius: 6px; font-weight: 800; font-size: 14px; cursor: pointer; margin-right: 10px;">
            <i class="fas fa-file-pdf"></i> GENERATE PDF (JS)
        </button>
        <script></script>
        <div class="card" style="max-width: 1100px; margin: auto; padding: 40px; border: 1px solid #e2e8f0;">
            <div class="bill-box">
                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="firmName">Firm Name</label>
                        <input type="text" id="firm_name" name="firm_name" value="{{ $data->firm_name }}">
                    </div>
                    <div class="f-box">
                        <label for="orDate">OR. Date</label>
                        <input type="date" id="or_date" name="or_date"
                            value="{{ $data->or_date ? $data->or_date->format('Y-m-d') : '' }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="f-box flex-3">
                        <label for="ownName">Own Name</label>
                        <input type="text" id="own_name" name="own_name" value="{{ $data->own_name }}">
                    </div>
                    <div class="f-box">
                        <label for="moNo">MO. No</label>
                        <input type="number" id="mo_no" name="mo_no" value="{{ $data->mo_no }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="f-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="{{ $data->address }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="f-box">
                        <label for="billNo">Bill No.</label>
                        <input type="text" id="bill_no" name="bill_no" value="{{ $data->bill_no }}">
                    </div>
                    <div class="f-box">
                        <label for="loomNo">Loom No</label>
                        <input type="text" id="loom_no" name="loom_no" value="{{ $data->loom_no }}">
                    </div>
                    <div class="f-box">
                        <label for="chalanNo">Chalan No</label>
                        <input type="text" id="chalan_no" name="chalan_no" value="{{ $data->chalan_no }}">
                    </div>
                    <div class="f-box">
                        <label for="delDate">Del. Date</label>
                        <input type="date" id="del_date" name="del_date"
                            value="{{ $data->del_date ? $data->del_date->format('Y-m-d') : '' }}">
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px;">
                <div class="bill-box">
                    <div class="form-row" style="border-top: 1px solid #cbd5e1;">
                        <div class="f-box">
                            <label for="jalaNo">Jala No</label>
                            <input type="text" id="jala_no" name="jala_no" value="{{ $data->jala_no }}">
                        </div>
                        <div class="f-box">
                            <label for="fReed">F.Reed</label>
                            <input type="text" id="f_reed" name="f_reed" value="{{ $data->f_reed }}">
                        </div>
                        <div class="f-box">
                            <label for="line">Line</label>
                            <input type="text" id="line" name="line" value="{{ $data->line }}">
                        </div>
                        <div class="f-box">
                            <label for="pcs">PCS</label>
                            <input type="text" id="pcs" name="pcs" value="{{ $data->pcs }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="pattern_no">Pattern NO</label>
                            <input type="text" id="pattern_no" name="pattern_no" value="{{ $data->pattern_no }}">
                        </div>
                        <div class="f-box">
                            <label for="bharai">Bharai</label>
                            <input type="text" id="bharai" name="bharai" value="{{ $data->bharai }}">
                        </div>
                        <div class="f-box">
                            <label for="pana">Pana</label>
                            <input type="text" id="pana" name="pana" value="{{ $data->pana }}">
                        </div>
                        <div class="f-box">
                            <label for="tTar">T.Tar</label>
                            <input type="text" id="t_tar" name="t_tar" value="{{ $data->t_tar }}" readonly>
                        </div>
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
                        <div class="f-box">
                            <label for="spring">Spring</label>
                            <input type="text" id="spring" name="spring" value="{{ $data->spring }}">
                        </div>
                        <div class="f-box">
                            <label for="raj">Raj</label>
                            <input type="text" id="raj" name="raj" value="{{ $data->raj }}">
                        </div>
                        <div class="f-box">
                            <label for="patti">Patti</label>
                            <input type="text" id="patti" name="patti" value="{{ $data->patti }}">
                        </div>
                        <div class="f-box">
                            <label for="legpin">Legpin</label>
                            <input type="text" id="legpin" name="legpin" value="{{ $data->legpin }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="f-box">
                            <label for="tube">Tube</label>
                            <input type="text" id="tube" name="tube" value="{{ $data->tube }}">
                        </div>
                        <div class="f-box">
                            <label for="totalPcs">To.Pcs</label>
                            <input type="text" id="total_pcs" name="total_pcs" value="{{ $data->total_pcs }}">
                        </div>
                        <div class="f-box flex-2">
                            <label for="doriType">Dori Type</label>
                            <input type="text" id="dori_type" name="dori_type" value="{{ $data->dori_type }}">
                        </div>
                        <div class="f-box">
                            <label for="doriCutPerson">Dori Cut person</label>
                            <input type="text" id="dori_cut_person" name="dori_cut_person"
                                value="{{ $data->dori_cut_person }}">
                        </div>
                        <div class="f-box">
                            <label for="doriKg">Dori Kg</label>
                            <input type="text" id="dori_kg" name="dori_kg" value="{{ $data->dori_kg }}">
                        </div>
                    </div>
                </div>

                <div class="prod-grid">
                    <div class="left-table">
                        <div class="grid-header">
                            <div class="w-gathi">GATHI</div>
                            <div class="w-tar">BORDER TAR</div>
                            <div class="w-total-tar">TO TAR</div>
                            <div style="flex:1;">HEIGHT</div>
                            <div style="flex:1;">TAR QTY</div>
                        </div>

                        @for ($i = 0; $i < 5; $i++)
                            @php $item = $data->items->get($i); @endphp
                            <div class="grid-row">
                                <div class="cell w-gathi"><input type="text" value="Gathi {{ $i + 1 }}"
                                        readonly></div>
                                <div class="cell w-tar">
                                    <input type="text" name="gathi_items[{{ $i }}][border_tar]"
                                        value="{{ $item->border_tar ?? '' }}">
                                </div>
                                <div class="cell w-total-tar">
                                    <input type="text" name="gathi_items[{{ $i }}][to_tar]"
                                        value="{{ $item->to_tar ?? '' }}">
                                </div>
                                <div class="cell w-math">
                                    <div class="math-box">
                                        <div class="math-line"><input type="text"
                                                name="gathi_items[{{ $i }}][height_a]"
                                                value="{{ $item->height_a ?? '' }}"></div>
                                        <div class="math-line"><input type="text"
                                                name="gathi_items[{{ $i }}][height_b]"
                                                value="{{ $item->height_b ?? '' }}"></div>
                                    </div>
                                </div>
                                <div class="cell w-math">
                                    <div class="math-box">
                                        <div class="math-line"><input type="text"
                                                name="gathi_items[{{ $i }}][tar_qty_a]"
                                                value="{{ $item->tar_qty_a ?? '' }}"></div>
                                        <div class="math-line"><input type="text"
                                                name="gathi_items[{{ $i }}][tar_qty_b]"
                                                value="{{ $item->tar_qty_b ?? '' }}"></div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        <div class="grid-row" style="background: #f8fafc;">
                            <div style="flex: 4.2; text-align: right; padding: 10px; font-weight: 800;">TOTAL</div>
                            <div class="cell" style="flex: 1;"><input type="text" id="grand_total"
                                    name="grand_total" value="{{ $data->grand_total }}"></div>
                        </div>
                    </div>

                    <div class="right-team">
                        <div class="team-box"><label>JALA BHARAI TEAM</label><input type="text"
                                name="jala_bharai_team" value="{{ $data->jala_bharai_team }}"></div>
                        <div class="team-box"><label>G/B BUTTON TEAM</label><input type="text" name="g_button_team"
                                value="{{ $data->g_button_team }}"></div>
                        <div class="team-box"><label>GATHI PERSON | NO OF GAT</label><input type="text"
                                name="gathi_person" value="{{ $data->gathi_person }}"></div>
                    </div>
                </div>
            </div>

            <div class="bottom-section">
                <div class="jala-khola">
                    <div class="sub-title">OLD JALA KHOLA Team <input type="text" name="old_jala_khola_team"
                            value="{{ $data->old_jala_khola_team }}"></div>
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
                        <label>Date:</label><input type="date" name="kaccha_pakka_date"
                            value="{{ $data->kaccha_pakka_date ? $data->kaccha_pakka_date->format('Y-m-d') : '' }}">
                    </div>
                </div>

                <div class="guide-board">
                    <div class="inner-row"><label>BUTTON TEXNA</label><input type="text" id="button_texna"
                            name="button_texna" value="{{ $data->button_texna }}"></div>
                    <div class="inner-row"><label>GUIDE BOARD TEXNA</label>
                        <textarea id="guide_board_texna" name="guide_board_texna"
                            style="width: 100%; height: 100%; border: none; outline: none; resize: none; font-weight: 600; font-family: inherit; margin-top: 5px;">{{ $data->guide_board_texna }}</textarea>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; border: 1.5px solid #000;">
                <div style="background: #f1f5f9; padding: 5px;">Remark</div>
                <textarea name="remark" style="width: 100%; min-height: 80px;">{{ $data->remark }}</textarea>
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
                <button type="submit" style="background: #2563eb; color: white; padding: 12px 30px;">UPDATE DATA</button>

            </div>
        </div>
    </form>





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
    </script>
@endsection
