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
    });
    var itemid = 0;
    $('#newitem').on( 'click', function ()
    {
        var value = gettype();
        itemid = itemid + 1;
        //
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
            }
        })
        //
        var checkid = 'check'.concat(itemid)
        var type;
        switch(value)
        {
            case value='checkbox':
                type = '<div class="item"> <input type="checkbox" class="'+checkid+'" id="toggle_today_summary"> <div class="toggle"> <label for="toggle_today_summary"><i></i></label></div></div>';
                break;
            case value='shortdata':
                type = '<input type="text" class="form-control '+checkid+'" maxlength="10" required> <div class="invalid-feedback">This field is required</div>';
                break;
            case value='longdata':
                type = '<input type="text" class="form-control '+checkid+'" required> <div class="invalid-feedback">This field is required</div>';
                break;
        }
        var titleid = 'title'.concat(itemid)
        var descriptionid = 'description'.concat(itemid)
        t.row.add( [
            '<input type="text"  class="form-control title" id="'+titleid+'"  required> <div class="invalid-feedback">This field is required</div>',
            type,
            '<input type="text"  class="form-control description" id="'+descriptionid+'" required> <div class="invalid-feedback">This field is required</div>'
        ] ).node().id = itemid;
        t.draw( false );
    } );

    // Automatically add a first row of data
    $('#addRow').click();
});
//END CREAT NEW ITEN FOR CURRENT LIST


//INSERT ROW CONTENT
/**
 * ERR 1 - action not receiving the data
 * Issue 2 - if check var in data is a checkbox , it passed only 'ON'
 * Datatable Issue in reinitialise
 */
$(document).ready(function() {
    $('#example').on( 'change', 'tbody tr', function (){
        var rowId = this.id
        alert($('.check'.concat(rowId)).val())
        $.ajax({
            url:'Actions/Creat_CheckList.php',
            type: 'GET',
            dataType: 'text',
            data:
            {
                'button':'edititem',
                'title':$('#title'.concat(rowId)).val(),
                'description':$('#description'.concat(rowId)).val(),
                'itemid':rowId,
                'check':$('.check'.concat(rowId)).val()
            }
        })
    });
});

//END INSERTING
