<?php

use Illuminate\Support\Facades\URL;

$Equipment_room = $_POST['Equipment_room'];
$Position_id = $_POST['Position_id'];
$Position_room = $_POST['Position_room'];
$Equipment = $_POST['Equipment'];
$url = $_POST['$url'];

?>



<table class="table table-Secondary table-hover">
    <div class="modal-header headerform" style="border-bottom: 4px solid #ffbf00; box-shadow: inset 0 0 25px 21px rgba(55, 4, 4, 0.57);">
        <center>
            <h3 class="headerTable">อุปกรณ์ทั้งหมดในห้อง : <?php echo $Position_room; ?></h1>
        </center>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="close_modal()" aria-label="Close"></button>
    </div>


    <table id="deleteroom" class="table table-danger">

        <thead>
            <tr>
                <th scope="col" class="font_size" style="color: darkred;">ID</th>
                <th scope="col" class="font_size" style="color: darkred;">Label</th>
                <th scope="col" class="font_size" style="color: darkred;">Equipments</th>
                <th scope="col" class="font_size" style="color: darkred;">
                    <center>Delete Button</center>
                </th>

            </tr>
        </thead>

        <tbody>
            <?php $id = 1; ?>
            <?php for ($i = 0; $i < count($Equipment_room); $i++) {
                if ($Equipment_room[$i]['room_id'] === $Position_id) { ?>
                    <tr class="table-light">
                        <th class="font_size"><?php echo $id++; ?></th>
                        <td class="font_size " style="font-weight: bold; color:darkred;"><?php echo $Equipment_room[$i]['label']; ?></td>



                        <?php for ($k = 0; $k < count($Equipment); $k++) {
                            if ($Equipment[$k]['id'] === $Equipment_room[$i]['equipment_id']) { ?>
                                <td class="font_size"><?php echo $Equipment[$k]['name']; ?></td>
                        <?php break;
                            }
                        } ?>
                        <td class="font_size " style="font-weight: bold; color:darkred;">
                            <center> <button type="button" class="btn btn-danger delete_equipment_room" data-id="<?php echo $Equipment_room[$i]['id'] ?> ">Delete</button></center>
                        </td>

                    </tr>
                <?php } else {
                } ?>





            <?php  } ?>

        </tbody>
    </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</table>

<script type="text/javascript">
   
    document.querySelector('#deleteroom').addEventListener('click', (e) => {
        if (e.target.matches('.delete_equipment_room')) {
            $("body").css({
            "backdrop-filter": "none"
        });
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
                    axios.delete($url + '/delete_equipment_room/' + e.target.dataset.id).then((response) => {
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