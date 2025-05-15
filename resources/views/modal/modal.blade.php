@php
    use Illuminate\Support\Facades\Auth;
    $auth = Auth::user();
    use App\Models\Equipment;
    use App\Models\Problem;
    $Equipment = Equipment::where('id', '>', 1)->get();
    $Problem = Problem::all();
@endphp
<div class="image_EN_308 body_modal">

    <style>
   .font_sizeform {
  font-size: clamp(10px, 2.2vw, 15px);
}
    </style>


    <div id="donus" class="modal fade">
        <div class="modal-bg" onclick="close_modal()"></div>

        <div class="modal-dialog modal-lg modalcard">
            <div class="modal-content">
                <div class="modal-header pr " id="headerRed">
                    </center>
                    <h5 class="nodal-title center pa font font_sizeH" style="margin: 10px; padding: 2rem;">แจ้งปัญหาใหม่</h5>
                    {{-- <button class="btn-close" onclick="close_modal()"></button> --}}
                    <button class="btn-close" onclick="close_modal()"></button>
                </div>

                <div class="modal-body">
                    <div class="card mb-4 sw-main sw-theme-check">
                        <div id="smartWizardValidation">
                            <ul class="card-header nav nav-tabs step-anchor">

                                <li class="col-md-4 nav-item done"><a class="formtopic nav-link font_size " id="btn-step-1"
                                        style="color:black;  font-size: clamp(10px, 2.2vw, 15px);" href="#step-1">ขั้นตอนที่ 1 <br><small> รายละเอียดปัญหา
                                        </small></a></li>
                                <li class="col-md-4 nav-item done"><a class="nav-link font_size" id="btn-step-2"
                                        style="color:black;  font-size: clamp(10px, 2.2vw, 15px);" href="#step-2">ขั้นตอนที่ 2 <br><small>
                                            ข้อมูลที่เกี่ยวข้อง </small></a></li>
                                <li class="col-md-4 nav-item done"><a class="nav-link font_size" id="btn-step-3"
                                        style="color:black;  font-size: clamp(10px, 2.2vw, 15px);" href="#">ขั้นตอนที่ 3 <br><small> ข้อมูลผู้มาแจ้ง
                                        </small></a></li>
                            </ul>
                            <div class="card-body sw-container tab-content" style="min-height: 0px;">
                                <div id="step-1" class="tab-pane step-content  " style="display: block;">
                                    <!-- novalidate="novalidate" -->

                                    <form action="{{ route('submit_data') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <div action="" id="form-step-1" class="form-step-1 ">
                                            <div class="form-group " style="display: grid;grid-template-columns: 1.5fr 1fr;">
                                                <div class="mb-3 pr" style="width: 100%;">
                                                    <span id="ValueNulltopic" class="hiddenCus topic_alert" style="color:red; right: 5%; position: absolute;">โปรดกรอกข้อมูลหัวข้อปัญหา!!</span>
                                                <label for="topic" class="form-label ">หัวข้อประเด็นปัญหา</label>
                                                <input type="text" class="form-control font_size" id="topic"name="topic">
                                                </div>
                                                <div class="mb-3" style="width: 96.3%; position:relative; left:3.7%;">
                                                <label for="topic" class="form-label " style="font-size: clamp(5px, 2.5vw, 15px) !important;">ระยะเวลาที่ท่านต้องการ</label>
                                                <select id="priority_id" name="priority_id" class="form-control font_sizeform"
                                                style="text-align: center; flex-direction: row;">
                                                
                                            </select>
                                                </div>
                                            </div>
                                            <div class="form-group " style="display: grid;grid-template-columns: 1fr 1fr;">
                                                <div class="mb-3">
                                                    <label for="position_id" class="font_sizeform form-label ">ตำแหน่งอุปกรณ์</label>
                                                    <input type="text" class="hidden" id="position_id"
                                                        name="position_id">
                                                    <div class="font_sizeform form-control " id="position" readonly="readonly"
                                                        style="background-color: rgb(233, 236, 239);">ไม่ได้ระบุปัญหา
                                                    </div>


                                                </div>

                                                <div class="mb-3" style="width: 96.3%; position:relative; left:3.7%">
                                                    <label for="equipment_id"
                                                        class="form-label font_sizeform">ชนิดอุปกรณ์อิเล็กทรอนิกส์</label>
                                                    <div id="equipment" name="equipment_id" class="form-control font_sizeform"  style="background-color: rgb(233, 236, 239);">
                                                    </div>
                                                    <input  type="bigInteger"  id="equipment_ID" name="equipment_ID" class="hidden" ></input>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="problem_id" class="form-label font_sizeform">เลือกกลุ่มปัญหา</label>
                                                <span id="alertValueNull" class="hiddenCus " style="color:red; right: 5%; position: absolute;">โปรดเลือกปัญหา!!</span>
                                                <select id="select_P" name="problem_id" class="form-control font_sizeform"
                                                    style="text-align: center; flex-direction: row;">
                                                    <option value="" class="font_sizeform">
                                                        {{-- <div>-- โปรดเลือกชนิดอุปกรณ์อิเล็กทรอนิกส์ --</div> --}}
                                                    </option>
                                                </select>
                                                <p id="description_P" class="hiddenCus"></p>
                                            </div>
                                                    <div class="mb-3">
                                                        <label for="equipment_id"
                                                        class="form-label font_sizeform">เลขครุภัณฑ์อุปกรณ์</label>
                                                        <div id="number_equipment" name="number_equipment" class="form-control font_sizeform"  style="background-color: rgb(233, 236, 239);">ไม่ได้ระบุเลขครุภัณฑ์</div>
                                                        <input  type="bigInteger"  id="number_equipment_id" name="number_equipment_id" class="hidden" ></input>
                                                    </div>
                                        </div>

                                            <label for="description" class="form-label font_sizeform">รายละเอียดปัญหา</label>
                                            <span id="ValueNulldescrip" class="hiddenCus " style="color:red; right: 5%; position: absolute;">โปรดกรอกข้อมูลรายละเอียด!!</span>
                                            <textarea class="form-control description" id="description" rows="6" name="description" required
                                                placeholder="แจ้งปัญหาที่เกิดขึ้น..."></textarea>


                                        </div>
                                </div>
                                <div id="step-2" class=" tab-pane step-content" style="display: block;">





                                    <div class="form-group row" style="position: relative; justify-content: center;">
                                        <h5 class="text-primary mb-3 font_size font_sizeform">อัพโหลดรูปภาพ <span
                                                class="text-danger font_sizeform">(ไม่จำเป็นต้องระบุก็ได้)</span></h5>
                                        <div class="flex items-center justify-center Center"
                                            style="width: 95%; background-image: linear-gradient(1deg, #DFDFDF 0%, #6E6E6E 100%);  border-radius: 14px;">
                                            <label for="dropzone_file"
                                                style="padding-left: 6rem;padding-right: 6rem; cursor: pointer;">
                                                <div style="display:flex"
                                                    class="flex flex-col items-center justify-center pt-5 pb-6 Center">
                                                    <img src="https://bootstrapious.com/i/snippets/sn-img-upload/image.svg"
                                                        alt="" width="25%" class="mb-4">

                                                </div>
                                                <input id="dropzone_file" type="file" class="hidden"
                                                    name="dropzone_file" />
                                                <div class="Center" style="display:block;">
                                                    <p class="mb-2 text-sm text-gray-500 Center ">
                                                        <span class="font-semibold font_sizeform">Click to upload</span> or drag and
                                                        drop
                                                    </p>
                                                    <p class="text-xs text-gray-500 Center">SVG,
                                                        PNG, JPG or GIF (MAX. 800x400px)</p>
                                                </div>
                                            </label>
                                        </div>

                                    </div>

                                </div>


                                <div id="step-3" class=" tab-pane step-content" style="display: block;">

                                    <h5 class="text-center">ข้อมูลผู้แจ้งประเด็นปัญหา</h5>
                                    <div>

                                        <div class="form-group">
                                            <label for="eamil" class="col-form-label ">E-mail</label>
                                            <input type="email" style="background: #3e3e3e1a;"
                                                class="form-control valid" id="email" name="email"
                                                placeholder="โปรดระบุ" value="{{ old('email', $auth->email) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label ">ชื่อผู้แจ้ง</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                style="background: #3e3e3e1a;" placeholder="โปรดระบุ" required=""
                                                value="{{ old('name', $auth->name) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-form-label ">เบอร์โทรติตด่อ</label>
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                placeholder="โปรดระบุ" required="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="line" class="col-form-label ">Line ID</label>
                                            <input type="text" class="form-control" id="line" name="line"
                                                placeholder="ไม่จำเป็นต้องระบุ">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_facebook" class="col-form-label ">Facebook
                                                Name/Facebook Link</label>
                                            <input type="text" class="form-control" id="contact_facebook"
                                                name="contact_facebook" placeholder="ไม่จำเป็นต้องระบุ">
                                        </div>
                                    </div>


                                </div>

                                <input type="bigInteger" class="hidden" id="user_id" name="user_id"
                                    value="{{ $auth->id }}">
                                <div class="modal-footer">
                                    <div class="btn-toolbar custom-toolbar card-body pt-0 sw-container tab-content"
                                        style="min-height: 0px;">
                                        <button type="button" class="btn btn-primary prev-btn "
                                            id="back_page">ย้อนกลับ</button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-secondary next-btn "
                                            id="Next_page">ถัดไป</button>
                                        <button class="btn btn-info finish-btn hiddenCus" type="submit"
                                            id="btn-finish-form">เสร็จสิ้น</button>
                                    </div>
                                </div>



                                </form>
                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="openaddelectrolnic" tabindex="-1" aria-labelledby="openaddelectrolnicLabel"
    aria-hidden="true" style="">
    <div class="modal-bg" onclick="close_modal()"></div>
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title" id="openaddelectrolnicLabel">เพิ่มอุปกรณ์ อิเล็กทรอนิกส์</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('submit_addelectrolnic') }}" method="POST" id="addelectrolnic">

                <div class="modal-body" style="background-color: #b6b5b5">
                    @csrf

                    <br>

                    <div class="mb-3">
                        <label class="form-label">
                            <h4>ชื่ออุปกรณ์อิเล็กทรอนิกส์</h4>
                        </label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>ป้ายปุ่มอุปกรณ์</h4>
                        </label>
                        <input type="text" class="form-control" name="label_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>รายละเอียด</h4>
                        </label>
                        <textarea class="form-control description" id="description" rows="5" name="description" required
                            placeholder="แจ้งปัญหาที่เกิดขึ้น..."></textarea>
                    </div>
                </div>
                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="openaddproblem" aria-labelledby="openaddproblemLabel" tabindex="-1"
    style="display: none; " aria-hidden="true" onclick="Onf_modal()">
    <div class="modal-dialog  modal-lg ">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title">เพิ่มปัญหาอุปกรณ์</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-bodyproblem"
                style="position: relative; flex: 1 1 auto; padding: var(--bs-modal-padding);"></div>


        </div>
    </div>
