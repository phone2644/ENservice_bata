<x-app-layout>
@section('title')
    Setting
@endsection
@section('content')
@extends('modal.modalSuperadmin')
@extends('modal.modalSetting')

<x-slot name="header" style="background-color: #ffff">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/teacher.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sass.css') }}">
    <div class="">

    </div>
</x-slot>
<div class="card-1">
    <div class="card-2 ">
        <div class="card_white">
            <center>
                <div class="lable_main">System</div>
            </center>
            <br>
            <div class="grid_4">
                
                <a href="{{route ("tableElectronic-T")}}" class="block_1"><img src="../../../image/icon/electronics.png"  width="20%" class="smartphone" style="display: inline;"><p>เพิ่มอุปกรณ์อิเล็กทรอนิกส์</p></a>
                <a href="{{route("Allrepair")}}" class="block_1"><img src="../../../image/icon/process.png"   width="20%" class="smartphone" style="display: inline;"><p>รายงายการแจ้งซ่อม</p></a>
               
                <a href="{{route ("Setting_user")}}" class="block_1 {{$go_tosetting}}"><img src="../../../image/icon/management.png"   width="20%" class="smartphone" style="display: inline;"><p>จัดการผู้ใช้</p></a>
                <a href="{{route ("tableElectronic-T")}}" data-bs-toggle="modal" data-bs-target="#selectsetting" class="block_1 {{$go_tosetting}}"><img src="../../../image/icon/automated-engineering.png"   width="20%" class="smartphone" style="display: inline;"><p>ตั้งค่าระบบ</p></a>
           
            </div>
            <!-- Button trigger modal -->

        </div>
    </div>
</div>
@endsection
</x-app-layout>
