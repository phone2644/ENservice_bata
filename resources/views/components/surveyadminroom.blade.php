<?php  $statusroom = ($Position->status == "0")? "เปิด" : "ปิด"; ?>
<?php  $statusname = ($statusroom == "เปิด")? "Closed" : "Open" ; ?>
<?php  $statuscolor = ($statusname == "Open")? "#1ecf1e8f;" : "#cc0404;" ; ?>
        @if (Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2'])
    <h2 class="fw-semibold " style="align-items: center; color:{{$statuscolor}}"><div class="rounded-full" style="width: 1em;background: {{$statuscolor}} height: 1em; display: inline-block;margin: 0px 7px;  "></div>  {{$statusname}}</h2>      
    <div style="display: block ruby; position:relative;"> 
    
    
 
                            @if (!empty($Adminroom1||$Adminroom2) )
                          
                                    <div class="adminroom1 bg-opacity-10 border border-success border-opacity-10 rounded-2d-inline-flex px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2" style="width: fit-content; height: 5em; overflow: auto;">
                                        <h4 class="fw-semibold " style="color: #1ecf1e8f;font-size: clamp(12px, 2.2vw, 20px);"> {{$Adminroom1}}</h4>  
                                        <h4 class="fw-semibold " style="color: #1ecf1e8f;font-size: clamp(12px, 2.2vw, 20px);"> {{$Adminroom2}}</h4>  
                                    </div>
                              
                            @endif

                            @if ($Equipment_room->isEmpty())
                                    @if (Auth::user()->id == $data['id1'] || Auth::user()->id == $data['id2'])
                                      <div class="">
                                        <button type="button" class="btn   btn-dark  " href="{{ url('teacher/changestatus_R', $Position->room) }}" onclick="roomconfirmation(event) "   style=" right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 103px; position: absolute; top: -1.5em;" >{{$statusroom}}การใช้งานห้อง </button>
                                        <button type="button" class="btn   btn-warning  " href="{{ url('teacher/saveadminroom', $Position->room) }}" onclick="unconfirmation(event) "   style=" right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 170px; position: absolute; top: 2em;" >ยกเลิกการเป็นผู้ดูแลห้อง {{$Position->room}}</button>  
                                      </div>
                                    @else 
                                        <button type="button" class="btn   btn-primary  adminroomButton"  href="{{ url('delete_post', $Position) }}" onclick="confirmation(event) " data-position={{$Position}}  style="width: 15%; right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 103px; position: absolute; " onclick="Nof_modal()">เพิ่มผู้ดูแลห้อง {{$Position->room}}</button>
                                    @endif
                            @else
                                  <button type="button" class="btn   btn-dark  " href="{{ url('teacher/changestatus_R', $Position->room) }}" onclick="roomconfirmation(event) "   style="width: 12%; right: 5px;  font-size: clamp(10px, 1vw, 17px); min-width: 103px; position: absolute; top: -1.5em;" >{{$statusroom}}การใช้งานห้อง </button>
                                  <button type="button" class="btn   btn-warning  " href="{{ url('teacher/saveadminroom', $Position->room) }}" onclick="unconfirmation(event) "   style="right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 170px; position: absolute; right: 11em; top: 2em;" >ยกเลิกการเป็นผู้ดูแลห้อง {{$Position->room}}</button>
                                  <button type="button" class="btn  btn-danger  Deletebutton"data-bs-target="#Deletebutton" data-bs-toggle="modal" data-id={{$Position}} style="width: 12%; right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 100px; position: absolute; top: 2em;">Delete Button</button>
                            @endif   
                          </div> 
             @elseif (Auth::user()->usertype == 1 || Auth::user()->usertype == 2)  
                           @if ($R && !($data['id1'] != 0 && $data['id2'] != 0))
                           <button id="addadmin" type="button" class="btn   btn-primary  " href="{{ url('teacher/saveadminroom', $Position->room) }}" onclick="confirmation(event) "   style="width: 15vw; right: 5px;  font-size: clamp(10px, 1.2vw, 17px); min-width: 125px; position: absolute;" >เพิ่มผู้ดูแลห้อง {{$Position->room}}</button>
                           @endif
             @endif
   
                        <script>        
                            function unconfirmation(ev) {
                                ev.preventDefault();
                                var urlToRedirect = ev.currentTarget.getAttribute('href');
                                console.log(urlToRedirect);
                                $("body").css({
                                    "backdrop-filter": "none",
                                })
                                Swal.fire({
                                    title: "แน่ใจใช่มั้ยที่จะยกเลิก?",
                                    text: "หากคุณยกเลิก จะไม่มีสิทธิ์ในการอะไรเลยในห้องนี้",
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: "ใช่",
                                    denyButtonText: `ไม่ ฉันไม่ต้องการ`
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire("Saved!", "", "success");
                                        setTimeout(function() {
                                            location.reload();
                                            window.location.href = urlToRedirect;
                                        }, 3000);
                                    } else if (result.isDenied) {
                                        Swal.fire("ยกเลิกคำขอแล้ว", "", "info");
                                    }
                                });
                            }

                            function roomconfirmation(ev) {
                                ev.preventDefault();
                                var urlToRedirect = ev.currentTarget.getAttribute('href');
                                console.log(urlToRedirect);
                                $("body").css({
                                    "backdrop-filter": "none",
                                })
                                Swal.fire({
                                    title: "ต้องการเปลี่ยนสถานะห้องนี้ใช่หรือไม่",
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: "ใช่",
                                    denyButtonText: `ไม่ ฉันไม่ต้องการ`
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire("Saved!", "", "success");
                                        setTimeout(function() {
                                            location.reload();
                                            window.location.href = urlToRedirect;
                                        }, 3000);
                                    } else if (result.isDenied) {
                                        Swal.fire("ยกเลิกคำขอแล้ว", "", "info");
                                    }
                                });
                            }
                            function confirmation(ev) {
                                ev.preventDefault();
                                var urlToRedirect = ev.currentTarget.getAttribute('href');
                                console.log(urlToRedirect);
                                $("body").css({
                                    "backdrop-filter": "none",
                                })
                                Swal.fire({
                                    title: "คุณจะบริหารจัดการห้องนี้ใช่หรือไม่?",
                                    text: "ผู้ที่ดูแลห้องนี้ จะสามารถเพิ่มอุปกรณ์หรือลบได้ตามที่ต้องการ",
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonText: "ใช่",
                                    denyButtonText: `ไม่ ฉันไม่ต้องการ`
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        Swal.fire("Saved!", "", "success");
                                        setTimeout(function() {
                                            location.reload();
                                            window.location.href = urlToRedirect;
                                        }, 3000);
                                    } else if (result.isDenied) {
                                        Swal.fire("ยกเลิกคำขอแล้ว", "", "info");
                                    }
                                });
            
                            }
                
            
                
                    </script>