</div>




<div class="modal fade" id="openaddproblem2" aria-labelledby="openaddproblemLabel2" tabindex="-1"
    style="display: none;" aria-hidden="true">
    <div class="modal-bg" onclick="close_modal()"></div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title">โปรดระบุปัญหาที่ท่านต้องการเพิ่ม: Add problem</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="close_modal()"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('submit_addproblem') }}" method="POST" id="addproblem">

                <div class="modal-body">
                    @csrf

                    <br>

                    <div class="mb-3">
                        <label class="form-label">
                            <h4>หัวข้อปัญหาใหม่</h4>
                        </label>
                        <input type="text" class="form-control" name="topic" required
                            placeholder="โปรดระบุ...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>รายละเอียดปัญหา</h4>
                        </label>
                        <textarea class="form-control description" id="problem" rows="5" name="problem" required
                            placeholder="รายละเอียดปัญหาของท่าน..."></textarea>
                    </div>
                    <div class="modal-bodyaddproblem">

                    </div>
                </div>
                <div class=" modal-footer ">
                    <button type="button" class="btn btn-primary"data-bs-toggle="modal"
                        data-bs-target="#openaddproblem"><-- Back</button>
                            <button type="submit" class="btn btn-success">Add Problem</button>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="Deletebutton" tabindex="-1" aria-labelledby="DeletebuttonLabel" aria-hidden="true" onclick="Nof_modal()">
  <div class="modal-dialog modal-dialog-centered modal-lg" onclick="Onf_modal()">
      <div class="modal-content modal-Deletebutton">
      </div>
  </div>


  
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script src="{{ asset('js/modal.js') }}" type="text/javascript"></script>


