@php
    use App\Models\Equipment;
    use App\Models\Priority;
    $Priority = Priority::all();

@endphp
<x-app-layout>
    @section('title')
        จัดการความสำคัญ
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalSetting')
        @extends('modal.modalSuperadmin')
        <x-slot name="header" style="background-color: #ffff">
            <link rel="stylesheet" href="{{ asset('css/background.css') }}">
            <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
            <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
            <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
            <div class="">

            </div>
        </x-slot>
        <div class="card-1">

            <div class="card_white" style="overflow-x: scroll;">
                
            <div class="pr">
                <button type="button"
                    style="margin: 2em auto 0 3em; font-size: clamp(10px, 2.5vw, 18px); text-decoration: none;"
                    class="btn btn-success TextSize" data-bs-target="#add_Pri" data-bs-toggle="modal"
                  >Add Priority+</button>
                <div class="card" style="margin: 1rem 2.5rem 2.5rem; overflow:auto;background: rgb(147, 21, 21);height: auto;">
                    <table id="tbElect_Pri" class="table table-Secondary table-hover">
                        <center>
                            <h1 class="headerTable fw-semibold">Priority</h1>
                        </center>
                        
                        @if (isset($Priority))
                            
                                <thead class="table-active">
                                    <?php $i = 1; ?>
                                    <tr>
                                        <th scope="col" class="TextSize">
                                            <center>ID</center>
                                        </th>
                                        <th scope="col" class="TextSize">Topic</th>
                                        <th scope="col" class="TextSize">เวลาทำการ</th>
                                        <th scope="col" class="TextSize ">ผู้ที่ใช้ได้</th>
                                        <th scope="col" class="TextSize">สี</th>
                                        <th scope="col" class="TextSize">รายละเอียด</th>
                                        <th scope="col" class="TextSize">EDIT/DELETE</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Priority as $item)
                                    <tr>
                                      
                                        <td class="TextSize">{{ $item->id }}</td>
                                        <td class="TextSize">{{ $item->topic }}</td>
                                        <td class="TextSize">{{ $item->time }}</td>
                                        <td class="TextSize">@if ($item->usertype == 0)
                                            <p>นักศึกษา</p>
                                        @elseif ($item->usertype == 1)
                                        <p>อาจารย์</p>
                                        @else
                                        <p>ทุกคนสามารถใช้ได้</p>
                                        @endif</td>
                                        <td class="TextSize"><div class="rounded-full" style="width: 1.5ex;background:{{ $item->color }}; height: 1.5ex; display: inline-block;margin: 0px 7px;  "></div>{{ $item->color }}</td>
                                        <td class="TextSize">{{ $item->description }}</td>
                                        <td>
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                              Edit/Delete
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="border: 2px solid #abc1c1;">
                                              <li style="background: none;"><button class=" TextSize dropdownE settingpriority" type="button" data-bs-target="#settingpriority" data-bs-toggle="modal" data-priority="{{ $item }}" >Edit</button></li>
                                              <li style="background: none;"><button class="TextSize dropdownD Pri_Delete" data-id="{{ $item->id }}" type="button">Delete</button></li>
                                              
                                            </ul>
                                          </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                           
                        @else
                        <button type="button" class="btn btn-outline-danger  buttomaddEquip" id="addequipment" data-bs-target="#addEquipment" data-bs-toggle="modal" data-position= "" style="margin: auto auto auto auto;width: 90%;"> <img src="../../../image/icon/cross.png" style="max-width: 9rem " class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6"></button>
                        @endif


                    </table>

                </div>
            </div>
            </div>
        </div>


        <script type="text/javascript">
        document.querySelector('#tbElect_Pri').addEventListener('click', (e) => {
           if (e.target.matches('.Pri_Delete')) {
                        Swal.fire({
                            title: 'แน่ใจแล้วหรือไม่?',
                            text: "คุณแน่ใจแล้วใช่หรือไม่ หากลบอุปกรณ์นี้ ความสำคัญจะถูกลบทั้งหมด!!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                axios.delete($url + '/Pri_Delete/' + e.target.dataset.id).then((response) => {
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
