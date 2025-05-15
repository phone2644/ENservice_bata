

// function open_select($equipment,$Problem) {
   
//     var equipment = $equipment.id ;
//     //   $('#select').html(equipment);
//     $('#select').html(''); 
//     $Problem.forEach(problem => {
        
       
//         if (problem.equipment_id == equipment) {  
//             $('#select').append(`<option value="${problem.id}">${problem.topic}</option>`); 
//         } else {
        
//         }

        
//     });
// }

function description_P(descrip) {
    const problem = JSON.parse(descrip);
    // alert(problem.descrip);
    $('#description_P').removeClass('hiddenCus');
    $("#description_P").css({
        "color":"#06a820",   
       })
       $('#description_P').html('');
       $('#description_P').html('ปัญหาส่วนใหญ่:&emsp;' + problem.descrip);
}


function Nof_modal() {
   $("body").css({
    "backdrop-filter":"none",
    
   })
}
function Onf_modal() {
//    $("body").css({
//     "backdrop-filter":" blur(5px)",
    
//    })

}
function close_modal() {
   
   $("#modal").css({
    "opacity":"0",
    "transform": "translateY(200px)",
    
   })
   setTimeout(() =>{
   $("#modal").css("display", "none")
  
   window.location.reload();
    }, 300)

}


 


$('#Create_Equip').click(function checkInput() {
    const inputValueselect_P = document.getElementById("select_Equip").value; 
    if (inputValueselect_P === "") {
        $('#ValueNullselect').removeClass('hiddenCus');
        return false;
      }
 });
 $(document).ready(function() {
 $('#select_Equip').click(function checkInput() {
    $('#ValueNullselect').addClass('hiddenCus'); 
});
$('#select_Equip').on('change', function() {
    var label = $(this).find(':selected').data('label');
    $('#label_E').val(label);
  });
});

    var state = '1';
  
    $('#step-1').fadeIn();
    $('#step-2').fadeOut();
    $('#step-3').fadeOut();
    $('#back_page').addClass('disabled');
    $('#Next_page,#btn-step-2').click(function checkInput() {
        const inputValue = document.getElementById("select_P").value; 
        const ValueNulltopic = document.getElementById("topic").value; 
        const ValueNulldescrip = document.getElementById("description").value; 

        if (ValueNulltopic === "") {
            $('#ValueNulltopic').removeClass('hiddenCus');
            return false;
          }else{}
        if (inputValue === "") {
            $('#alertValueNull').removeClass('hiddenCus');
            return false;
          }else{}
        if (ValueNulldescrip === "") {
            $('#ValueNulldescrip').removeClass('hiddenCus');
            return false;
          }else{}
        
        switch (state) {
            case '1':
                $('#step-2').removeClass('hiddenCus');
                $('#back_page').removeClass('disabled');
                $('#btn-step-1').removeClass('formtopic');
                $('#btn-step-2').addClass('formtopic');
                $('#step-1').addClass('hiddenCus');
                $('#step-2').fadeIn(500);
                state = '2';
                break;

            case '2':
                $('#step-3').removeClass('hiddenCus');
                $('#step-3').fadeIn(1000);
                $('#btn-step-2').removeClass('formtopic');
                $('#btn-step-3').addClass('formtopic');
                $('#step-1').addClass('hiddenCus');
                $('#step-2').addClass('hiddenCus');
                state = '3';
                $('#Next_page').addClass('hiddenCus');
                $('#btn-finish-form').removeClass('hiddenCus');
                break;
            case "3":

                break;

            default:
                alert(4)
                break;
        }
    });

   

    $('#back_page').click(function() {

        switch (state) {
            
            case '1':
                $('#step-2').removeClass('hiddenCus');
                $('#step-3').removeClass('hiddenCus');
                
                $('#btn-step-2').removeClass('formtopic');
                $('#btn-step-1').addClass('formtopic');


                break;

            case '2':
                $('#back_page').addClass('disabled');
                $('#step-1').removeClass('hiddenCus').fadeIn(1000);
                $('#btn-step-2').removeClass('formtopic');
                $('#btn-step-1').addClass('formtopic');
                $('#step-2').addClass('hiddenCus');
                $('#step-3').addClass('hiddenCus');
                state = '1';

                break;
            case "3":
                $('#step-2').removeClass('hiddenCus').fadeIn(1000);
                $('#step-1').addClass('hiddenCus');
                $('#step-3').addClass('hiddenCus');
                $('#btn-step-3').removeClass('formtopic');
                $('#btn-step-2').addClass('formtopic');
                $('#Next_page').removeClass('hiddenCus');
                $('#btn-finish-form').addClass('hiddenCus');
                state = '2';
                break;

            default:
                alert(4)
                break;
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

