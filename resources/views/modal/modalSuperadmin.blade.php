<div class="modal fade" id="openCloesd" tabindex="-1" aria-labelledby="openCloesdLabel" aria-hidden="true" onclick="Onf_modal()">

    <div class="modal-dialog  modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
            <div class="modal-header headerform"
                style=" box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57); border-bottom: 4px solid #ffbf00;">
                <h3 class="modal-title" id="openCloesdLabel">รายละเอียดใบแจ้งซ่อม</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>


            <div class="modal-body">
                <div class="form-group " style="display: grid;grid-template-columns: 1.5fr 1fr;">
                    <div class="mb-3 pr" style="width: 100%;">
                    <label for="topic" class="form-label ">หัวข้อประเด็นปัญหา</label>
                    <h6 id="topicView" name="topic" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div class="mb-3" style="width: 98.3%; position:relative; left:1.7%">
                    <label for="topic" class="form-label font_label ">ระยะเวลาที่ต้องการแก้ไข</label>
                    <div id="timeView" name="topic" class="form-control valid TextSize" readonly="readonly"
                    style="background-color: rgb(211, 211, 211);"> <span TextSize id="timeView" name="topic"></span></div>
                    </div>
                </div>


                <div class="mb-3">
                        <label class="form-label TextSize">รายละเอียดปัญหา</label>
                        <textarea class="form-control valid TextSize" id="descriptionView" rows="5" required
                            placeholder="แจ้งปัญหาที่เกิดขึ้น..." style="background-color: rgb(211, 211, 211);">รายงานผลการแก้ไขปัญหา</textarea>
                </div>
                <div class="mb-3">

                    <div style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">ผู้แจ้งซ่อม</label>
                        <label class="form-label TextSize">ตำแหน่งพิกัดอุปกรณ์</label>
                        <h6 id="UserView" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>
                        <h6 id="positionView" class="form-control valid" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div style="display: grid;grid: auto /1fr 1fr;">
                        <label class="form-label TextSize">อุปกรณ์อิเล็กทรอนิกส์</label>
                        <label class="form-label TextSize">ปัญหาอุปกรณ์</label>
                        <h6 id="equipmentView" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>

                        <h6 id="problemView" class="form-control valid" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="topic" class="form-label TextSize" style="color: red">ภาพปัญหา</label>
                            <div class="card Center" style="height: 20rem; ">
                                
                                                                                        {{-- รายละเอียดข้อมูล --}}
                                <center style="width: 80%;q1: 95%; overflow: clip;"> <img id="imageView_Close" class="imgV_Close" src="#"  > </center>
                                    <h3 id="textView" class="  TextSize"
                                        style="color: rgba(184, 21, 21, 0.537); text-align: center;">
                                    </h3>
                                
                            </div>
                        </div>
                    </div>
                    <label class="form-label TextSize">ช่องทางติดต่อสอบถามผู้แจ้ง</label>
                        <h6 id="queryView" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>
                </div>
            </div>

            <div class=" modal-footer ">
                <div id="time_repair" style="background: #cacaca3b; width:12vw;position: absolute;left: 21px;border-radius: 15px;text-align: center; width: max-content;padding: 0 10px 0 10px;" > 455</div>
                <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="AssignRepair" tabindex="-1" aria-labelledby="editEquipLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center" id="addEquipmentLabel" style="margin:auto auto auto auto">Assign
                    การร้องขอนี้</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form action="{{ route('Assign') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">

                    <div class="mb-3">
                        <label class="form-label TextSize">หัวข้อประเด็นปัญหา</label>
                        <h6 id="topic_Assi" name="topic" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div style="display: grid;grid: auto /1fr 1fr;">
                        <label class="form-label TextSize">อุปกรณ์อิเล็กทรอนิกส์</label>
                        <label class="form-label TextSize">ปัญหาอุปกรณ์</label>
                        <h6 id="equip_Assi" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>

                        <h6 id="problem_Assi" class="form-control valid" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div style="display: grid;grid: auto/auto 36px auto;position: relative;align-items: center;">
                        <div class="mb-3">
                            <label class="form-label font_size" style="width: 100%;">
                                ผู้แจ้งซ่อม
                                <h6 id="user_Assi" class="form-control valid" readonly="readonly"
                                    style="background-color: rgb(205, 232, 185);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>

                            </label>
                        </div>
                        <img src="../../../image/icon/data.png" width="35em" alt=""
                            style="margin-left: -8px;">
                        <div class="mb-3">
                            <label class="form-label font_size" style="width: 100%;">
                                ผู้รับซ่อม
                                <h6 id="admin_Assi" class="form-control valid" readonly="readonly"
                                    style="background-color: rgb(232, 230, 185);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 Center">
                        <label class="form-label" style="width: 50%; text-align:center;">
                            <label class="form-label font_size">ระยะเวลาที่ผู้แจ้งต้องการในการแก้ไขปัญหา</label>
                            <h6 id="timeuser_Assi" class="form-control valid" readonly="readonly"
                                style="width: 95%; color: #0eb100; background-color: rgb(211, 211, 211);">
                                รายงานผลการแก้ไขปัญหา</h6>
                        </label>
                    </div>


                    <hr>
                    <br>
                    <div class="mb-3">
                        <label for="" class="form-label font_size" style="display: block;">
                            <h4 style="text-align:center;">ระยะเวลาที่ท่านสามารถแก้ไขปัญหานี้ได้ <p style="color:#8b0000b0; display: contents;">(นับจากวันนี้)</p></h4>
                        </label>
                        <select id="timeadmin_Assi" name="timeadmin_Assi" class="form-select "
                            aria-label="Default select example"
                            style="text-align: center; border: 0.2em solid #8b0000b0; ">
                            <?php use App\Models\Priority;
                            $Priority = Priority::all(); ?>

                            @foreach ($Priority as $item)
                                <option value="{{ $item->id }}">{{ $item->time }}  &ensp;  &ensp;
                                    ({{ $item->description }})
                                </option>
                            @endforeach

                        </select>

                    </div>
                </div>

                <input type="text" class="form-control hiddenCus" id="admin_id" name="admin_id">
                <input type="text" class="form-control hiddenCus" id="repair_id" name="repair_id">
                <input type="text" class="form-control hiddenCus" id="order_rejected" name="order_rejected">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button id="rejected" type="button" class="btn btn-danger">ปฏิเสธคำขอนี้</button>
                    <button id="finish" type="submit" class="btn btn-dark"> ตอบรับคำขอ</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


