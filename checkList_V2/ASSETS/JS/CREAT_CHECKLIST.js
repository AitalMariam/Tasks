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

    $('#newitem').on( 'click', function ()
    {
        var value = gettype();

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
            },
            success:function itemid (data) {
                // hna jib id w sf
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
                var titleid = 'title'.concat(data)
                var descriptionid = 'description'.concat(data)
                t.row.add( [
                    '<input type="text"  class="form-control" id="'+titleid+'">',
                    type,
                    '<input type="text"  class="form-control" id="'+descriptionid+'">'
                ] ).node().id = data;
                t.draw( false );
            }
        })

       // var itemid = document.getElementById('itemID').value;
        //alert(itemid+' outsiid of XD');

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
        function checkvalue(rowId){
            var id = "check"+rowId;
            if (document.getElementById(id).checked == true)
                 return 'yes';
            else return 'no'; }


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
                'answer':getanswer(rowId)
            }
        })
    });
});

//END INSERTING
