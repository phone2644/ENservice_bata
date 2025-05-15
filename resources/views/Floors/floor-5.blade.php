@php
use App\Models\Position;
    $arrayrooms = Position::where('floor', 5)->get();
@endphp
<x-app-layout>
    <x-slot name="header" style="background-color: #ffff">
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        <div class="">
        </div>
       
    </x-slot>

    @section('title')
        Floor-5
    @endsection
    @section('content')

    <main class="card-1" style="height:auto !important;">
        <div class="card-2 ">
            <div class="card-3 " style="position: unset !important;">
                <div><div class="floor-5"><div class="label-floor"><p style="font-size: clamp(10px, 2.5vw, 30px);">Floor 5</p></div></div></div>
              <div id="hei_60" style="overflow:scroll; ">
                <div class="grid" style="display: flex; flex-wrap: wrap; justify-content: center;top: 1rem; position: relative;">   
                
                    @if (Auth::user()->usertype <= 1)
                    @foreach ($arrayrooms as $room)
                    <?php $room=$room->room; $Position = Position::where('room', $room)->first(); $data = json_decode($Position->admin_room, true); ?>
                        @if (($Position->status == 0) && (Auth::user()->usertype == 0))
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="ห้องนี้ถูกปิดการใช้งานแล้ว">
                            <a class="block-floor-R displayCus" href="{{ url('/EN-floors/floor-5/room-'.$room, $room) }}"  >{{$room}}</a>
                        </span>
                        @else
                            <a class="block-floor-R " href="{{ url('/EN-floors/floor-5/room-'.$room, $room) }}" >{{$room}}</a>
                        @endif
                    @endforeach

                    @elseif (Auth::user()->usertype == 2)
                        @foreach ($arrayrooms as $room)
                        <?php $room=$room->room; $Position = Position::where('room', $room)->first(); $data = json_decode($Position->admin_room, true); ?>
                            @if (($Position->status == 0) && (Auth::user()->usertype == 0))
                                <a class="block-floor-R pr displayCus" href="{{ url('/Officer/floor-5/room-'.$room, $room) }}" style="background: rgba(28, 28, 28, 0.5)">{{$room}} @if (!empty($floorRepairs[$room])) @include('components.massage', compact('room'))  {{$floorRepairs[$room]}}</p></div>@endif</a>
                                @else
                            <a class="block-floor-R pr " href="{{ url('/Officer/floor-5/room-'.$room, $room) }}" >{{$room}} @if (!empty($floorRepairs[$room])) @include('components.massage', compact('room'))  {{$floorRepairs[$room]}}</p></div>@endif</a>
                            @endif
                        @endforeach
                    @endif
                </div>
                
              </div>
            </div>
        </div>
    </main>
    @endsection
</x-app-layout>

