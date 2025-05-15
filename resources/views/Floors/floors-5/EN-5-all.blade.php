@php
    use App\Models\Position;
    use App\Models\User;
    use App\Models\Equipment_room;
    $Position = Position::where('room', $nameroom)->first();
        $Equipment_roomF = Equipment_room::where('room_id', $Position->id)->first();  
        $Equipment_roomf = $Equipment_roomF?->room_id ?? "";
        $Equipment_room = Equipment_room::where('room_id', $Position->id)->get();   
        $data = json_decode($Position->admin_room, true);
    $Adminroom1 = ($data['id1'] != 0) ? "ผู้ดูแลห้องคนที่ 1: ". User::where('id', $data['id1'])->first()->name : "ยังไม่มีผู้ดูแลคนที่ 1";
    $Adminroom2 = ($data['id2'] != 0) ? "ผู้ดูแลห้องคนที่ 2: ". User::where('id', $data['id2'])->first()->name : "ยังไม่มีผู้ดูแลคนที่ 2";
    $statusroom = ($Position->status == "0")? "เปิด" : "ปิด";
   $Auth = Auth::user()->usertype;
    
   
@endphp
<x-app-layout>
    {{-- nav รอง --}}
    <x-slot name="header" style="background-color: #ffff">
        <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
    </x-slot>

    @section('title')
        Floor-4
    @endsection
    @section('content')
        @extends('modal.modal')
        @extends('modal.modalTeacher')

        <div id="message"></div>
        <div class="Center pr">
        <h1 class=" Center labelroom fw-semibold" style="z-index: 50;">{{$nameroom}}</h1>
        </div>
        <div class="py-12 card-1">
            <div class="container">
                <div class="row pr">
                    <?php $R = 0; ?>
                @if (!(Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2']))
                    @if (!empty($Adminroom1||$Adminroom2) )
                    <?php $R = 1; ?>
                        <div id="adminroom" class=" bg-opacity-10 border border-success border-opacity-10 rounded-2d-inline-flex px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2 " style="width: 35%; height: 5em; overflow: auto;">
                            <p class="fw-semibold" style="color: #1ecf1e8f;font-size: clamp(12px, 2.2vw, 20px); margin-bottom: 0;"> {{$Adminroom1}}</p>  
                            <p class="fw-semibold" style="color: #1ecf1e8f;font-size: clamp(12px, 2.2vw, 20px);"> {{$Adminroom2}}</p>  
                        </div>
                        @endif
                @endif
                    @include('components.surveyadminroom',compact('R','statusroom'))
                   
                
                  
                    <div class="card" style="top: 60px">
                        <div class="card-room">

                            <div class="container testone" id="Nullroom">
                                @foreach ($Equipment_room as $equipment_room)
                                    <div class="btn1 buttomClosed" data-bs-target="#donus" data-bs-toggle="modal" data-auth="{{ $Auth }}" data-equipment={{$equipment_room->equipment_id}} data-position= {{$Position}}  data-equipment_room= {{$equipment_room}} >{{$equipment_room->label}}</div>
                                @endforeach
                                
                                @if (Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2'] )
                                    @if (Auth::user()->usertype == 1 || 2 )
                                        <button type="button" class="btn btn-outline-danger  buttomaddEquip" id="addequipment" data-bs-target="#addEquipment" data-bs-toggle="modal" data-position= {{$Position->id}}> <img src="../../../image/icon/cross.png" style="max-width: 9rem "
                                        class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6"></button>
                                    @endif
{{-- @elseif ((Auth::user()->usertype == 1 || Auth::user()->usertype == 2) || (Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2'])) --}}
                                              
                                @else 
                                    @if (($Equipment_roomf !=  $Position->id) ||  ($Equipment_roomf === "")) 
                                        <script> $("#Nullroom").css({"justify-content": "center","position": "absolute","display": "flex","align-items": "center"});</script>
                                        <h1 class="bg-opacity-10 border border-success border-opacity-10 rounded-2d-inline-flex px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2">โปรดเพิ่มผู้ดูแลก่อนใช้งาน</h1>
                                    @endif
                                
                                @endif
                            
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    @endsection
</x-app-layout>
