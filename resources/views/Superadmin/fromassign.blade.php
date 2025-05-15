@php
    use App\Models\Position;
    use App\Models\User;
    use Carbon\Carbon;
    use App\Models\Repair;
    use App\Models\Assign;
    use App\Models\Priority;
    use App\Models\Equipment_room;
    $Auth = Auth::user();
    $Position = Position::where('room', $nameroom)->first();
    $Repair = Repair::where('position_id', $Position->id)->get();

    $data = json_decode($Position->admin_room, true);
    $Adminroom1 =
        $data['id1'] != 0 ? 'คนที่ 1: ' . User::where('id', $data['id1'])->first()->name : 'ยังไม่มีผู้ดูแลคนที่ 1';
    $Adminroom2 =
        $data['id2'] != 0 ? 'คนที่ 2: ' . User::where('id', $data['id2'])->first()->name : 'ยังไม่มีผู้ดูแลคนที่ 2';
    $statusroom = $Position->status == '0' ? 'เปิด' : 'ปิด';

@endphp
<x-app-layout>
    {{-- nav รอง --}}
    <x-slot name="header" style="background-color: #ffff">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">


    </x-slot>

    @section('title')
    repairadmin
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalSuperadmin')

        <div id="message"></div>
        <div class="Center pr">
            <h1 class=" Center labelroom fw-semibold" style="z-index: 50;">{{ $nameroom }}</h1>
        </div>
        <div class="py-12 card-1">
            <div class="" style="margin: 3em;">
                <div class="row pr">
                    <?php $R = 0; ?>
                    @if (!(Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2']))
                        @if (!empty($Adminroom1 || $Adminroom2))
                            <?php $R = 1; ?>
                            <h4 class="fw-semibold" style="color: #ffd8008a; font-size: clamp(15px, 2.2vw, 25px);">
                                ผู้ดูแลห้อง</h4>
                            <div id="adminroom"
                                class=" bg-opacity-10 border border-success border-opacity-10 rounded-2d-inline-flex px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2 "
                                style="width: auto; height: 5em; ">
                                <h4 class="fw-semibold font_size" style="color: #1ecf1e8f"> {{ $Adminroom1 }}</h4>
                                <h4 class="fw-semibold font_size" style="color: #1ecf1e8f"> {{ $Adminroom2 }}</h4>
                            </div>
                        @endif
                    @endif




                    <div class="card" style="top: 30px">
                        <div class="card-body">

                            <table id="tbElect" class="table table-Secondary table-hover">
                                <center>
                                    <h1 class="headerTable " style="font-size: clamp(17px, 2.5vw, 30px);">การแจ้งซ่อมทั้งหมด
                                    </h1>
                                </center>
                                <thead class="table-active">
                                    <?php $i = 1; ?>
                                    <tr class="pr">
                                        <th scope="col" class="font_size">
                                            <div style="width: max-content;">หมายเลขครุภัณฑ์</div>
                                        </th>
                                        <th scope="col" class="font_size">
                                            <center>สถานะบุคลากร</center>
                                        </th>
                                        <th scope="col" class="font_size">
                                            <div style="width: max-content;">เวลาในการแก้ไข</div>
                                        </th>
                                        <th scope="col" class="font_size">ปัญหา</th>
                                        <th scope="col" class="font_size text-center"><div style="width: max-content; ">แจ้งปัญหาเมื่อ</div></th>
                                        <th scope="col" class="font_size" style="text-align: center;">สถานะ</th>
                                        <th scope="col" class="font_size">Modify/Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Repair as $item)
                                        <tr class="pr">

                                            <?php  
                                            $User = User::findOrFail($item->user_id);
                                            $Assign = Assign::where('repair_id', $item->id)->first();
                                            $priority_user = Priority::where('id', $item->priority_user)->first();
                                            
                                            ?>
                                            <td class="font_size " style="width: max-content;">{{ $item->number_equipment }}
                                            </td>
                                            <td class="font_size text-center">
                                                {{ $User->usertype == 1 ? 'คณะอาจารย์' : ($User->usertype == 0 ? 'นักศักษา' : 'เจ้าหน้าที่') }}
                                            </td>

                                            <td class="font_size">
                                                <div class="pri_topic"
                                                    style="color:aliceblue; background:{{ $priority_user->color }}; width: max-content;"
                                                    data-toggle="tooltip" data-html="true"
                                                    title="{{ $priority_user->time }}">{{ $priority_user->topic }}</div>
                                            </td>
                                            <td class="font_size" style="white-space: nowrap;" >{{ $item->topic }}</td>

                                            <td class="font_size text-center">
                                                {{ Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                            <td class="font_size" style="text-align: center;">
                                                @if ($item->status == 'pending')
                                                    <?php $status_As = 'Assign'; ?>
                                                    <p class="btn btn-outline-secondary"
                                                        style="cursor: context-menu; width: max-content; ">
                                                        รอดำเนินการ...</p>
                                                @elseif($item->status == 'reported')
                                                    <?php $status_As = 'Report'; ?>
                                                    <p class="btn btn-outline-primary"
                                                        style="cursor: context-menu; width: max-content;">
                                                        กำลังดำเนินการ... </p>
                                                @elseif($item->status == 'closed')
                                                    <?php $status_As = 'Closed'; ?>
                                                    <p class="btn btn-outline-success"
                                                        style="cursor: context-menu; width: max-content; box-shadow: 0px 0px 26px rgba(48, 180, 1, 0.49);">
                                                         ดำเนินการเสร็จสิ้น </p>
                                                @elseif($item->status == 'EDeleted')
                                                    <?php $status_As = 'Assign'; ?>
                                                    <p class="btn btn-outline-warning"
                                                        style="cursor: context-menu; background-color: #a4000024; width: max-content;">
                                                        อุปกรณ์นี้ถูกลบไปแล้ว... </p>
                                                @else
                                                    <?php $status_As = 'Assign'; ?>
                                                    <p class="btn btn-outline-danger"
                                                        style="cursor: context-menu; width: max-content; box-shadow: 0px 0px 26px rgba(180, 1, 1, 0.49);">
                                                        ไม่สามารถดำเนินการได้ </p>
                                                @endif
                                            </td>
                                            <td class="font_size pa size_tabel_icon" style="display: flex; height: 100%; width: -moz-available;  width: -webkit-fill-available; justify-content: center; align-items: center;">
                                            @if ($item->status == 'closed')
                                                
                                                    <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                        data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33)" data-toggle="tooltip"
                                                        data-html="true" title="ผลการแก้ไขปัญหา"> <img
                                                            src="../../../image/icon/complete.png"
                                                            alt="location-team" width="auto" class="modify_icon"></a>
                                                @elseif ($item->status == 'reported')
                                                    <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                        data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33)" data-toggle="tooltip"
                                                        data-html="true" title="รายงานการแก้ไข"> <img
                                                            src="../../../image/icon/Report.png"
                                                            alt="location-team" width="auto" class="modify_icon">
                                                    </a>
                                                @else
                                                    <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                        data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33)" data-toggle="tooltip"
                                                        data-html="true" title="รับเรื่องและเริ่มต้นการแก้ไข"> <img
                                                            src="../../../image/icon/assignment.png"
                                                            alt="location-team" width="auto" class="modify_icon">
                                                    </a>
                                                @endif

                                            <a class="openView button_D" style="background: rgb(13, 57, 170)"
                                                data-bs-target="#openCloesd" data-bs-toggle="modal"
                                                data-id="{{ $item }}" data-user="{{ $User->name }}"
                                                data-pirority="{{ $priority_user }}" data-toggle="tooltip"
                                                data-html="true" title="รายละเอียดการแจ้งซ่อม"> <img
                                                    src="../../../image/icon/details.png" alt="location-team"
                                                    width="auto" class="modify_icon "></a>

                                            <a href="{{ url('delete_Repair', $item->id) }}"
                                                onclick="confirmationR(event)" class="button_D" data-toggle="tooltip"
                                                data-html="true" title="ลบการแจ้งซ่อม">
                                                <img src="../../../image/icon/delete.png" alt="location-team"
                                                    width="auto"></a>
                                            </td>






                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                            <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

                            <script>
                                $('#tbElect').DataTable({
                                    responsive: true,
                                });
                                let table = new DataTable('#tbElect');

                                $("#dt-length-0").css({
                                    "width": "4em"
                                });
                                $("#tbElect_wrapper").css({
                                    "overflow": "auto"
                                });
                                $("#tbElect").css({
                                    "width": "-moz-available"
                                });
                                $('.dataTable tbody tr').css('background-color', '#ffffff');
                                $(function() {
                                    $('[data-toggle="tooltip"]').tooltip()
                                })
                            </script>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    @endsection
</x-app-layout>
