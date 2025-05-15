@php
    use Illuminate\Support\Facades\Auth;
    $auth = Auth::user();
    use App\Models\Equipment;
    use App\Models\Problem;
    use App\Models\Position;
    $Equipment = Equipment::where('id', '>', 1)->get();
    $Problem = Problem::all();
    $Position = Position::all();
    $user = Auth::user();
    $Position = $Position->toArray();
@endphp

<div class="modal fade" id="addEquipment" tabindex="-1" aria-labelledby="addEquipmentLabel" aria-hidden="true"
    style="">
    <div class="modal-bg" onclick="close_modal()"></div>
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title" id="addEquipmentLabel">เพิ่มอุปกรณ์ อิเล็กทรอนิกส์ภายในห้อง</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('submit_addequipment_room') }}" method="POST" id="addEquipment">

                <div class="modal-body" style="background-color: #b6b5b53d">
                    @csrf
                    <br>

                    <div class="mb-3 pr">
                        <label class="form-label">
                            <h4>ชนิดอุปกรณ์อิเล็กทรอนิกส์</h4>
                        </label>
                        <button type="button" class="btn btn-success pa" style="right: 0;"
                            onclick="location.href='{{ route('tableElectronic-T') }}'"> เพิ่มชนิดอุปกรณ์</button>
                        <select id="select_Equip" name="equipment_id" class="form-control" style="text-align: center; flex-direction: revert; display: flex;">
                            <option value="" id="option_S">
                                <div>-- โปรดเลือกชนิดอุปกรณ์อิเล็กทรอนิกส์ --</div>
                            </option>
                            @foreach ($Equipment as $equipment)
                                <option id="equipment_id" value="{{ $equipment->id }}" data-label="{{ $equipment->label_button }}">{{ $equipment->name }}</option>
                            @endforeach
                        </select>
                        <span id="ValueNullselect" class="hiddenCus " style="color:red; right: 5%; position: absolute;">โปรดกรอกข้อมูลหัวข้อปัญหา!!</span>



                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>ชื่อปุ่มอุปกรณ์อิเล็กทรอนิกส์</h4>
                        </label>
                        <input type="text" class="form-control" name="label"  id="label_E" placeholder="ชื่อปุ่มที่ต้องการแสดง...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>เลขหนุพันธ์อุปกรณ์</h4>
                        </label>
                        <input type="text" class="form-control" name="number"  placeholder="รหัสหนุพันธ์ของอุปกรณ์ท่าน...">
                    </div>
                   
                </div>

                <input type="text " class="form-control hiddenCus" name="room_id" id="room_id">
                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" id="Create_Equip" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="editEquip" tabindex="-1" aria-labelledby="editEquipLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title" id="addEquipmentLabel">ผู้ดูแลห้อง</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('edit_E') }}" method="POST">
                @csrf
                <div class="modal-body" style="background-color: #b6b5b5">
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>ชื่ออุปกรณ์</h4>
                        </label>
                        <input type="text" class="form-control" id="nameEquip" name="nameEquip">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>Button</h4>
                        </label>
                        <input type="text" class="form-control" id="namebutton" name="namebutton">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <h4>รายละเอียด</h4>
                        </label>
                        <input type="text" class="form-control" id="descripEquip" name="descripEquip">
                    </div>
                </div>

                <input type="text" class="form-control hiddenCus" id="id_Equip" name="id_Equip">

                <div class=" modal-footer " style=" box-shadow: inset 0 0 25px 21px rgba(128, 128, 128, 0.83);">
                    <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                    <button type="submit" class="btn btn-primary"> Edit</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="Allroom" tabindex="-1" aria-labelledby="AllroomLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header headerform"
                style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
                <h3 class="modal-title" id="addEquipmentLabel">ห้องที่ท่านดูแลทั้งหมด</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <div class="modal-body" style="background-color: #850000; box-shadow:3em; text-align:center; ">
            <div class="container" style="display:block ruby; overflow:auto; border: 5px solid white;">
                <a id="btn_room"></a>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.Allroom').click(function() {
        var Position = {!! json_encode($Position) !!};
        $('#btn_room').html('');
        for (let i = 0; i < Position.length; i++) {
            var p = (Position[i].admin_room);

            
            const userId = {{ $user->id }};
            const data = JSON.parse(p);
            // alert(data.id1);
            const id1 = data.id1;
            const id2 = data.id2; 
            if ( id1 == userId || id2 == userId) {
                // alert(Position[i].room);
                
                $('#btn_room').append(
                    `<a id="btn_room" href="/EN-floors/floor-${Position[i].floor}/room-${Position[i].room}/${Position[i].room}" style =" margin: 20px !important;"
                    class="btn-allroom set-gridrow mg-2 scale-100 p-6  from-gray-700/50 via-transparent rounded-lg shadow-2xl  flex motion-safe:hover:scale-[1.01]    ">
                   ${Position[i].room}</a>`
                    )
            }
            // if (Position[i].id === Repair.position_id) {
            //     var Position = (Position[i]);
            // }
        }
        // var P = $(this).data('P');
        // alert(P);
    });
    $('.editEquip').click(function() {
        var Equip = $(this).data('id');
        $('#nameEquip').val(Equip.name);
        $('#namebutton').val(Equip.label_button);
        $('#id_Equip').val(Equip.id);
        $('#descripEquip').val(Equip.description);
    });
</script>
