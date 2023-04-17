$(document).ready(function(){
    
    function loadTeachersTable(){
        $.ajax({
            method: 'POST',
            url: '../../controller/teachers_controller/teachersController.php',
            data: ({
                function: 'loadTable'
            }),
            dataType: 'html',
            async: false,
            success: function(response){
                $("#teachersTableBody").html(response);
            }
        })
    }

})