@php
    use App\Models\Equipment;
    use App\Models\Problem;
    $Equipment = Equipment::where('id', '>', 1)->get();

@endphp
<x-app-layout>
    @section('title')
        จัดการอุปกรณ์อิเล็กทรอนิกส์
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalTeacher')
        <x-slot name="header" style="background-color: #ffff">
            <link rel="stylesheet" href="{{ asset('css/background.css') }}">
            <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
            <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
            <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
            <div class="">

            </div>
        </x-slot>
        <div class="card-1">

            <div class="card_white" style="overflow: auto;" >
                <button type="button" style="position: relative; margin: 2rem auto -2rem 3rem;" class="btn btn-success"
                    data-bs-target="#openaddelectrolnic" data-bs-toggle="modal" onclick="Nof_modal()">Add electrolnic
                    +</button>
                <div class="card" style="margin: 2.5rem; overflow:auto; background: rgb(147, 21, 21);">
                   
                        <table id="tbElect" class="table table-Secondary table-hover">
                            <center>
                                <h1 class="headerTable">อุปกรณ์อิเล็กทรอนิกส์ ทั้งหมด</h1>
                            </center>
                            <thead class="table-active">
                                <?php $i = 1; ?>
                                <tr>
                                    <th scope="col" class="TextSize">
                                        <center>ลำดับ</center>
                                    </th>
                                    <th scope="col" class="TextSize">name</th>
                                    <th scope="col" class="TextSize">Button</th>
                                    <th scope="col" class="TextSize">รายละเอียด</th>
                                    <th scope="col" class="TextSize text-center">ปัญหา</th>
                                    <th scope="col" class="TextSize">Edit</th>
                                    <th scope="col" class="TextSize">Delete</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($Equipment as $item)
                                    <?php
                                    // $Problem = Problem::findOrFail($item->problem->id);
                                    ?>

                                    <tr>

                                        <th class="TextSize">
                                            <center>{{ $i++ }}</center>
                                        </th>
                                        <td class="TextSize">{{ $item->name }}</td>
                                        <td class="TextSize">{{ $item->label_button }}</td>
                                        <td class="TextSize" style="white-space: nowrap;">{{ $item->description }}</td>
                                        {{-- <td class="TextSize" >{{ $Problem->topic }}</td> --}}
                                        <td class="TextSize " style="text-align: center; white-space: nowrap;"><button
                                                type="button" class=" btn btn-primary settingProblem"
                                                data-bs-target="#openaddproblem" data-bs-toggle="modal"
                                                data-id="{{ $item }}">
                                                <div class="TextSize">Click เพื่อดูข้อมูลทั้งหมด</div>
                                            </button></td>
                                        <td><a class="btn  btn-warning TextSize editEquip" data-bs-target="#editEquip"
                                                data-bs-toggle="modal" data-id="{{ $item }}">Edit</a></td>
                                        <td><a type="button" class="btn  btn-danger TextSize"
                                                href="{{ url('delete_post', $item->id) }}"
                                                onclick="confirmation(event) ">Delete</a></td>
                                        {{-- <td><button type="button" class="btn  btn-danger delete-tbElect"
                                            data-id="{{ $item->id }}">Delete</button></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    
                </div>
            </div>
        </div>


        <script type="text/javascript">
            function confirmation(ev) {
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
                    $("body").css({
                        "backdrop-filter": " blur(5px)",
                    })
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        setTimeout(function() {
                            location.reload();
                            window.location.href = urlToRedirect;
                        }, 3000);


                    }
                });
            }



            document.querySelector('#tbElect').addEventListener('click', (e) => {

                if (e.target.matches('.delete-tbElect')) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "คุณแน่ใจแล้วใช่หรือไม่ หากลบอุปกรณ์นี้ ปัญหาอุปกรณ์และใบการแจ้งซ่อมทั้งหมดที่ใช้อุปกรณ์นี้ จะถูกลบทั้งหมด!!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete($url + '/delete-tbElect/' + e.target.dataset.id).then((response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                setTimeout(function() {
                                    location.reload();
                                }, 3000);

                            });


                        }
                    });

                }


            });
        </script>
    @endsection

</x-app-layout>
