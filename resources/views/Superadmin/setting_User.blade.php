@php
    // use App\Models\User;
    // $User = User::all();
@endphp
<x-app-layout>
    @section('title')
        จัดการ Users
    @endsection
    @section('content')
        @extends('modal.modalSuperadmin')
        <x-slot name="header" style="background-color: #ffff">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('css/background.css') }}">
            <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
            {{-- <link rel="stylesheet" href="{{ asset('css/sass.css') }}"> --}}
            <link rel="stylesheet" href="{{ asset('css/modal.css') }}">


            </div>
        </x-slot>
        <div class="container">
            <br />
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form action="{{ route('search_user') }}" method="GET" class="card card-sm"
                        style="background: #f0f8ff61; bottom: 10px;">
                        @csrf
                        <div class="card-body row no-gutters align-items-center">
                            <div class="col-auto">
                            </div>
                            <!--end of col-->
                            <div class="col">
                                <input name="search_user" class="form-control form-control-lg form-control-borderless"
                                    type="search" placeholder="ค้นหาชื่อบุคลากรที่ท่านต้องการ..">
                            </div>
                            <!--end of col-->
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" type="submit">Search</button>
                            </div>
                            <!--end of col-->
                        </div>
                    </form>
                </div>
                <!--end of col-->
            </div>
        </div>
        <div class="card-1" style="height: 70rem; max-height: 10px;">

            <div style="align-items: center;position: relative;display: flex;justify-content: center;">
                <div class="card glass" style="  background: #f0f8ff3b; align-items: center;width: 98vw; min-height: 21vh; overflow: auto;">
                    
                        @if ($User->count() === 0)
                            <h2 style="font-weight: bold;color: aliceblue;text-align: center; margin: auto;">ไม่มีข้อมูลที่ค้นหา</h2>
                            <p style="text-align: center; color:aliceblue;">คลิก Search เพื่อดูรายชื่อทั้งหมด</p>
                        @else
                        <div 
                        style="display: grid;grid-template-columns: auto auto auto;grid-auto-rows: auto;width: 100%; height: 68vh">
                            @foreach ($User as $item)
                                @if ($item->usertype == 2)
                                    <?php $status = 'เจ้าหน้าที่'; ?>
                                    <button  type="button" data-bs-toggle="modal" data-bs-target="#setting_user" data-id="{{$item}}"
                                        class="Setting_user glass_btn  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline">
                                        <img src="../../../image/icon/profile_A.png" alt="location-team"
                                            style="opacity: 0.5;height: fit-content;background: aliceblue;border-radius: 6px;margin: 1vw;width: 7vw;min-width: 60px;">
                                        <div
                                            style="text-align: initial;margin: auto auto auto 6px;font-size: clamp(5px, 1.5vw ,16px);overflow: auto;color: #8b000080;font-weight: bold;">
                                            <p><span style="color: #ddddddad"> Status:&nbsp;</span>{{ $status }}</p>
                                            <p><span style="color: #ddddddad"> Name:&nbsp;</span>{{ $item->name }}</p>
                                            <p><span style="color: #ddddddad"> Eamil:&nbsp;</span>{{ $item->email }}</p>

                                        </div>
                                    </button>
                                @elseif ($item->usertype == 1)
                                    <?php $status = 'อาจารย์'; ?>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#setting_user" data-id="{{$item}}"
                                        class="Setting_user glass_btn  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline">
                                        <img src="../../../image/icon/profile_T.png" alt="location-team"
                                            style="opacity: 0.5;height: fit-content;background: aliceblue;border-radius: 6px;margin: 1vw;width: 7vw;min-width: 60px;">
                                        <div
                                            style="text-align: initial;margin: auto auto auto 6px;font-size: clamp(5px, 1.5vw ,16px);overflow: auto;color: #8b000080;font-weight: bold;">
                                            <p><span style="color: #ddddddad"> Status:&nbsp;</span>{{ $status }}</p>
                                            <p><span style="color: #ddddddad"> Name:&nbsp;</span> {{ $item->name }}</p>
                                            <p><span style="color: #ddddddad"> Eamil:&nbsp;</span>{{ $item->email }}</p>

                                        </div>
                                    </button>
                                @else
                                    <?php $status = 'นักศึกษา'; ?>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#setting_user" data-id="{{$item}}"
                                        class="Setting_user glass_btn  flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline">
                                        <img src="../../../image/icon/profile_S.png" alt="location-team"
                                            style="opacity: 0.5;height: fit-content;background: aliceblue;border-radius: 6px;margin: 1vw;width: 7vw;min-width: 60px;">
                                        <div
                                            style="text-align: initial;margin: auto auto auto 6px;font-size: clamp(5px, 1.5vw ,16px);overflow: auto;color: #8b000080;font-weight: bold;">
                                            <p><span style="color: #ddddddad"> Status:&nbsp;</span>{{ $status }}</p>
                                            <p><span style="color: #ddddddad"> Name:&nbsp;</span> {{ $item->name }}</p>
                                            <p><span style="color: #ddddddad"> Eamil:&nbsp;</span>{{ $item->email }}</p>

                                        </div>
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    </div>


                    
                </div>

            </div>
        </div>


     
    @endsection

</x-app-layout>
