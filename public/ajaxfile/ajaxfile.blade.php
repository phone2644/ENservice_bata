<?php
$Idtable = $_POST['Idtable'];
$problemsData = $_POST['data'];
$url = $_POST['url'];
$NameE = $_POST['Equipment'];

?>




<table class="table table-Secondary table-hover" id="Addproblem">
    <center>
        <h1 class="headerTable">ปัญหาของอุปกรณ์ : <?php echo  $NameE; ?></h1>
    </center>
    <thead class="table-active">
        <?php $id = 1; ?>
        <tr>
            <th scope="col" class="TextSize">$url</th>
            <th scope="col" class="TextSize">หัวข้อ</th>
            <th scope="col" class="TextSize">รายละเอียด</th>
            <th scope="col" class="TextSize">Delete</th>
           
        </tr>
    </thead>
    <tbody>

        <?php for ($i = 0; $i < count($problemsData); $i++) {  
           
           if ($problemsData[$i]['equipment_id'] === $Idtable ) { ?>
             <tr>      
                <th class="TextSize"><?php echo $id++ ?></th>
                <td class="TextSize"><?php echo $problemsData[$i]['topic'] ?></td>
                <td class="TextSize"><h5><?php echo $problemsData[$i]['problem'] ?></5></td>  
                    <td class="font_size " style="font-weight: bold; color:darkred;"><center> <button type="button"
                        class="btn btn-danger delete_problem" data-id=" <?php echo $problemsData[$i]['id'] ?> " href="delete_Problem/ " onclick="confirmation(event) ">Delete</button></center></td>
            </tr>
          <?php } else {} ?>
           
           
           
       
       
        <?php }?>
    </tbody>
</table>

<div class="modal-footer">
    <button class="btn btn-primary equipmentid" data-bs-target="#openaddproblem2" data-bs-toggle="modal" data-equipmentid="<?php echo $Idtable ?>">Add Problem</button>
</div>
<script>
    $('.equipmentid').click(function() {
        //ดึงข้อมูลทั้งหมดมาจาก content
        var equipment_id = $(this).data('equipmentid');
        $.ajax({
                        url: '/ajaxfile/addproblem.php',
                        type: 'post',
                        data: {equipment_id: equipment_id,},
                        success: function(response){ 
                            console.log(response)
                            $('.modal-bodyaddproblem').html(response); 
                            $('#openaddproblem2').modal('show'); 
                        }
                    });

    });
document.querySelector('#Addproblem').addEventListener('click', (e) => {
    if (e.target.matches('.delete_problem')) {
           
        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete($url + '/delete_problem/' + e.target.dataset.id).then((response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'

                                )


                                setTimeout(function() {
                                    location.reload();
                                }, 3000);

                            });


                        }
                    });

                }
            });
</script>