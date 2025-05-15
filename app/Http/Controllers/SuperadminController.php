<?php

namespace App\Http\Controllers;

use App\Models\Assign;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Priority;
use App\Models\Position;
use App\Models\Repair;
use App\Models\User;
use Carbon\Carbon;
use App\Notifications\MassageboxNotification;
use Illuminate\Support\Facades\Notification;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Assign(Request $request)
    {

        // return response()->json($request->all());
        if ($request->order_rejected == "rejected") {
            $data = ['status' => 'rejected'];
            Repair::where('id',$request->repair_id)->update($data);
        } else{
        Repair::where('id',$request->repair_id)->update(["priority_admin"=> $request->timeadmin_Assi, "status" => 'reported',"updated_at" => Carbon::create(now()),]);
        }
        $Repair = Repair::findOrFail($request->repair_id);
        // $Repair->update($data);
        $user_id = User::where('id',$Repair->user_id)->get();$Massign = '';  
        Notification::send($user_id, new MassageboxNotification($Massign,$request->repair_id));

        return redirect()->back();
    }

    public function Reported(Request $request){
        //  return response()->json($request->all());
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
            $upload_location = 'image/images_assign/';
            $full_path = $upload_location . $img_name;
            //เก็บตำแหน่งภาพกับชื่อมารวม และย้ายไฟล์ image/content/1765924517996855.jpg
            $dropzone_file->move($upload_location, $img_name);
            $imagecontent = $full_path;
        }
        ;
        $this->deleteNotifications($request->repair_id);
            $data = ["user_id"=> $request->admin_id ,"repair_id"=> $request->repair_id , "dropzone_file"=> $imagecontent, "report_details"=> $request->report_details ,'created_at' => Carbon::create(now()),];
        Repair::where('id',$request->repair_id)->update(["status"=>"closed",'updated_at' => Carbon::create(now()),]);
        Assign::create($data);
        $Repair = Repair::where('id',$request->repair_id)->first();
        $Position = Position::where('id', $Repair->position_id)->first();
        $data = [
            'repair' => $Position->repair,
        ];
        $data['repair']--;
        Position::where('id',  $Repair->position_id)->update($data);
        $user_id = User::where('id',$Repair->user_id)->get();  
        Notification::send($user_id, new MassageboxNotification($request->report_details,$request->repair_id));
        return redirect()->back();
    }

    public function assignroom_EN_allrooms($nameroom)
    {    
        $nameroom = "EN1-".$nameroom;
        $rooms = substr($nameroom, -3);
        // $viewPath = "Floors.floors-1.rooms-1.EN-1-" . $rooms;
        $this->unreadNotifications($nameroom);
        return view('Superadmin.fromassign', compact('nameroom'));
    
    }
    // public function assignroom_EN_2($nameroom)
    // {    
    //     $nameroom = "EN1-".$nameroom;
    //     $rooms = substr($nameroom, -3);
    //     // $viewPath = "Floors.floors-2.rooms-1.EN-1-" . $rooms;
    //     $this->unreadNotifications($nameroom);
    //     return view('Superadmin.fromassign', compact('nameroom'));
    
    // }

    public function destroy_Pri($id)
    {
        
        $userpage = Priority::destroy($id);
        return $id;
    }
    public function destroy_Pos($id)
    {
        
        $userpage = Position::destroy($id);
        return $id;
    }

    public function add_Pri(Request $request){
        // dd($request);
      
        Priority::create(["topic"=> $request->topic_Pri ,"usertype"=> $request->select_Pri , "description"=> $request->description, "color"=> $request->color_Pri ,"time"=> $request->time_Pri ,]);
        return redirect()->back();
    }

    public function add_Pos(Request $request){
        // dd($request);
        $data = ['id1' => 0, 'id2' => 0];
       DB::table('positions')->insert([
           'floor' => $request->floor_p,
           'room' => $request->room_P_E,
           'repair' => 0,
           'status' => 1,
           'admin_room' => json_encode($data),
           'created_at' => now(),
       ]);
        return redirect()->back();
    }

    public function edit_Pri(Request $request){
        Priority::where('id',$request->id_table)->update(["topic"=> $request->topic_Pri ,"usertype"=> $request->select_Pri , "description"=> $request->description, "color"=> $request->color_Pri ,"time"=> $request->time_Pri ,]);
        return redirect()->back();
    }

    public function edit_Pos(Request $request){
        // dd($request);
        if ($request->admin_room == 1) {
            $data = ['id1' => 0, 'id2' => 0];
            Position::where('id',$request->id_Pos_edit)->update([ 'admin_room' => json_encode($data),]);
        }
        Position::where('id',$request->id_Pos_edit)->update(["floor"=> $request->floor_p ,"room"=> $request->room_Edit_Pos , "status"=> $request->status,]);
        return redirect()->back();
    }


    public function search_user(Request $request){   
        
        $keyword = $request->search_user;
        // ค้นหาผู้ใช้ที่มีชื่อ "LIKE" คำที่ค้นหา
        $User = User::where('name', 'like', "%$keyword%")->get();
         return view('Superadmin.setting_User',compact('User'));
    }

    public function submit_setting_user(Request $request){   
        //  return response()->json($request->all());
      if ($request->delete_user == 1){
        User::destroy($request->id_user);
      }
        // ค้นหาผู้ใช้ที่มีชื่อ "LIKE" คำที่ค้นหา
        $User = User::where('id',$request->id_user)->update(['usertype'=>$request->status_user]);
        return redirect()->back();
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
    private function deleteNotifications($repair_id)
    {   
      
        $ids = DB::table('notifications')->where('data->repair_id', $repair_id)->pluck('id');
        // dd($ids);
        DB::table('notifications')->whereIn('id', $ids)->delete();
    }
}
