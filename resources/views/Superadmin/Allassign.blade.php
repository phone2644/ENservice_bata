@php
   use App\Models\Position;
    use App\Models\User;
    use Carbon\Carbon;
    use App\Models\Repair;
    use App\Models\Assign;
    use App\Models\Priority;
    use App\Models\Equipment_room;
    $Auth = Auth::user();
    // $Repair = Repair::all();
 
@endphp
<x-app-layout>
    {{-- nav รอง --}}
    <x-slot name="header" style="background-color: #ffff">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
        {{-- <link rel="stylesheet" href="{{ asset('css/background.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
        {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css"> --}}
    </x-slot>

    @section('title')
    Allrepair
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalSuperadmin')
        <div id="message"></div>
        <div class="py-12 card-1">
       
            <div class="card" style="top: 30px; margin:auto; width:95%;">
          
                <div class="card-body">
                    <div class="container" style="overflow: auto; max-width: 100%;">
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

                                        <?php $User = User::findOrFail($item->user_id);
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
                                        <td class="font_size" style="white-space: nowrap;">{{ $item->topic }}</td>

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
                                        @if ($item->status == 'closed' )
                                            
                                                <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                    data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                    data-user="{{ $Auth }}"
                                                    class="{{ $status_As }}Repair button_D "
                                                    style="background: rgb(12, 192, 33)" data-toggle="tooltip"
                                                    data-html="true" title="ผลการแก้ไขปัญหา"> <img
                                                        src="../../../image/icon/complete.png"
                                                        alt="location-team" width="auto" class="modify_icon"></a>
                                            @elseif ($item->status == 'reported' && Auth::user()->usertype == 2)
                                                <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                    data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                    data-user="{{ $Auth }}"
                                                    class="{{ $status_As }}Repair button_D "
                                                    style="background: rgb(12, 192, 33)" data-toggle="tooltip"
                                                    data-html="true" title="รายงานการแก้ไข"> <img
                                                        src="../../../image/icon/Report.png"
                                                        alt="location-team" width="auto" class="modify_icon">
                                                </a>
                                            @elseif (Auth::user()->usertype == 2)
                                            <a data-bs-target="#{{ $status_As }}Repair" data-bs-toggle="modal"
                                                        data-id="{{ $item }}" data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{$status_As}}Repair button_D "
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
