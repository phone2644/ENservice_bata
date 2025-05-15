@php
    use App\Models\User;
    use App\Models\Position;
    use Illuminate\Support\Facades\DB;
    $Position = Position::all();
    $floor1 = 0; $floor2 = 0; $floor3 = 0; $floor4 = 0; $floor5 = 0;
    foreach ($Position as $key => $position) {
        if ($position->floor === 5) {
            $floor5 = $position->repair + $floor5;
        } elseif ($position->floor === 4) {
            $floor4 = $position->repair + $floor4;
        }  elseif ($position->floor === 3) {
            $floor3 = $position->repair + $floor3;
        }  elseif ($position->floor === 2) {
            $floor2 = $position->repair + $floor2;
        }  elseif ($position->floor === 1) {
            $floor1 = $position->repair + $floor1;
        }
    }
    
@endphp

<x-app-layout>

    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('css/teacher.css') }}"> --}}

        {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          
        </h2> --}}
        </div>
    </x-slot>

    @section('title')
        Floors
    @endsection
    @section('content')
        <main class="card-1">
            <div class="card-2 ">
                <div class="card-3 ">
                    <div class="image_floor">

                        <div class="">
                            @if (Auth::user()->usertype <= 1)
                                <a class="block-floor" href="/EN-floors/floor-5" style="margin-top: -2.6rem;">Floor 5</a>
                                <a class="block-floor" href="/EN-floors/floor-4">Floor 4</a>
                                <a class="block-floor" href="/EN-floors/floor-3">Floor 3</a>
                                <a class="block-floor" href="/EN-floors/floor-2">Floor 2</a>
                                <a class="block-floor" href="/EN-floors/floor-1">Floor 1</a>
                                
                            @elseif (Auth::user()->usertype == 2)
                        
                            
                                @if ($floor5 == 0)
                                    <a class="block-floor" href="/EN-floors/floor-5" style="margin-top: -2.6rem;">Floor 5</a>
                                @else
                                    <a class="block-floor pr" href="/EN-floors/floor-5" style="margin-top: -2.6rem;">Floor 5<?php $Newmassage = "5";?> @include('components.Newmassage'){{$floor5}}</p></div></a>  
                                @endif
                                @if ($floor4 == 0) 
                                    <a class="block-floor" href="/EN-floors/floor-4">Floor 4</a>
                                @else
                                    <a class="block-floor pr" href="/EN-floors/floor-4">Floor 4 <?php $Newmassage = "4";?>@include('components.Newmassage'){{$floor4}}</p></div></a>
                                @endif
                                @if ($floor3 == 0)
                                    <a class="block-floor" href="/EN-floors/floor-3">Floor 3</a> 
                                @else
                                    <a class="block-floor pr" href="/EN-floors/floor-3">Floor 3 <?php $Newmassage = "3";?>@include('components.Newmassage'){{$floor3}}</p></div></a>
                                @endif
                                @if ($floor2 == 0)   
                                    <a class="block-floor" href="/EN-floors/floor-2" style="top: 0.5em;position: relative;">Floor 2</a>
                                @else
                                    <a class="block-floor pr" href="/EN-floors/floor-2" style="top: 0.5em; position: relative;">Floor 2 <?php $Newmassage = "2";?>@include('components.Newmassage'){{$floor2}}</p></div></a>
                                @endif
                                @if ($floor1 == 0)
                                    <a class="block-floor" href="/EN-floors/floor-1">Floor 1</a>
                                @else 
                                    <a class="block-floor pr" href="/EN-floors/floor-1">Floor 1 <?php $Newmassage = "1";?>@include('components.Newmassage'){{$floor1}}</p></div></a>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</x-app-layout>
