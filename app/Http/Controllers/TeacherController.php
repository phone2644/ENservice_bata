<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Equipment_room;
use App\Models\Position;
use App\Models\Problem;
use App\Models\Repair;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TeacherController extends Controller
{


    public function dashboard_T()
    {
        $auth = Auth::user()->usertype; 
        if ($auth <= 1) {
           $go_tosetting = "displayCus";
        }else{
            $go_tosetting = "";
        }
       
        return view('Teacher.dashboard-T',compact('go_tosetting'));
    }

    public function deleteE($id)
    {
        // dd($id);
        $Repair = Repair::where('equipment_id', $id)->get();

        if (!empty($Repair)) {
            foreach ($Repair as $repair) {

                // $data=[
                //     'equipment_id'=> 1,
                //     'problem_id'=> 1,

                // ];
                // dd($repair->id);
                $equipment_id = 1;
                $problem_id = 1;
                $status = 'EDeleted';
                Repair::where('id', $repair->id)->update(['status' => $status]);
                Repair::where('id', $repair->id)->update(['equipment_id' => $equipment_id]);
                Repair::where('id', $repair->id)->update(['problem_id' => $problem_id]);
                //  DB::table('repairs')->where('id',$repair->id)->update($data);
                // $assign = Repair::destroy($repair->id);

            }
        }

        $Problem = Problem::where('equipment_id', $id)->get();
        // dd($Problem);
        if (!empty($Problem)) {
            foreach ($Problem as $problem) {
                // dd($problem->id);
                $assign = Problem::destroy($problem->id);
            }
        }

        Equipment::destroy($id);

        return view('Teacher.tableElectronic');
    }


    public function destroy($id)
    {

        $Repair =  Repair::findOrFail($id);

        $userpage = Repair::destroy($Repair);
    }


    public function delete_equipment_room($id)
    {

        $userpage = Equipment_room::destroy($id);
    }
    public function delete_problem($id)
    {

        $userpage = Problem::destroy($id);
    }



    // public function deleteE_room($id)
    // {
    //     $Equipment_room = Equipment_room::where('id', $id)->get();
    //     // foreach ($Equipment_room as $equipment_room) {
    //     //     $equipment_room->delete();
    //     // }

    //     Equipment_room::destroy($id);



    //     return redirect()->back();
    // }





    public function tableElectronic()
    {
        return view('Teacher.tableElectronic');
    }



    public function submit_addproblem(Request $request)
    {

        $data = [
            'topic' => $request->topic,
            'equipment_id' => $request->equipment_id,
            'problem' => $request->problem
        ];
        Problem::insert($data);
        return redirect()->back();
    }

    public function changestatus_R($id)
    {
        $position = Position::where('room', $id)->first();
        $auth = Auth::user()->id;
        if($position->status == 1){
            Position::where('id', $position->id)->update(['status' => 0]);
        }elseif($position->status == 0){
            Position::where('id', $position->id)->update(['status' => 1]);
        }

        return redirect()->back();
    }

    public function adminroom($id)
    {
        $position = Position::where('room', $id)->first();
        $auth = Auth::user()->id;

        if ($position && $position->admin_room) {
            $data = json_decode($position->admin_room, true);
               
                // dd('id'.$i);
                for ($i=1; $i <= 2; $i++) {     
                    if ($data['id'.$i] == 0 && (($data['id1']!= $auth) || ($data['id2']!= $auth))) {  
                        $data['id'.$i] = ($auth);
                        // อัปเดตคอลัมน์ `admin_room`
                        $position->admin_room = json_encode($data);
                        $position->save();
                        return redirect()->back();
                      }  elseif ($data['id'.$i] == $auth) {
                        $data['id'.$i] = 0;
                        $position->admin_room = json_encode($data);
                        $position->save();
                        return redirect()->back();
                      } 
                      
                }
           
                // if ($data['id1'] == 0 && $data['id2'] != $auth) {
                //     // dd($data['id'.$i]);
                //     $data['id1'] = ($auth);
                //     // อัปเดตคอลัมน์ `admin_room`
                //     $position->admin_room = json_encode($data);
                //     $position->save();
                //     return redirect()->back();

                // } elseif($data['id2'] == 0 && $data['id1'] != $auth) {
                //     // dd($data['id'.$i]);
                //     $data['id2'] = ($auth);
                //     $position->admin_room = json_encode($data);
                //     $position->save();
                //     return redirect()->back();
                // }

                return redirect()->back();
        } else {
            // จัดการกรณีที่ `position` หรือ `admin_room` ไม่พบ
            dd('`admin_room` ไม่พบ');
        }



    }

    public function submit_addequipment_room(Request $request)
    {
        // return response()->json($request->all());
        $data = [
            'label' => $request->label,
            'equipment_id' => $request->equipment_id,
            'room_id' => $request->room_id,
            'number_equipment' => $request->number,
            'created_at' => now(),
        ];
        Equipment_room::insert($data);
        return redirect()->back();
    }


    public function submit_addElect(Request $request)
    {
        //  return response()->json($request->all());
        $content = new Equipment;
        $this->savefrom($content, $request);
        return redirect()->back();
    }


    public function edit_E(Request $request){
        // dd($request);
        Equipment::where('id',$request->id_Equip)->update(["name"=> $request->nameEquip , "description"=> $request->descripEquip, "label_button"=> $request->namebutton]);
        return redirect()->back();
    }

    private function savefrom($data, $value)
    {

        $data->label_button = $value->label_name;
        $data->name = $value->title;
        $data->description = $value->description;
        $data->save();
    }
}
