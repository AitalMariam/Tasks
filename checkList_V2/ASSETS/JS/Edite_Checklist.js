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
        rowReorder: true,
        "searching": false
    });

    /** New Item **/
    $('#newitem').on( 'click', function ()
    {
        var value = gettype();
        var title = $('#itemtitle').val();
        var check = ' ';
        if(requred() == 1)
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
                    'title':title,
                    'button':'newitem'
                },
            success:function itemid (data)
            {
                //document.getElementById('itemID').value = data;
                //var checkid = 'check'.concat(data);
                var type;
                switch(value)
                {
                    case value='checkbox':
                        type = 'Checkbox';//'<div class="item"> <input type="checkbox" id="'+checkid+'"> <div class="toggle"> <label for="'+checkid+'"><i></i></label></div></div>';
                        break;
                    case value='shortdata':
                        type = 'Short data';//'<input type="text" class="form-control" id="shortdata'+data+'" maxlength="10">';
                        break;
                    case value='longdata':
                        type =  'Long Data';//'<input type="text" class="form-control" id="longdata'+data+'">';
                        break;
                }
                var titleid = 'title'.concat(data);
                var descriptionid = 'description'.concat(data);
                var countRows = t.rows().count() + 1;
                t.row.add( [
                    '<label>'+countRows+'</label>',
                    '<input value="'+title+'" type="text"  class="form-control" id="'+titleid+'">',
                    '<input type="text"  class="form-control" id="'+descriptionid+'">',
                    type,
                    ' <div class="item">' +
                    '    <input type="checkbox"  id="required'+data+'" '+check+' >' +
                    '    <div class="toggle">' +
                    '      <label for="required'+data+'" ><i></i></label>' +
                    '     </div>' +
                    '</div>',
                   // '<button id="submit'+data+'" onclick="submit('+data+')" class="btn btn-success"><i class="fas fa-check"></i></button>',
                    '<button id="'+data+'" onclick="deleteitem('+data+')" class="btn btn-danger"><i class="fas fa-trash"></i></button>'
                ] ).node().id = data;
                t.draw( false );
            }
        })/** end New Item **/

        // var itemid = document.getElementById('itemID').value;
        //alert(itemid+' outsiid of XD');
    } );
    // Automatically add a first row of data
    $('#addRow').click();

    //ReOrder
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
    });


    //INSERT ROW CONTENT
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
});
//END INSERTING




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
