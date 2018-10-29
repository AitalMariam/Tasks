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
    var t = $('#EditeChecklist').DataTable({
        "paging": false,
    });

    /** New Item **/
    $('#newitem').on( 'click', function ()
    {
        var value = gettype();
        var check = ' ';
        if(value == 1)
            check = 'checked';

        //
        $.ajax({
            url:'Actions/Creat_CheckList.php',
            type: 'GET',
            dataType: 'html',
            data:
                {
                    'checklistId':$('#list_id').val(),
                    'required':requred(),
                    'type':gettype(),
                    'button':'newitem'
                },
            success:function itemid (data) {
                //document.getElementById('itemID').value = data;
                var checkid = 'check'.concat(data);
                var type;
                switch(value)
                {
                    case value='checkbox':
                        type = '<div class="item"> <input type="checkbox" id="'+checkid+'"> <div class="toggle"> <label for="'+checkid+'"><i></i></label></div></div>';
                        break;
                    case value='shortdata':
                        type = '<input type="text" class="form-control" id="shortdata'+data+'" maxlength="10">';
                        break;
                    case value='longdata':
                        type = '<input type="text" class="form-control" id="longdata'+data+'">';
                        break;
                }
                var titleid = 'title'.concat(data);
                var descriptionid = 'description'.concat(data);
                t.row.add( [
                    '<input type="text"  class="form-control" id="'+titleid+'">',
                    type,
                    '<input type="text"  class="form-control" id="'+descriptionid+'">',
                    ' <div class="item">' +
                    '    <input type="checkbox"  id="required'+data+'" '+check+' >' +
                    '    <div class="toggle">' +
                    '      <label for="required'+data+'" ><i></i></label>' +
                    '     </div>' +
                    '</div>',
                    '<button id="submit'+data+'" onclick="submit('+data+')" class="btn btn-success"><i class="fas fa-check"></i></button>',
                    '<button id="submit'+data+'" onclick="deleteitem('+data+')" class="btn btn-danger"><i class="fas fa-trash"></i></button>'
                ] ).node().id = data;
                t.draw( false );
            }
        })/** end New Item **/

        // var itemid = document.getElementById('itemID').value;
        //alert(itemid+' outsiid of XD');
    } );
    // Automatically add a first row of data
    $('#addRow').click();

//END CREAT NEW ITEN FOR CURRENT LIST


//INSERT ROW CONTENT
$(document).ready(function() {
    $('#EditeChecklist').on( 'change', 'tbody tr', function (){
        function checkvalue(rowId){
            var id = "check"+rowId;
            if (document.getElementById(id).checked == true)
                return 'yes';
            else return 'no'; }
        function checkrequired(rowId){
            var id = "required"+rowId;
            if (document.getElementById(id).checked == true){
                if(document.getElementById("check"+rowId)!= null)
                    $('#check'+rowId).prop('required',true);

                if(document.getElementById("longdata"+rowId)!= null)
                    $('#longdata'+rowId).prop('required',true);

                if(document.getElementById("shortdata"+rowId)!= null)
                    $('#shortdata'+rowId).prop('required',true);

             return 1;
            }
            else{
                if(document.getElementById("check"+rowId)!= null)
                    $('#check'+rowId).prop('required',false);

                if(document.getElementById("longdata"+rowId)!= null)
                    $('#longdata'+rowId).prop('required',false);

                if(document.getElementById("shortdata"+rowId)!= null)
                    $('#shortdata'+rowId).prop('required',false);
                return 0;
            }
        }

        //** check type
        function getanswer(rowId) {
            var answer;
            var checkid = "check"+rowId;
            var longdata_id = "longdata"+rowId;
            var shortdata_id = "shortdata"+rowId;
            if(document.getElementById(checkid)!= null){
                answer = checkvalue(rowId);
                return answer;}

            if(document.getElementById(longdata_id)!= null){
                answer = document.getElementById(longdata_id).value;
                return answer;}

            if(document.getElementById(shortdata_id)!= null){
                answer = document.getElementById(shortdata_id).value;
                return answer;}
        }//**end check type

        var rowId = this.id;
        // var checkval = checkvalue(rowId);
        var title = $('#title'.concat(rowId)).val();
        var description = $('#description'.concat(rowId)).val();
        var required = checkrequired(rowId);
        $.ajax({
            url:'Actions/Edite_single_item_fromlist.php',
            type: 'GET',
            dataType: 'text',
            data:
                {
                    'button':'edititem',
                    'title':title,
                    'description':description,
                    'itemid':rowId,
                    'required':required,
                    'answer':getanswer(rowId)
                }
        })
    });
});//END INSERTING

// Submit an item

    $('').on( 'click', function () {
        $.ajax({
            url: 'Actions/Edite_single_item_fromlist.php',
            type: 'GET',
            dataType: 'text',
            data:
                {
                    'button': 'edititem',
                    'title': title,
                    'description': description,
                    'itemid': rowId,
                    'required': required,
                    'answer': getanswer(rowId)
                }
        })
    });
// end Submit item
});

// Submit an item
function submit(itemid) {
    // Validation;
    var title = document.getElementById('title'.concat(itemid));
    var answer;
    /** get answer type **/
    if (document.getElementById('shortdata'.concat(itemid)) != null ){
        answer = 'shortdata'.concat(itemid);
    }
    if (document.getElementById('longdata'.concat(itemid)) != null){
        answer = 'longdata'.concat(itemid);
    }
    if (document.getElementById('check'.concat(itemid)) != null){
        answer = 'check'.concat(itemid);
    }
    /** end get answer type **/

    if($('#'.concat(answer)).prop('required')){
        if(answer == 'check'.concat(itemid)){
            // hna nxofoh wax checked wla la
            if (document.getElementById(answer).checked == false) {
                alert('This answer is required the checkbox must be toggle on ');
            }
        }
        if (answer == 'shortdata'.concat(itemid) || answer == 'longdata'.concat(itemid)) {
            if($('#'.concat(itemid)).val() == ''){
                alert('This answer is required , please answer the question in order to submit');
            }
        }

    }else {
        $.ajax({
            url: 'Actions/Edite_single_item_fromlist.php',
            type: 'GET',
            dataType: 'text',
            data:
                {
                    'button': 'subitem',
                    'itemid': itemid,
                },
        })
        // var row = document.getElementById(itemid);
        //row.parentNode.removeChild(itemid);
        var row = document.getElementById(itemid);
        var table = row.parentNode;
        while ( table && table.tagName != 'TABLE' )
            table = table.parentNode;
        if ( !table )
            return;
        table.deleteRow(row.rowIndex);

    }



}
// end submit item

// delet an item
function deleteitem(itemid) {
     $.ajax({
            url: 'Actions/Edite_single_item_fromlist.php',
            type: 'GET',
            dataType: 'text',
            data:
                {
                    'button': 'deleteitem',
                    'itemid': itemid,
                },
        })


        var row = document.getElementById(itemid);
        var table = row.parentNode;
        while ( table && table.tagName != 'TABLE' )
            table = table.parentNode;
        if ( !table )
            return;
        table.deleteRow(row.rowIndex);

} // delete an item
