<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <link rel="icon" href="../../image/icon/npu.png" sizes="32x32">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D&family=Kanit:wght@300;700&display=swap" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
    <!-- Styles -->

    {{-- <script>
        var $url = {!! json_encode(url('/')) !!};
    </script> --}}

    @livewireStyles
    <style>
        .font_sizeform {
            font-size: clamp(10px, 2.2vw, 15px);
        }

        .swal2-container button.swal2-confirm,
            .swal2-container button.swal2-cancel {
            -webkit-appearance: none !important; /* Override -webkit-appearance */
            background-color: var(--swal2-confirm-button-background-color) !important; /* กำหนดสีพื้นหลัง */
            
            }

    .swal2-container button.swal2-cancel {
    background-color: var(--swal2-cancel-button-background-color) !important; /* กำหนดสีพื้นหลัง */
    
    }
    </style>
</head>

<body class="font-sans antialiased">
    <div id="preloader"></div>
    <x-banner />
    <div class="nav-2" style="position: sticky; top: 0; z-index: 51;">
        <?php
        use Illuminate\Support\Facades\Auth;
        $usertype = Auth::user()->usertype;
        ?>
        @if ($usertype == 2)
            @livewire('superadmin')
        @elseif($usertype == 1)
            @livewire('nav-teacher-menu')
        @else
            @livewire('navigation-menu')
        @endif



        <!-- Page Heading -->
        @if (isset($header))
            <header class="">

                {{ $header }}

            </header>
        @endif

        <!-- Page Content -->
        <main class="py-4">
            {{ $slot }}
            @yield('content')
        </main>
    </div>


    @stack('modals')

    @livewireScripts
</body>
@php
    use App\Models\Problem;
    use App\Models\Equipment;
    use App\Models\Position;
    use App\Models\User;
    use App\Models\Priority;
    use App\Models\Equipment_room;
    $Problem = Problem::all();
    $Users = User::all();
    $Position = Position::all();
    $Priority = Priority::all();
    $Equipment = Equipment::where('id', '>', 1)->get();
    $Equipment_room = Equipment_room::all();
    $data = $Problem->toArray();
    $Users = $Users->toArray();
    $Equipment = $Equipment->toArray();
    $Equipment_room = $Equipment_room->toArray();
    $Position = $Position->toArray();
    $Priority = $Priority->toArray();
@endphp


@if (session('DeleteRepair'))
<script>
                      
                Swal.fire({
                    title: "Deleted!",
                    text: "ลบข้อมูลเรียบร้อยแล้ว.",
                    icon: "success"
                });
