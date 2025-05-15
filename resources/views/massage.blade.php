@php
    use Carbon\Carbon;
    use App\Models\User;
    use App\Models\Position;
    use App\Models\Repair;
    use App\Models\Equipment;
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
    message box
    @endsection
    @section('content')
        <main class="card-1">
            <div class="card-2" style="overflow: auto;">
                <div class="card-3 "  style="overflow: auto; position: absolute; top:0%;">
                        {{-- <div class="container" style="overflow: auto; position: absolute;" > --}}
                        
                                @foreach (Auth::user()->unreadNotifications as $notification) 
                                
                                    <?php
                                        $Repair = Repair::where('id',$notification->data['repair_id'])->first();
                                        $Equipment = Equipment::where('id',$Repair->equipment_id)->first();
                                        $Position = Position::where('id',$Repair->position_id)->first();
                                    
                                    if ($Repair->status == "reported") {
                                        $status = 'กำลังดำเนินการแก้ไขปัญหาของท่าน...';
                                        $assign = 'เจ้าหน้าที่กำลังดำเนินการแก้ไขให้ท่านอยู่';
                                        $color = '#0b0b0b';
                                        $time =   Carbon::parse($notification->created_at)->diffForHumans();
                                    } elseif ($Repair->status == "closed") {
                                        $status = 'ปัญหาของท่านถูกแก้ไขแล้ว';
                                        $color = 'green';
                                        $assign = $notification->data['Massign'];
                                        $time =   Carbon::parse($notification->created_at)->diffForHumans();
                                    } else {
                                        $status = 'ไม่สามารถแก้ไขปัญหาของท่านได้';
                                        $assign = 'อาจเกิดจากข้อมูลอุปกรณ์เสียหายหรือเจ้าหน้าที่ไม่สามารถแก้ไขได้';
                                        $color = 'darkred';
                                        $time =   Carbon::parse($notification->created_at)->diffForHumans();

                                    };
                                    ?>
                                    @if (!($Repair->status == "pending"))
                                        <div class="card " style="  background: #f0f8ff3b; align-items: center;width: 100%; min-height: 100%; overflow: auto;">
                                            <div href="/floor" style="margin: 1.5rem 1rem; background:aliceblue;" class=" scale-100 p-6  from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                                <img src="../../../image/icon/development.png" style="max-width: 5rem; opacity:0.5; max-height: 5rem;" class="self-center shrink-0 stroke-red-500 w-20 h-20 mx-6">
                                                <div style="margin-left: 5rem;">
                                                    <h2 class="custom-massage"> {{$time}}</h2>
                                                    <h2 class="TextSize" style="color: {{$color}};">{{$status}}</h2>
                                                    <p class="TextSize" style="color: rgba(22, 22, 22, 0.595)">หัวข้อปัญหา:{{$Repair->topic}} ({{$assign}})</p>
                                                    <p class="TextSize" style="color: rgba(22, 22, 22, 0.595)">เลขครุภัณฑ์ {{$Repair->number_equipment}} ชนิดอุปกรณ์:  {{$Equipment->name}} ตำแหน่ง: Floor{{$Position->floor}} ห้อง {{$Position->room}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $ids = DB::table('notifications')->where('data->repair_id', $Repair->id)->pluck('id');
                                        DB::table('notifications')->whereIn('id', $ids)->delete(); ?>                      
                                    @endif
                                
                                @endforeach
                        {{-- </div> --}}
                        {{-- <p style="font-size: 2rem;text-align: center;color: #f0f8ff8c;">ไม่มีข้อความถึงท่าน</p> --}}
                        @if (Auth::user()->usertype == '2')
                        <p style="font-size: 2rem;text-align: center;color: #f0f8ff8c;">ไม่มีข้อความสำหรับเจ้าหน้าที่</p>         
                        @endif
                      
                    
                </div>
            </div>
        </main>
    @endsection
</x-app-layout>
