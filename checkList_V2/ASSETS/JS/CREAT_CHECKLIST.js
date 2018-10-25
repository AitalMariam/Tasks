// CREAT NEW LIST
function checktitle(){
    var title = document.getElementById('checklist_title').value;
    var btn = document.getElementById('button-addcheck');
    if(title == ''){
        btn.disabled = true;
    }else {
        btn.disabled = false;
    }
}
$('#button-addcheck').click(function () {

        $.ajax({
            url:'Actions/Creat_CheckList.php',
            type: 'GET',
            dataType: 'html',
            data:
                {
                    'title':$('#checklist_title').val(),
                    'button':'creatChecklist'
                },
            async: true,
            success: function(request, error,status) {
                if(error == 'error')
                    alert('error');

                $('#checklistID').val(request)
                $('#cardbody').css('display','block')
                $('#button-addcheck').css('display','none')
            }


});
});
//END CREAT NEW LIST



//CREAT NEW ITEN FOR CURRENT LIST
function requred(){
    if ($('#checkItemRequired').is(':checked'))
        return 1;
    else
        return 0;
}
function gettype(){
    var value = document.getElementById('itemType').value;
    var type;
    switch(value) {
        case value='checkbox':
            type = 'checkbox';
            break;
        case value='short_data':
                type = 'shortdata';
            break;
        case value='long_Data':
                type = 'longdata';
            break;
    }
    return type; }

$('#newitem').click(function () {
    $.ajax({
        url:'Actions/Creat_CheckList.php',
        type: 'GET',
        dataType: 'html',
        data:
            {
                'checklistId':$('#checklistID').val(),
                'required':requred(),
                'type':gettype(),
                'button':'newitem'
            },
        async: true,
        success: function (request, error,status){
            function newitem(respons) {
                alert(respons+'fun called');
                var value = gettype(); //select option
                var type;

                switch(value) {
                    case value='checkbox':
                        type = '<div class="item"> <input type="checkbox" id="checkbox'+respons+'"> <div class="toggle"> <label id="checkbox'+respons+'"><i></i></label></div></div>';
                        break;
                    case value='shortdata':
                        type = '<input type="text" id="shortdata'+respons+'" class="form-control" maxlength="10">';
                        break;
                    case value='longdata':
                        type = '<input type="text" id="longdata'+respons+'" class="form-control">';
                        break;
                }
                var title = '<input type="text" id="title\'+respons+\'"  class="form-control"> <div style="Display:none">respons<div>';
                var desc = '<input type="text" id="descreption\'+respons+\'" class="form-control">';
              /*  t.row.add( [
                    '<input type="text" id="title'+respons+'"  class="form-control"> <div style="Display:none">respons<div>',
                    type,
                    '<input type="text" id="descreption'+respons+'" class="form-control">'
                ] ).draw( false ); */
                $('#example').append('<tr><td>'+title+' </td><td>'+type+'</td><td>'+desc+'</td></tr>');
            }
            // Automatically add a first row of data
            //$('#addRow').click();

            newitem(request);
        }
    })
});
//END CREAT NEW ITEN FOR CURRENT LIST