</script>
@endif
<script>
    var $url = {!! json_encode(url('/')) !!};
    var Problems = {!! json_encode($data) !!};
    var Priority = {!! json_encode($Priority) !!};
    var Equipment = {!! json_encode($Equipment) !!};
    var Users = {!! json_encode($Users) !!};



    $('.settingProblem').click(function() {
        //ดึงข้อมูลทั้งหมดมาจาก content
        var Idtable = $(this).data('id');
        var Equipment = Idtable.name;
        $("body").css({
            "backdrop-filter": "none"
        });
        $.ajax({
            url: '/ajaxfile/ajaxfile.blade.php',
            type: 'post',
            data: {
                data: Problems,
                Equipment: Equipment,
                Idtable: Idtable.id,
                url: $url            },
            success: function(response) {
                console.log(response)
                $('.modal-bodyproblem').html(response);
                $('#openaddproblem').modal('show');
            }
        }); 
    });

    $('.Deletebutton').click(function() {
        var Equipment_room = {!! json_encode($Equipment_room) !!};
        var Position_id = $(this).data('id');

        $("body").css({
            "backdrop-filter": "none"
        });
        //  $('#test').val('Idtable'); 
        $.ajax({
            url: '/ajaxfile/Deletebutton.php',
            type: 'post',
            data: {
                Equipment_room: Equipment_room,
                Position_id: Position_id.id,
                Position_room: Position_id.room,
                Equipment: Equipment,
                $url: $url,
            },
            success: function(response) {
                console.log(response)
                $('.modal-Deletebutton').html(response);
                $('#Deletebutton').modal('show');
            }
        });
    });


    $('.openView,OpenView').click(function() {
        
        var Position = {!! json_encode($Position) !!};

        var Repair = $(this).data('id');
        var User = $(this).data('user');
        var pirority = $(this).data('pirority');
        for (let i = 0; i < Equipment.length; i++) {
            if (Equipment[i].id === Repair.equipment_id) {
                var EquipmentName = (Equipment[i].name);
            }
        }
        for (let i = 0; i < Problems.length; i++) {
            if (Problems[i].id === Repair.problem_id) {
                var ProblemsName = (Problems[i].topic);
            }
        }
        for (let i = 0; i < Position.length; i++) {
            if (Position[i].id === Repair.position_id) {
                var Position = (Position[i]);
            }
        }
        $('#topicView').html(Repair.topic);
        $('#descriptionView').html(Repair.description);
        $('#timeView').html(pirority.time);
        $('#UserView').html(User);
        // $('#positionView').html(Repair.position_id);
        $('#positionView').html('ชั้นที่ ' + Position.floor + '&emsp;ห้อง ' + Position.room);
        $('#equipmentView').html(EquipmentName);
        $('#problemView').html(ProblemsName);
        $('#queryView').html('Phone: '+ Repair.phone + '&nbsp;&nbsp;&nbsp;&nbsp;ID-Line: ' + Repair.line + '&nbsp;&nbsp;&nbsp;&nbsp;Facebook: ' + Repair.contact_facebook);
        var date = moment(Repair.created_at).format('  DD/MM/YYYY เวลา HH:mm:ss');
        $('#time_repair').html("แจ้งซ่อมเมื่อ" + date);
        if (Repair.dropzone_file) {
            $('#textView').html('');
         
            $('#imageView_Close').attr('src', '../../../' + Repair.dropzone_file);
            $(" .imgV_Close").css({
                "width": "100%",
                "opacity": "1",
                "object-fit": "contain",
                "height": "100%",
                "position": "absolute",
                "top": "0",
                "left": "0",
            });
            $("center").css({
                "overflow": "clip"
            });

        } else {
            $("center").css({
                "overflow": ""
            });
            $(".imgV_Close ").css({
                "width": "18rem",
                "opacity": "0.5",
                "object-fit": "",
                "height": "",
                "position": "",
                "top": "",
                "left": "",
            });
            $('#imageView_Close').attr('src', '../../../image/folder.png');
            $('#textView').html('ไม่ได้บันทึกภาพ');
        }
        $("body").css({
            "backdrop-filter": "none"
        });

    });



    $('.buttomClosed').click(function() {
        var Priority = {!! json_encode($Priority) !!};
        var Equipment = {!! json_encode($Equipment) !!};
        var equipment = $(this).data('equipment');
        var position = $(this).data('position');
        var auth = $(this).data('auth');
        var equipment_room = $(this).data('equipment_room');
          for (let i = 0; i < Equipment.length; i++) {
            if (Equipment[i].id === equipment) {
                var Equipment = (Equipment[i]);
            }
        }

        for (let i = 0; i < Priority.length; i++) {

            if (Priority[i].usertype === auth || Priority[i].usertype == 0) {
                var priority = (Priority[i]);
                $('#priority_id').append(
                    `<option id="option_pri" class=" font_sizeform" value="${priority.id}"><div> ${priority.time} </div></option>`
                );
            }
        }

        $('#equipment').html(Equipment.name);
        $('#equipment_ID').val(equipment);
        $('#position').html('ชั้นที่ ' + position.floor + '&emsp;ห้อง ' + position.room);
        $('#position_id').val(position.id);
        $('#number_equipment').html(equipment_room.number_equipment);
        $('#number_equipment_id').val(equipment_room.number_equipment);
        $("body").css({
            "backdrop-filter": "none"
        });

        $('#select_P').html('');
        var Problems = {!! json_encode($data) !!};
        $('#select_P').append(
            `<option id="option_S" class="hiddenCus font_sizeform" value=""><div>-- โปรดเลือกชนิดปัญหาอิเล็กทรอนิกส์ --</div></option>`
        );

        Problems.forEach(problem => {
            if (problem.equipment_id == equipment) {
                $('#select_P').append(
                    `<option id="dd" value="${problem.id}" onclick="description_P(JSON.stringify({ id: ${problem.id}, descrip: '${problem.problem}'}))">${problem.topic}</option>`

                ).click(function() {
                    $('#alertValueNull').addClass('hiddenCus');
                });

                // $('#dd').click(function() {
                //     const val = $('#dd').val();
                //     console.log(val); // แสดงค่า val ใน console
                // });
                $('#topic').click(function() {
                    $('#ValueNulltopic').addClass('hiddenCus');
                });
                $('#description').click(function() {
                    $('#ValueNulldescrip').addClass('hiddenCus');
                });
                
            } else {

            }

            $('#option_S').addClass('hiddenCus');

        });
    });





    $('.buttomaddEquip').click(function() {
        var Position = $(this).data('position');
        // alert(Position);
        $('#option_S').addClass('hiddenCus');
        $('#room_id').val(Position);
        $("body").css({
            "backdrop-filter": "none"
        });
    });

    // $('.adminroomButton').click(function() {
    //     var user_id = $(this).data('id');
    //     var Position = $(this).data('position');
    //     var Adminroom1 = $(this).data('admin1');
    //     var Adminroom2 = $(this).data('admin2');

    //     alert(Adminroom2);

    //     $('#Adminroom1').html(Adminroom1);
    //     $('#Adminroom2').html(Adminroom2);
    //     $('#user_id').val(user_id);
    //     $('#adminroom_id').val(Position.room);
    // });


    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
        loader.style.display = "none";
    })

    $('#btn-finish-form').click(function(response) {
        // // these image appends are getting dropzones instances
        // formData.append('image', $('#dropzone_file')[0]);
        // $("#showform").empty();
        //if($('#myform'.valid())
        // alert(55555);
        $.ajax({
            url: "{{ route('submit_data') }}",
            type: "POST",
            enctype: 'multipart/form-data',
            data: {
                topic: $('#topic').val(),
                equipment_id: $('#equipment_ID').val(),
                position_id: $('#position_id').val(),
                problem_id: $('#problem_id').val(),
                description: $('#description').val(),
                email: $('#email').val(),
                name: $('#name').val(),
                phone: $('#phone').val(),
                user_id: $('#user_id').val(),
                line: $('#line').val(),
                dropzone_file: $('#dropzone_file').files[0],
                contact_facebook: $('#contact_facebook').val(),
                "_token": "{{ csrf_token() }}",

            },
            cache: false,
            success: function(response) {
                console.log(response)
                if (response == true) {

                    $.toast({
                        heading: 'Success',
                        text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
                        showHideTransition: 'slide',
                        icon: 'success'
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 3000);

                } else {

                    alert('Failed')
                    $.toast({
                        heading: 'Error',
                        text: 'Report any <a href="https://github.com/kamranahmedse/jquery-toast-plugin/issues">issues</a>',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                }

            }
        });

    });
 

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
                setTimeout(function() {
                    location.reload();
                    window.location.href = urlToRedirect;
                });
            }
        });
    }
</script>

</html>
