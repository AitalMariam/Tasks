$(document).ready(function() {
    var t = $('#New_checklist').DataTable({
        "paging": false,
    });
    $('#newitem').on( 'click', function () {
        var value = document.getElementById('itemType').value;
        var type''
        switch(value) {
            case value='1':
                type = '<div class="item"> <input type="checkbox" id="toggle_today_summary"> <div class="toggle"> <label for="toggle_today_summary"><i></i></label></div></div>';
                break;
            case value='2':
                type = '<input type="text" class="form-control" maxlength="10" required> <div class="invalid-feedback">This field is requered</div>';
                break;
            case value='3':
                type = '<input type="text" class="form-control" required> <div class="invalid-feedback">This field is requered</div>';
                break;
        }
        t.row.add( [
            '<input type="text"  class="form-control" required> <div class="invalid-feedback">This field is requered</div>',
            type,
            '<input type="text"  class="form-control" required> <div class="invalid-feedback">This field is requered</div>'
        ] ).draw( false );
    } );

    // Automatically add a first row of data
    $('#addRow').click();
} );

// Form validation:
(function () {
        "use strict";
        window.addEventListener('load',function () {
            var form = document.getElementById("newItemForm");
            form.addEventListener('submit',function (ev) {
                if(form.checkValidity() === false){
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            } , false);
        } ,false);

    }
)();
function checkname(){
    //var list =  document.getElementById('itemType');
    var ckecklist_name = document.getElementById('checklist_title');
    var btn_newitem = document.getElementById('newitem');
    var res;
    if(ckecklist_name.value == ''){
        ckecklist_name.className  = 'form-control head_inputs is-invalid';
        btn_newitem.disabled = true;
        res = false;
        return res;
    }else{
        ckecklist_name.className  = 'form-control head_inputs';
        //btn_newitem.disabled = false;
        res = true;
        return res;
    }
}
function checkselected(){
    var list =  document.getElementById('itemType');
    var btn_newitem = document.getElementById('newtiem');
    var res = checkname();
    if(res == true){
        if(list.value != null){
            document.getElementById('newitem').disabled = false;
        }
    }else{
        document.getElementById('newitem').disabled = true;
    }


}