@php
    use App\Models\User;
    use App\Models\Repair;
    use App\Models\Assign;
    use App\Models\Position;
    use App\Models\Priority;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    $Auth = Auth::user();
    $Repairs = Repair::all();
    $Position = Position::all();
    $count = Auth::user()->unreadNotifications->count();
    $i = 0;
    $o = 8;
    $unread = Auth::user()->unreadNotifications->count();
@endphp

<x-app-layout>

    <x-slot name="header">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/teacher.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          
        </h2> --}}
        </div>
    </x-slot>

    @section('title')
        Dashboard
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalTeacher')
        @extends('modal.modalSuperadmin')
        <main class="card-dash grid grid-cols-1 md:grid-cols-2">

            @if (Auth::user()->usertype == 0)
                <a href="#" class="">

                </a>
            @elseif (Auth::user()->usertype == 2)
                <a href="{{route('Allrepair')}}"
                    class="set-gridrow mg-2 scale-100 p-6 bg-cardred from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500" style="align-items: first baseline; overflow: clip;">
                    <div>
                        <div class="h-16 w-16 rounded-full" style="margin: auto;">
                            <img src="/image/icon/paper.png" alt="location-team" width="80ram"
                                style="opacity: 0.5;">
                        </div>
                        
                        <h5 class="mt-6 text-xl font-semibold TextSize" style="color: rgba(221, 221, 221, 0.671); text-align: center;">
                          
                            การแจ้งซ่อมทั้งหมด {{ count($Repairs) }} รายงาน
                        </h5>
                        <br>
                        
                        <h5 class=" text-xl TextSize font-semibold btn-label-Ad btn-allroom"
                            style=" opacity: 0.5 !important;">
                            <img src="../../../image/icon/maintenance.png" alt="location-team" width="30ram"
                            style="opacity: 0.5; margin: auto; ">
                            <?php $count = Repair::where('status', 'pending')->count(); ?>
                            รอการแก้ไข  {{ $count }}
                         
                        </h5>
                        <h5 class=" text-xl TextSize font-semibold btn-label-Ad btn-allroom"
                            style=" opacity: 0.5 !important; color: aqua;">
                            <img src="../../../image/icon/development.png" alt="location-team" width="30ram"
                            style="opacity: 0.5; margin: auto;">
                            <?php $count = Repair::where('status', 'reported')->count(); ?>
                            กำลังดำเนินการ {{ $count }}
                         
                        </h5>
                        <h5 class=" text-xl TextSize font-semibold btn-label-Ad btn-allroom"
                            style=" opacity: 0.5 !important; color: #20ed19;">
                            <img src="../../../image/icon/complete.png" alt="location-team" width="30ram"
                            style="opacity: 0.5; margin: auto;">
                            <?php $count = Repair::where('status', 'closed')->count(); ?>
                            แก้ไขเสร็จสิ้นแล้ว  {{ $count }}
                        </h5>
                        <div></div>
                    </div>
                </a>
            @elseif (Auth::user()->usertype == 1)
                <a data-bs-target="#Allroom" data-bs-toggle="modal" data-P="1" style="overflow:hidden; cursor: pointer;"
                    class="Allroom set-gridrow mg-2 scale-100 p-6 bg-cardred from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <div class="h-16 w-16 rounded-full" style="margin: auto;">
                            <img src="../../../image/icon/paper.png" alt="location-team" width="80ram"
                                style="opacity: 0.5;">
                        </div>
                        <h5 class="mt-6 text-xl font-semibold TextSize"
                            style="font-size: clamp(10px, 1vw, 17px) !important; color: rgba(255, 255, 255, 0.671); ">
                            ห้องที่ท่านดูแลในขณะนี้
                        </h5>
                        <br>
                        @foreach ($Position as $item)
                            <?php $data = json_decode($item->admin_room, true); 
                            if ((Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2'])) {?>
                            <h5 class=" text-xl TextSize font-semibold btn-label-R btn-allroom"
                                style="margin: 10px !important; opacity: 0.{{ $o - 3 }} !important;">
                                {{ $item->room }}
                                <hr>
                            </h5>

                            <?php $i++; $o--;  } if ($i > 3 ) { ?>
                        @break

                        <?php }  ?>
                    @endforeach
                </div>
            </a>
        @endif


        <a href="/dashboard/massage"
            class="center-card mg-2 scale-100 p-6 bg-cardred from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div class=" center-card">

                <img class="h-16 w-16  " src="../../../image/icon/email.png" alt="location-team"
                    width="500ram" style="max-width: 8rem; opacity: 0.5;">

                @if ($count && !(Auth::user()->usertype == '2'))
                    <div class="rounded-full red Center"
                        style="opacity: 0.5; width: 2.5rem;background: #ff000069;height: 2.5rem; position: fixed;top: 5px;right: 5px;color: white; border:1px solid white;">
                        <div class="rounded-full"
                            style="height: 0.8rem; width: 0.8rem; background-color: #f00; position: fixed;top: 6px;right: 4px;">
                        </div>
                        <p class=" Center" style="font-size: clamp(19px, 2.5vw, 19px); margin-top: 1rem;">{{$count}}</p>
                    </div>
                @else
                @endif

                <h5 class="mt-6 text-xl font-semibold TextSize" style="color: rgba(221, 221, 221, 0.671); ">
                    กล่องรับข้อความใหม่</h5>
            </div>
        </a>

        <a href="/floor" style=""
            class="mg-2 scale-100 p-6 bg-cardred from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div>
                <div class="h-16 w-16 rounded-full">
                    <img src="../../../image/iconENService-1.png" alt="location-team" width="500ram"
                        style="max-width: 8rem">
                </div>
                @if (Auth::user()->usertype == 2)
                @if (Auth::user()->unreadNotifications->count() > 0) 
                <div id="massage" class="rounded-full Center" style="height: 1.8rem; width: 9.5rem; background-color: #f00; top: 15px;right: 12px;position: absolute;border: 1px solid white;opacity: 0.7; z-index: 10; color:aliceblue"><p style="font-size: initial;display: ruby-text-container; margin: auto;">{{$unread}} การแจ้งซ่อมใหม่</p></div>
                  @endif
                    <h2 class="mt-6 text-xl font-semibold "
                        style="color: #e0e0e0bd; font-size: 2rem;  ">
                        เริ่มการแก้ไขการแจ้งซ่อม</h2>

                    <h3 class="mt-4  leading-relaxed TextSize" style="color: rgba(221, 221, 221, 0.671);">
                        แก้ไขปัญหาให้แกนักศึกษาคณะอาจารย์ เพื่อให้อุปกรณ์พร้อมใช้งานในการเรียนการสอน
                    </h3>
            </div>
            <img src="../../../image/icon/development.png"
                style="max-width: 5rem; opacity:0.5; max-height: 5rem;"
                class="self-center shrink-0 stroke-red-500 w-20 h-20 mx-6">
        @elseif (Auth::user()->usertype <= 1)
            <h2 class="mt-6 text-xl font-semibold TextSize"
            style="color: #e0e0e0bd; font-size: 2rem !important;  ">
                เริ่มการแจ้งซ่อมอุปกรณ์</h2>

            <h3 class="mt-4  leading-relaxed TextSize" style="color: rgba(221, 221, 221, 0.671);">
                ช่วยกันแจ้งปัญหาอุปกรณ์อิเล็กทรอนิกส์ด้วยกันเพื่อลด ปัญหาอุปกรณ์เสียที่เกิดขึ้นในเวลาเรียน
                แก่คณะของเรา
            </h3>
            </div>
            <img src="../../../image/icon/cross.png" style="max-width: 9rem "
                class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
            @endif



        </a>
        {{-- <div>1</div>
           <div>2</div>
           <div>3</div> --}}
        <div></div>
        <div class=" card-table set-grid rounded-lg card-dash">
            <div class="card"
                style="overflow: auto;margin: 1%;height: 95%;background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));width: 98%;">


                @if (!count($Repair) > 0)
                    <div>
                        <center> <img src="../../../image/folder.png" width="300ram"
                                style="min-width: 20%; max-width: 20%; opacity: 0.5;">
                            <br>

                            <h1 style="color: rgb(132, 3, 3); mt-6 text-xl font-semibold TextSize">ไม่มีการแจ้งซ่อม...
                            </h1>
                            <h5 class="mt-6  TextSize" style="color: rgba(221, 221, 221, 0.671); ">
                                สามารถแจ้งซ่อมได้โดย Click เริ่มการแจ้งซ่อมด้านบน </h5>
                        </center>
                    @else
                        <div style="background: aliceblue; border-radius: .5rem;">

                            <table id="tbElect" class="table table-Secondary table-hover" style="overflow: hidden;">
                                <center>
                                    <h1 class="headerTable " style="font-size: clamp(17px, 2.5vw, 30px);">
                                        การแจ้งซ่อมทั้งหมด
                                    </h1>
                                </center>
                                <thead class="table-active">
                                    <?php $i = 1; ?>
                                    <tr class="pr">
                                        @if (Auth::user()->usertype == 2)
                                            <th scope="col" class="font_size">
                                                <div style="width: max-content;">หมายเลขครุภัณฑ์</div>
                                            </th>
                                            <th scope="col" class="font_size">
                                                <center>สถานะบุคลากร</center>
                                            </th>
                                            <th scope="col" class="font_size text-center">
                                                <div style="width: max-content; ">แจ้งปัญหาเมื่อ</div>
                                            </th>
                                        @else
                                            <th scope="col" class="font_size">
                                                <div style="width: max-content;">ลำดับ</div>
                                            </th>
                                            <th scope="col" class="font_size size_mobile" >
                                                <center style="width: max-content;">เวลาที่จะได้รับการแก้ไขปัญหา</center>
                                            </th>
                                            <th scope="col" class="font_size text-center">
                                                <div style="width: max-content; ">ตอบรับปัญหาเมื่อ</div>
                                            </th>
                                        @endif

                                        <th scope="col" class="font_size">
                                            <div style="width: max-content;">ความต้องการในการแก้ไข</div>
                                        </th>
                                        <th scope="col" class="font_size ">ปัญหา</th>

                                        <th scope="col" class="font_size" style="text-align: center;">สถานะ
                                        </th>
                                        <th scope="col" class="font_size">Modify/Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Repair as $item)
                                        <tr class="pr">

                                            <?php $User = User::findOrFail($item->user_id);
                                            $Assign = Assign::where('repair_id', $item->id)->first();
                                            $priority_user = Priority::where('id', $item->priority_user)->first();
                                            $priority_admin = Priority::where('id', $item->priority_admin)->first();
                                            
                                            ?>
                                            @if (Auth::user()->usertype == 2)
                                                <td class="font_size " style="width: max-content; color: #929292;">
                                                    {{ $item->number_equipment }}
                                                </td>
                                                <td class="font_size text-center" style="color: #929292;">
                                                    {{ $User->usertype == 1 ? 'คณะอาจารย์' : ($User->usertype == 0 ? 'นักศักษา' : 'เจ้าหน้าที่') }}
                                                </td>
                                                <td class="font_size text-center" style="color: #929292;">
                                                    {{ Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                            @else
                                                <td class="font_size " style="text-align: center;">
                                                    {{ $i++ }}
                                                </td>
                                                <td class="font_size text-center  size_mobile" style="color: #929292;">
                                                     @if ($item->status == 'closed')
                                                     {{'ได้รับการแก้ไขแล้ว'}}
                                                    @elseif (empty($priority_admin)) 
                                                    {{ 'ไม่มีการตอบรับ'}}
                                                    @else   
                                                    {{ $priority_admin->time;}}
                                                    @endif
                                                     
                                                </td>
                                                <td class="font_size text-center" style="color: #929292;">
                                                    {{ $item->created_at == $item->updated_at ? 'ยังไม่มีการตอบรับ'  : Carbon::parse($item->updated_at)->diffForHumans()  }}

                                                </td>
                                            @endif



                                            <td class="font_size">
                                                <div class="pri_topic"
                                                    style="color:aliceblue; background:{{ $priority_user->color }}; width: max-content;"
                                                    data-toggle="tooltip" data-html="true"
                                                    title="{{ $priority_user->time }}">{{ $priority_user->topic }}
                                                </div>
                                            </td>
                                            <td class="font_size" style="color: #929292;     white-space: nowrap;">{{ $item->topic }}</td>
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
                                            <td class="font_size pa size_tabel_icon"
                                                style="display: flex; height: 100%;width: -moz-available;  width: -webkit-fill-available; justify-content: center; align-items: center;">
                                                @if ($item->status == 'closed')
                                                    <a data-bs-target="#{{ $status_As }}Repair"
                                                        data-bs-toggle="modal" data-id="{{ $item }}"
                                                        data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33); width: 2.3vw; height: 2.3vw;"
                                                        data-toggle="tooltip" data-html="true"
                                                        title="ผลการแก้ไขปัญหา"> <img
                                                            src="../../../image/icon/complete.png"
                                                            alt="location-team" width="auto"
                                                            class="modify_icon"></a>
                                                @elseif ($item->status == 'reported' && Auth::user()->usertype == 2)
                                                    <a data-bs-target="#{{ $status_As }}Repair"
                                                        data-bs-toggle="modal" data-id="{{ $item }}"
                                                        data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33); width: 2.3vw; height: 2.3vw;"
                                                        data-toggle="tooltip" data-html="true"
                                                        title="รายงานการแก้ไข"> <img
                                                            src="../../../image/icon/Report.png"
                                                            alt="location-team" width="auto" class="modify_icon">
                                                    </a>
                                                @elseif (Auth::user()->usertype == 2)
                                                    <a data-bs-target="#{{ $status_As }}Repair"
                                                        data-bs-toggle="modal" data-id="{{ $item }}"
                                                        data-assign="{{ $Assign }}"
                                                        data-user="{{ $Auth }}"
                                                        class="{{ $status_As }}Repair button_D "
                                                        style="background: rgb(12, 192, 33); width: 2.3vw; height: 2.3vw;"
                                                        data-toggle="tooltip" data-html="true"
                                                        title="รับเรื่องและเริ่มต้นการแก้ไข"> <img
                                                            src="../../../image/icon/assignment.png"
                                                            alt="location-team" width="auto" class="modify_icon">
                                                    </a>
                                                @endif

                                                <a class="openView button_D"
                                                    style="background: rgb(13, 57, 170); width: 2.3vw; height: 2.3vw;"
                                                    data-bs-target="#openCloesd" data-bs-toggle="modal"
                                                    data-id="{{ $item }}" data-user="{{ $User->name }}"
                                                    data-pirority="{{ $priority_user }}" data-toggle="tooltip"
                                                    data-html="true" title="รายละเอียดการแจ้งซ่อม"> <img
                                                        src="../../../image/icon/details.png"
                                                        alt="location-team" width="auto" class="modify_icon "></a>

                                                <a href="{{ url('delete_Repair', $item->id) }}"
                                                    onclick="confirmationR(event)" class="button_D"
                                                    data-toggle="tooltip" data-html="true" title="ลบการแจ้งซ่อม"
                                                    style="width: 2.3vw; height: 2.3vw;">
                                                    <img src="../../../image/icon/delete.png"
                                                        alt="location-team" width="auto"></a>
                                            </td>






                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                            <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

                            @if (session('success'))
                            <script>
                               Swal.fire({
                            icon: "success",
                            title: "การแจ้งซ่อมเสร็จสิ้นเรียบร้อยแล้ว",
                            width: 600,
                            color: " rgba(3, 104, 5, 0.77) ",
                            background: "#fff",
                            backdrop: `
                            rgba(71, 2, 2, 0.4)
                                url("/image/icon/Someone.gif")
                                left top
                                no-repeat
                            `
                            });
                            </script>
                            @endif
                          
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
                @endif
            </div>
            <div></div>
    </main>


    {{-- <script type="text/javascript">
            function confirmationR(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                $("body").css({
                    "backdrop-filter": "none",
                })
                Swal.fire({

                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "ลบข้อมูลเรียบร้อยแล้ว.",
                            icon: "success"
                        });
                        setTimeout(function() {
                            location.reload();
                            window.location.href = urlToRedirect;

                        }, 2000);



                    }
                });
            }
        </script> --}}
@endsection
</x-app-layout>
