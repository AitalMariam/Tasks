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
                $.notify("The Check List "+$('#checklist_title').val()+" Was Created Successfully","success")
                $('#add_section').remove();
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
        case value='shortdata':
                type = 'shortdata';
            break;
        case value='longdata':
                type = 'longdata';
            break;
    }
    return type;
}

$(document).ready(function() {
    var t = $('#example').DataTable({
        "paging": false,
        rowReorder: true,
        "searching": false,
        responsive: true
    });
    var itemOrder = 0;
    $('#newitem').on( 'click', function ()
    {
        var value = gettype();
        var title = $('#itemtitle').val();
        itemOrder = itemOrder + 1;

        $.ajax({
            url:'Actions/Creat_CheckList.php',
            type: 'GET',
            dataType: 'html',
            data:
            {
                'checklistId':$('#checklistID').val(),
                'required':requred(),
                'type':gettype(),
                'title': title,
                'button':'newitem'
            },
            success:function itemid (data) {
                // hna jib id w sf
                //document.getElementById('itemID').value = data;
                var type;
                var checked = '';
                if(requred() == true)
                    checked = 'checked';
                switch(value)
                {
                    case value='checkbox':
                        type ='CheckBox';//'<div class="item"> <input type="checkbox" id="'+checkid+'" disabled> <div class="toggle"> <label for="'+checkid+'"><i></i></label></div></div>';

                        break;
                    case value='shortdata':
                        type = 'Short';//'<input type="text" class="form-control" id="shortdata'+data+'" maxlength="10" disabled>';
                        break;
                    case value='longdata':
                        type = 'Long Data';//'<input type="text" class="form-control" id="longdata'+data+'" disabled>';
                        break;
                }
                var titleid = 'title'.concat(data)
                var descriptionid = 'description'.concat(data)
                t.row.add( [
                    '<label>'+itemOrder+'</label>',
                    '<input type="text"  value="'+title+'"  class="form-control" id="'+titleid+'">',
                    '<input type="text"  class="form-control" id="'+descriptionid+'">',
                    type,
                    '<div class="item"><input type="checkbox" id="required'+data+'" '+checked+'> <div class="toggle"> <label for="required'+data+'"><i></i></label></div></div>',

                ] ).node().id = data;
                t.draw( false );
            }
        })

    } );

    // Automatically add a first row of data
    $('#addRow').click();

    // reorder
    t.on( 'row-reorder', function ( e, diff, edit ) {
        var pos = new Array();
        for (var i = 1; i < e.target.rows.length; i++) {
            //var id = e.target.rows[i].cells[0].innerHTML.split('<label>');
            pos.push(e.target.rows[i].id);
        }


        $.ajax({
            url:'Actions/ReOrder.php',
            type: 'GET',
            dataType: 'html',
            data:
                {
                    'position':pos
                },
        })
    } );
});
//END CREAT NEW ITEN FOR CURRENT LIST


//INSERT ROW CONTENT
/**
 *
 */
$(document).ready(function() {
    $('#example').on( 'change', 'tbody tr', function (){

        function requred2(rowId){
            if ($('#required'.concat(rowId)).is(':checked'))
                return 1;
            else return 0;

        }
        var rowId = this.id;
       // var checkval = checkvalue(rowId);
        var title = $('#title'.concat(rowId)).val();
        var description = $('#description'.concat(rowId)).val();
        $.ajax({
            url:'Actions/Creat_CheckList.php',
            type: 'GET',
            dataType: 'text',
            data:
            {
                'button':'edititem',
                'title':title,
                'description':description,
                'itemid':rowId,
                'required':requred2(rowId)
                /*'answer':getanswer(rowId)*/
            }
        })
    });
});

//END INSERTING
