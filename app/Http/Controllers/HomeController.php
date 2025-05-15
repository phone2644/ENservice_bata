<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Repair;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Notifications\MassageNotification;
use App\Notifications\MassageboxNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search_Equip_room(Request $request){ 
       
        $Position = Position::where('room',$request->nameroom)->first();
        $floor = $Position->floor; $nameroom =$Position->room;
        $search_Equip_room = $request->search_Equip_room;
        if ($search_Equip_room == "") {
        return redirect('/EN-floors/floor-'.$floor.'/room-'.$Position->room.'/'.$Position->room);
        }
        return view('Floors.EN-all', compact('nameroom','floor','search_Equip_room'));
    }

    public function deleteR($id)
    {
        $Repair = Repair::where('id',$id)->first();
        if (!($Repair->status == 'closed')) {
            $Position = Position::where('id', $Repair->position_id)->first();
            $data = [
                'repair' => $Position->repair,
            ];
            $data['repair']--;
            Position::where('id',  $Repair->position_id)->update($data);
            $ids = DB::table('notifications')->where('data->repair_id', $Repair->id)->pluck('id');
            DB::table('notifications')->whereIn('id', $ids)->delete();

        }

       
        $Repair = Repair::findOrFail($id);
        // dd($Repair);
        $Assign = Assign::where('repair_id', $Repair->id)->first();
        if ($Assign) {
            File::delete($Assign->dropzone_file); // Delete the file associated with the Assign
        }
        $Assign = Assign::where('repair_id', $Repair->id)->delete();
        Repair::destroy($Repair->id);
        if ($Repair) {
          File::delete($Repair->dropzone_file); // Delete the file associated with the Assign
        }
        
    
        return redirect()->back()->with('DeleteRepair','ลบแล้ว');
    }


    public function Allrepair()
    {
        if (auth()->user()->usertype <= 1) {

            $Repair = Repair::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10000);
        } elseif (auth()->user()->usertype == 2) {
            $Repair = Repair::paginate(10000);
            foreach ($Repair as $key => $value) {
                $item = Assign::where('repair_id', $value->id)
                    ->orderBy('id', 'desc')
                    ->first();
                if (isset($item->user_id)) {
                    $value->reciver = User::find($item->user_id)->name ?? '';
                }
            }
        }
        return view('Superadmin.Allassign', compact('Repair'));
    }
    public function index()
    {
        // $Repair = DB::table('repairs')->orderBy('id', 'desc')->first();
        if (auth()->user()->usertype <= 1) {

            $Repair = Repair::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10000);
        } elseif (auth()->user()->usertype == 2) {
            $Repair = Repair::where('status', 'reported')->paginate(10000);
        }
        return view('dashboard', compact('Repair'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $dropzone_file = $request->file('dropzone_file');
        if (empty($dropzone_file)) {
            $imagecontent = $dropzone_file;
        } else {

            $dropzone_file = $request->file('dropzone_file');
            //เก็บ=ชื่อรูปภาพ
            $name_gen = hexdec(uniqid());
            //เก็บนามสกุลรูป
            $img_ext = strtolower($dropzone_file->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            //เก็บตำแหน่งภาพ
            $upload_location = 'image/images_problem/';
            $full_path = $upload_location . $img_name;
            //เก็บตำแหน่งภาพกับชื่อมารวม และย้ายไฟล์ image/content/1765924517996855.jpg
            $dropzone_file->move($upload_location, $img_name);
            $imagecontent = $full_path;
        }

        $Position = Position::where('id', $request->position_id)->first();
        $data = [
            'repair' => $Position->repair,
        ];
        $data['repair']++;
        Position::where('id', $request->position_id)->update($data);
        $floor_id = $Position->floor;
        $user = User::where('usertype', 2)->get();
        $content = new Repair; 
        
        $this->savefrom($content, $request, $imagecontent);
        $Massign = '';
        
        Notification::send($user, new MassageNotification($Position->room, $floor_id, $content->id));
        return redirect()->route('dashboard')->with('success', 'สร้างข้อมูลสำเร็จ');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function back()
    {

        return redirect()->back();
    }




    private function savefrom($data, $value, $imagecontent)
    {

        $data->topic = $value->topic;
        $data->problem_id = $value->problem_id;
        $data->equipment_id = $value->equipment_ID;
        $data->description = $value->description;
        $data->position_id = $value->position_id;
        $data->priority_user = $value->priority_id;
        $data->number_equipment = $value->number_equipment_id;
        $data->email = $value->email;
        $data->name = $value->name;
        $data->phone = $value->phone;
        $data->line = $value->line;
        $data->dropzone_file = $imagecontent;
        $data->contact_facebook = $value->contact_facebook;
        $data->user_id = $value->user_id;
        $data->save();
    }


    // floor1
    #################################################################################################################
    public function floor1()
    {
        $Position = Position::where('floor', 1)
            ->select(['room', DB::raw('SUM(repair) AS total_repair')])
            ->groupBy('room')
            ->get();

        $floorRepairs = [];
        foreach ($Position as $position) {
            $floorRepairs["EN1-" . substr($position->room, -3)] = $position->total_repair;
        }
        return view('Floors.floor-1', compact("floorRepairs", "Position"));
    }

    public function room_EN($nameroom)
    {
        $nameroom = "EN1-" . $nameroom;
        // $rooms = substr($nameroom, -3);
        $this->unreadNotifications($nameroom);
        $Position = Position::where('room',$nameroom)->first();
        $floor=$Position->floor;
        return view('Floors.EN-all', compact('nameroom','floor'));
    }

    // floor2
    #################################################################################################################
    public function floor2()
    {
        $Position = Position::where('floor', 2)
            ->select(['room', DB::raw('SUM(repair) AS total_repair')])
            ->groupBy('room')
            ->get();
        $floorRepairs = [];
        foreach ($Position as $position) {
            $floorRepairs["EN1-" . substr($position->room, -3)] = $position->total_repair;
        }
        return view('Floors.floor-2', compact("floorRepairs"));
    }



    // floor3
    #################################################################################################################
    public function floor3()
    {
        $Position = Position::where('floor', 3)
            ->select(['room', DB::raw('SUM(repair) AS total_repair')])
            ->groupBy('room')
            ->get();
        $floorRepairs = [];
        foreach ($Position as $position) {
            $floorRepairs["EN1-" . substr($position->room, -3)] = $position->total_repair;
        }
        return view('Floors.floor-3', compact("floorRepairs"));
    }


    // floor4
    #################################################################################################################
    public function floor4()
    {
        $Position = Position::where('floor', 4)
            ->select(['room', DB::raw('SUM(repair) AS total_repair')])
            ->groupBy('room')
            ->get();
        $floorRepairs = [];
        foreach ($Position as $position) {
            $floorRepairs["EN1-" . substr($position->room, -3)] = $position->total_repair;
        }
        return view('Floors.floor-4', compact("floorRepairs"));
    }

    // floor5
    #################################################################################################################
    public function floor5()
    {
        $Position = Position::where('floor', 5)
            ->select(['room', DB::raw('SUM(repair) AS total_repair')])
            ->groupBy('room')
            ->get();
        $floorRepairs = [];
        foreach ($Position as $position) {
            $floorRepairs["EN1-" . substr($position->room, -3)] = $position->total_repair;
        }
        return view('Floors.floor-5', compact("floorRepairs"));
    }


    private function unreadNotifications($id)
    {

        $auth = Auth::user()->unreadNotifications;
        foreach ($auth as $key => $valueauth) {

            $getID = DB::table('notifications')->where('data->position_id', $id)->pluck('id');
            foreach ($getID as $key => $getid) {
                if ($getid == $valueauth->id) {
                    DB::table('notifications')->where('id', $getid)->update(['read_at' => now()]);
                }
            }
        }
    }
}