<div class="modal fade" id="ReportRepair" tabindex="-1" aria-labelledby="ReportRepairLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center" id="addEquipmentLabel" style="margin:auto auto auto auto">Report
                    รายงานการร้องขอ</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form action="{{ route('Reported') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">
                    <div class="mb-3">
                        <label class="form-label TextSize">เลขหนุพันธ์อุปกรณ์</label>
                        <h6 id="equip_id" name="equip_id" class="form-control valid TextSize" readonly="readonly"
                        style="background-color: rgb(211, 211, 211);"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div style="display: grid;grid: auto /1fr 1fr;">
                        <label class="form-label TextSize">อุปกรณ์อิเล็กทรอนิกส์</label>
                        <label class="form-label TextSize">ปัญหาอุปกรณ์</label>
                        <h6 id="equip_Re" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>

                        <h6 id="problem_Re" class="form-control valid" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">รูปภาพการแก้ไขปัญหา</label>
                        <input id="dropzone_file" type="file" class="form-control" name="dropzone_file" />
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="description" class="form-label">รายละเอียดการแก้ปัญหา</label>
                        <textarea class="form-control " id="report_details" rows="5" name="report_details" required
                            placeholder="แจ้งปัญหาที่เกิดขึ้น..." value="ทำการแก้ไขเสร็จสิ้นแล้ว..">ทำการแก้ไขเสร็จสิ้นแล้ว..</textarea>
                    </div>


                </div>

                <input type="text" class="form-control hiddenCus" id="admin_Re" name="admin_id">
                <input type="text" class="form-control hiddenCus" id="repair_ID" name="repair_id">
                <input type="text" class="form-control hiddenCus" id="order_rejected" name="order_rejected">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button id="rejected" type="button" class="btn btn-danger">ปฏิเสธคำขอนี้</button>
                    <button id="finish" type="submit" class="btn btn-success"> Report</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="ClosedRepair" tabindex="-1" aria-labelledby="ClosedRepairLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center fw-semibold" id="addEquipmentLabel" style="margin:auto auto auto auto">
                    ผลการแก้ไขอุปกรณ์</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div>
                        <label class="form-label TextSize">หัวข้อประเด็นปัญหา</label>
                        <h6 id="topicClosed" name="topic" class="form-control valid TextSize" readonly="readonly"
                            style="background-color: rgb(211, 211, 211);"> รายงานผลการแก้ไขปัญหา</h6>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div>
                                <label for="topic" class="form-label TextSize" style="color: red">ภาพปัญหา</label>
                                <div class="card Center" style="height: 20rem; overflow: auto;">

                                    <center style="width: 80%;q1: 95%; "> <img id="imageClosed" class="imgV" > </center>
                                    <h3 id="textClosed" class="  TextSize"
                                        style="color: rgba(184, 21, 21, 0.537); text-align: center;">
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div style="display: grid;grid: auto /1fr 1fr; ">
                            <label class="form-label TextSize">ผู้แก้ไขการแจ้งซ่อมนี้</label>
                            <label class="form-label TextSize">แก้ไขเสร็จสิ้นเมื่อ</label>
                            <h6 id="userClosed" class="form-control valid TextSize" readonly="readonly"
                                style="background-color: rgb(211, 211, 211);width: 95%; "> รายงานผลการแก้ไขปัญหา</h6>
                            <h6 id="timeClosed" class="form-control valid" readonly="readonly"
                                style="background-color: rgb(211, 211, 211);width: 95%;"> รายงานผลการแก้ไขปัญหา</h6>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label" style="display: block;">
                            <h5 style="text-align:center;">รายละเอียดการแก้ไข</h5>
                        </label>
                        <textarea id="descript_Closed" class="form-control description" style="color: #1a9b3a; background: #00800026;"
                            rows="5" disabled></textarea>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!--------------------------------------------------- Modal Setting ----------------------------------------------------->

