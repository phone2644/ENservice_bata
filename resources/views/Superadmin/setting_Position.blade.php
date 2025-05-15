@php
    use App\Models\Equipment;
    use App\Models\Position;
    $Position = Position::all();

@endphp
<x-app-layout>
    @section('title')
        Position
    @endsection
    @section('content')
        @extends('modal.modal')
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

            <div class="card_white" style="overflow: scroll; height: auto;     overflow: scroll;">
                
            <div class="pr">
                <button type="button"
                    style="margin: 2em auto 0 3em; font-size: clamp(10px, 2.5vw, 18px); text-decoration: none;"
                    class="btn btn-success TextSize" data-bs-target="#add_Pos" data-bs-toggle="modal"
                  >Add Priority+</button>
                <div class="card" style="margin: 1rem 2.5rem 2.5rem; background: rgb(147, 21, 21);height: 40rem;overflow: auto;">
                    <table id="tbElect_Pri" class="table table-Secondary table-hover">
                        <center>
                            <h1 class="headerTable fw-semibold">Position</h1>
                        </center>
                        
                        @if (isset($Position))
                            
                                <thead class="table-active">
                                    <?php $i = 1; ?>
                                    <tr>
                                        <th scope="col" class="TextSize">
                                            <center>ID</center>
                                        </th>
                                        <th scope="col" class="TextSize">ชั้น</th>
                                        <th scope="col" class="TextSize">ห้อง</th>
                                        <th scope="col" class="TextSize"><div style="width: max-content; display: block;">จำนวนการแจ้งซ่อมในชั้น</div></th>
                                        <th scope="col" class="TextSize">status</th>
                                        <th scope="col" class="TextSize">EDIT/DELETE</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Position as $item)
                                    <tr>
                                      
                                        <td class="TextSize">{{ $item->id }}</td>
                                        <td class="TextSize">{{ $item->floor }}</td>
                                        <td class="TextSize">{{ $item->room }}</td>
                                        <td class="TextSize">@if ($item->repair == 0)
                                            <p>ไม่มีการแจ้งซ่อม</p>
                                        @else
                                        <p>มีการแจ้งซ้อม {{$item->repair}} &nbsp; รายงาน</p>
                                        @endif</td>
                                        <td class="TextSize">@if ($item->status == 0)
                                            <p >ไม่เปิดใช้งานห้อง</p>
                                        @else
                                        <p>เปิดใช้งานห้อง</p>
                                        @endif</td>
                                        <td>
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                              Edit/Delete
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="border: 2px solid #abc1c1;">
                                              <li style="background: none;"><button class=" TextSize dropdownE edit_Pos" type="button" data-bs-target="#edit_Pos" data-bs-toggle="modal" data-position="{{ $item }}" >Edit</button></li>
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
                            text: "คุณแน่ใจแล้วใช่หรือไม่ หากลบ ข้อมูลนี้ถูกลบทั้งหมด!!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                axios.delete($url + '/setting_Delete/' + e.target.dataset.id).then((response) => {
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