<!-- Modal -->
<div class="modal fade" id="selectsetting" tabindex="-1" aria-labelledby="selectsettingLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="background: none;border: none;">
            {{-- <div class="modal-header" style="background: brown; border-bottom: 2px solid yellow; color:aliceblue;">
                <h4 class="modal-title" style="text-align: center;margin: auto auto auto auto;" id="selectsettingLabel">
                    Setting</h4>
            </div> --}}
            <div class="modal-body">
                <a type="button" href="{{ route('Setting_priority') }}" class="btn btn-primary"
                    class="btn btn-outline-primary"
                    style="width: 100%;font-weight: bold;font-size: large;">PRIORITY</a>
            </div>
            <div class="modal-body">
                <a type="button" href="{{ route('Setting_position') }}" class="btn btn-warning"
                    class="btn btn-warning"
                    style="width: 100%;font-weight: bold;font-size: large; color:#5c6166;">Position</a>
            </div>


        </div>
    </div>
</div>


<div class="modal fade" id="add_Pri" tabindex="-1" aria-labelledby="add_PriLabel" aria-hidden="true">

    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center" id="addEquipmentLabel" style="margin:auto auto auto auto">เพิ่ม
                    Priority</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form id="form" action="{{ route('add_Pri') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">

                    <div class="mb-3">
                        <label class="form-label TextSize">หัวข้อความสำคัญ</label>
                        <input id="topic_Pri_A" type="text" class="form-control" name="topic_Pri">
                    </div>
                    <div class="mb-3" style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">ระดับของผู้ใช้ความสำคัญนี้</label>
                        <label class="form-label TextSize">Color</label>
                        <select id="select_Pri_A" name="select_Pri" class="form-select"
                            aria-label="Default select example"
                            style="height: 2.7em; width: 91%; text-align: center; border: 0.1em solid #a13838b0;">
                            <option value="0">นักศักษา</option>
                            <option value="1">คณะอาจารย์</option>
                            <option value="3">ทุกคนใช้ได้</option>
                        </select>
                        {{-- <input type="color" id="color_Pri_A" type="text" class="form-control" name="color_Pri"> --}}
                        <input type="color" class="form-control form-control-color" id="color_Pri_A"
                            name="color_Pri" value="#1616" title="Choose your color">
                    </div>

                    <div class="mb-3 Center">
                        <label class="form-label" style="width: 50%; text-align:center;">
                            <label class="form-label TextSize">ระยะเวลาในการแก้ไขปัญหา</label>
                            <input id="time_Pri_A" type="text" class="form-control" name="time_Pri">
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label" style="display: block;">
                            <h5 style="text-align:center;">รายละเอียด</h5>
                        </label>
                        <textarea id="descript_Pri_A" class="form-control description" id="description" rows="5" name="description"
                            required placeholder="แจ้งปัญหาที่เกิดขึ้น..."></textarea>

                    </div>
                </div>

                <input id="id_table_A" type="text" class="form-control hiddenCus" name="id_table">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-success"> Create</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


<div class="modal fade" id="settingpriority" tabindex="-1" aria-labelledby="settingpriorityLabel"
    aria-hidden="true">

    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center" id="addEquipmentLabel" style="margin:auto auto auto auto">แก้ไข
                    Priority</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form id="form" action="{{ route('edit_Pri') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">

                    <div class="mb-3">
                        <label class="form-label TextSize">หัวข้อความสำคัญ</label>
                        <input id="topic_Pri" type="text" class="form-control" name="topic_Pri">
                    </div>
                    <div class="mb-3" style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">ระดับผู้ใช้ความสำคัญนี้</label>
                        <label class="form-label TextSize">Color <p style="font-size: smaller;">โค้ดสี ตัวอย่างเช่น(
                                <spen style="color: red;">red</spen> , <spen style="color:Blue;">Blue</spen>,<spen
                                    style="color:#1a9b3a;">#1a9b3a</spen>, <spen style="color:Orange;">Orange</spen>,
                                <spen style="color:Purple;"> Purple</spen>)
                            </p></label>
                        <select id="select_Pri" name="select_Pri" class="form-select"
                            aria-label="Default select example"
                            style="height: 2.7em; width: 91%; text-align: center; border: 0.1em solid #a13838b0;">
                            <option value="0">นักศักษา</option>
                            <option value="1">คณะอาจารย์</option>
                            <option value="3">ทุกคนใช้ได้</option>
                        </select>
                        <input type="color" class="form-control form-control-color" id="color_Pri"
                            name="color_Pri" value="" title="Choose your color">
                    </div>

                    <div class="mb-3 Center">
                        <label class="form-label" style="width: 50%; text-align:center;">
                            <label class="form-label TextSize">ระยะเวลาในการแก้ไขปัญหา</label>
                            <input id="time_Pri" type="text" class="form-control" name="time_Pri">
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label" style="display: block;">
                            <h5 style="text-align:center;">รายละเอียด</h5>
                        </label>
                        <textarea id="descript_Pri" class="form-control description" id="description" rows="3" name="description"
                            required placeholder="แจ้งปัญหาที่เกิดขึ้น..."></textarea>

                    </div>
                </div>

                <input id="id_table" type="text" class="form-control hiddenCus" name="id_table">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-warning"> Edit</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="add_Pos" tabindex="-1" aria-labelledby="add_PriLabel" aria-hidden="true">

    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center" id="addEquipmentLabel" style="margin:auto auto auto auto">เพิ่ม
                    Position</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form id="form" action="{{ route('add_Pos') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">

                    <div style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">ชั้น</label>
                        <label class="form-label TextSize">ห้อง</label>
                        <select id="floor_p_E" name="floor_p" class="form-control" style="width: 95%;">
                        <option value="1">ชั้นที่ 1</option>
                        <option value="2">ชั้นที่ 2</option>
                        <option value="3">ชั้นที่ 3</option>
                        <option value="4">ชั้นที่ 4</option>
                        <option value="5">ชั้นที่ 5</option>
                        </select>
                        <input id="room_P_E" name="room_P_E" type="text" class="form-control" style="width: 95%;">
                    </div>
                  
                    <div class="mb-3">
                        <label class="form-label TextSize">สถานะห้อง</label>
                        <input id="status_E" name="status" type="text" class="form-control" name="time_Pri" style="width: 95%;" readonly="readonly" value="1">
                    </div>
   
                </div>

                {{-- <input id="id_table_A" type="text" class="form-control hiddenCus" name="id_table"> --}}

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-success"> Add room</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="edit_Pos" tabindex="-1" aria-labelledby="edit_PosLabel" aria-hidden="true">

    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center"  style="margin:auto auto auto auto">edit
                    Position</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px;"></button>
            </div>
            <form id="form" action="{{ route('edit_Pos') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b53d">

                    <div style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">ชั้น</label>
                        <label class="form-label TextSize">ห้อง</label>
                        <select id="floor_Edit_Pos" name="floor_p" class="form-control" style="width: 95%;">
                        <option value="1">ชั้นที่ 1</option>
                        <option value="2">ชั้นที่ 2</option>
                        <option value="3">ชั้นที่ 3</option>
                        <option value="4">ชั้นที่ 4</option>
                        <option value="5">ชั้นที่ 5</option>
                        </select>
                        <input id="room_Edit_Pos" name="room_Edit_Pos" type="text" class="form-control"  style="width: 95%;">
                    </div>
                  
                    <div style="display: grid;grid: auto /1fr 1fr; ">
                        <label class="form-label TextSize">สถานะห้อง (1เปิด,0ปิด)</label>
                        <label class="form-label TextSize">ลบผู้ดูแลห้องทั้งหมด</label>
                        <input id="status_Edit" name="status" type="text" class="form-control" name="status_Edit" style="width: 95%;">
                        <select name="admin_room" id="admin_room" class="form-control" style="width: 95%;">
                            <option value="0">ไม่ลบ</option>
                            <option value="1">ลบทั้งหมด</option>
                        </select>
                    </div>
   
                </div>

                <input id="id_Pos_edit" type="text" class="form-control hiddenCus" name="id_Pos_edit">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-success"> edit room</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>


<div class="modal fade" id="setting_user" tabindex="-1" aria-labelledby="setting_userLabel" aria-hidden="true" >
    <div class="modal-bg" ></div>
    <div class="modal-dialog  modal-dialog-scrollable modal-lg" id="modal_bg" >
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title Center fw-semibold" style="margin:auto auto auto auto">
                    จัดการผู้ใช้ระบบ </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-left: 0px; margin: inherit;" ></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('submit_setting_user') }}" method="POST">
                    @csrf
                    <div class="mb-3 pr">
                        <label for="topic" class="form-label font_size">ชื่อผู้ใช้</label>
                        <div class="form-control font_size " id="name_user" name="name_user" readonly="readonly"
                            style="background-color: rgb(233, 236, 239);">ไม่ได้ระบุปัญหา</div>
                    </div>
                    <div class="mb-3 pr">
                        <label for="topic" class="form-label font_size">Email</label>
                        <div class="form-control font_size " id="email_user" name="email_user" readonly="readonly"
                            style="background-color: rgb(233, 236, 239);">ไม่ได้ระบุปัญหา</div>
                    </div>
                    <div class="mb-3 pr">
                        <label for="topic" class="form-label font_size">ตำแหน่งสถานะ</label>
                        <select id="select_U" name="status_user" class="form-control font_sizeform"
                            style="text-align: center;">
                            <option class="font_sizeform" value="0">นักศักษา</option>
                            <option class="font_sizeform" value="1">คณะอาจารย์</option>
                            <option class="font_sizeform" value="2">เจ้าหน้าที่</option>
                        </select>
                    </div>
                        <input type="text" id="id_user" name="id_user" class="hiddenCus">
                        <input type="text" id="delete_user" name="delete_user" class="hiddenCus">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                        <button type="button" class="delete_user btn btn-danger">ลบผู้ใช้นี้</button>
                        <button type="submit" id="submit_U" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/modal.js') }}" type="text/javascript"></script>
    <script>
        
        $('.Setting_user').click(function() {
            var User = $(this).data('id');
            // alert(User.usertype);
            
            $('#id_user').val(User.id);
            $('#name_user').html(User.name);
            $('#email_user').html(User.email);
            if (User.usertype == 2) {
                var user = "เจ้าหน้าที่";
            }
            if (User.usertype == 1) {
                var user = "อาจารย์";
            } 
            if (User.usertype == 0){
                var user = "นักศึกษา";
            }
            // $('#modal_bg').click (function (){
            // $('#option_U').css({"display":"none"});
            // });
            $('#option_U').remove();
            $('#select_U').append(
                `<option id="option_U" style="color: darkred;"  value="${User.usertype}" selected >${user} (ค่าเดิม)</option>`
            );
            
            $('.delete_user').click (function (){

                Swal.fire({
                    title: "Are you sure?",
                    text: "คุณแน่ใจหรือไม่ที่จะลบผู้ใช้ท่านนี้!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#delete_user').val("1");
                        Swal.fire({
                            title: "ผู้ใช้ถูกลบแล้ว",
                            icon: "success"
                        });
                        setTimeout(function() {
                            location.reload();
                            $('#submit_U').click();
                        }, 3000);
                    }
                });
            });      
        });


        $('.ClosedRepair').click(function() {
            var repair = $(this).data('id');
            var user = $(this).data('user');
            var assign = $(this).data('assign');
            // alert('' + assign.dropzone_file);
            $('#topicClosed').html(repair.topic);
            $('#userClosed').html(user.name);
            console.log(moment(assign.updated_at).format('DD-MM-YYYY เวลา HH:mm:ss'));
            var date = moment(assign.updated_at).format('DD/MM/YYYY เวลา HH:mm:ss');
            $('#timeClosed').html(date);
            $('#descript_Closed').html(assign.report_details);
            if (assign.dropzone_file) {
                $('#textClosed').html('');
                $(".imgV ").css({
                    "width": "100%",
                    "opacity": "1",
                    "object-fit": "contain",
                    "height": "100%",
                    "position": "absolute",
                    "top": "0",
                    "left": "0",
                });
                $('#imageClosed').attr('src', '../../../' + assign.dropzone_file);
                $("center").css({
                    "overflow": "clip"
                });
                // style="width: 100%; opacity: 1;  object-fit: contain;  height: 100%; position: absolute; top: 0; left: 0;"
            } else {
                $("center").css({
                    "overflow": ""
                });
                $(".imgV ").css({
                    "width": "18rem",
                    "opacity": "0.5"
                });

                $('#imageClosed').attr('src', '../../../image/folder.png');
                $('#textClosed').html('ไม่ได้บันทึกภาพ');
            }


        });

        $('.ReportRepair').click(function() {
            var repair = $(this).data('id');
            var user = $(this).data('user');
            const equipment = Equipment.find(item => item.id === repair.equipment_id);
            const EquipmentName = equipment ? equipment.name : "";
        
            const problem = Problems.find(problem => problem.id === repair.problem_id);
            const ProblemName = problem ? problem.topic : "";
            $('#equip_id').html(repair.id);
            $('#equip_Re').html(EquipmentName);
            $('#problem_Re').html(ProblemName);
            $('#admin_Re').val(user.id);
            $('#repair_Re').val(repair.id);
            $('#repair_ID').val(repair.id);
            $('#rejected,#rejected').click(function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "คุณแน่ใจหรือไม่ที่จะปฏิเสธคำขอนี้!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#order_rejected').val("rejected");
                        Swal.fire({
                            title: "ปฏิเสธคำขอแล้ว",
                            text: "ใบแจ้งซ่อมนี้ถูกปฎิเสธแล้ว",
                            icon: "success"
                        });
                        setTimeout(function() {
                            location.reload();
                            $('#finish').click();
                        }, 3000);
                    }
                });
            });

        });
       
        $('.AssignRepair').click(function() {
            var repair = $(this).data('id');
            var user = $(this).data('user');
            const equipment = Equipment.find(item => item.id === repair.equipment_id);
            const EquipmentName = equipment ? equipment.name : "";

            const priority = Priority.find(priority => priority.id === repair.priority_user);
            const PriorityName = priority ? priority.time : "";

            const problem = Problems.find(problem => problem.id === repair.problem_id);
            const ProblemName = problem ? problem.topic : "";

            for (let i = 0; i < Users.length; i++) {
                if (Users[i].id === repair.user_id) {
                    var UsersName = (Users[i].name);
                }
            }
            
            $('#topic_Assi').html(repair.topic);
            $('#equip_Assi').html(EquipmentName);
            $('#problem_Assi').html(ProblemName);
            $('#user_Assi').html(UsersName);
            $('#admin_Assi').html(user.name);
            $('#timeuser_Assi').html(PriorityName);
            $('#admin_id').val(user.id);
            $('#repair_id').val(repair.id);
          
            $('#rejected,#rejected').click(function() {


                Swal.fire({
                    title: "Are you sure?",
                    text: "คุณแน่ใจหรือไม่ที่จะปฏิเสธคำขอนี้!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#order_rejected').val("rejected");
                        Swal.fire({
                            title: "ปฏิเสธคำขอแล้ว",
                            text: "ใบแจ้งซ่อมนี้ถูกปฎิเสธแล้ว",
                            icon: "success"
                        });
                        setTimeout(function() {
                            location.reload();
                            $('#finish').click();
                        }, 3000);
                    }
                });
            });

            $("body").css({
                "backdrop-filter": "none"
            });
        });



        $('.settingpriority').click(function() {
            $('#option_Pri').remove();
            var priority = $(this).data('priority');
            var botton_id = $(this).data('botton');
            if (priority.usertype == 0) {
                var user = "นักศึกษา";
            } else {
                var user = "อาจารย์";
            }
            $('#topic_Pri').val(priority.topic);
            $('#descript_Pri').val(priority.description);
            $('#color_Pri').val(priority.color);
            $('#time_Pri').val(priority.time);
            $('#id_table').val(priority.id);
            $('#select_Pri').append(
                `<option id="option_Pri" style="color: darkred;"  value="${priority.usertype}" selected ><div>${user} (ค่าเดิม)</div></option>`
            );

        });

        $('.edit_Pos').click(function() {
            var position = $(this).data('position');
            // alert(position.room);   
            $('#room_Edit_Pos').val(position.room);
            $('#id_Pos_edit').val(position.id);
            $('#status_Edit').val(position.status);
            $('#option_Pos').remove();
            $('#floor_Edit_Pos').append(
                `<option id="option_Pos"  style="color: darkred;"  value="${position.floor}" selected ><div>ชั้นที่ ${position.floor} (ค่าเดิม)</div></option>`
            );
        
            // $('#room_P').html(position.room);
            
        });
    </script>
