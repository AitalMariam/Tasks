$(document).ready(function() {

    var t = $('#usechecklist').DataTable({
        "paging": false,
        "searching": false
    });

} );


function saveSub()
{
    var isvalid = false;
    // validation of data
    $('#usechecklist tr').each(function()
    {
        var rowid = this.id;
        //
        var answerID;
        // type == check
        if(document.getElementById("check".concat(rowid)) != null)
        {
            answerID = 'check'.concat(rowid);
            if ($('#'.concat(answerID)).prop('required'))
            {
                if (!$('#'.concat(answerID)).is(':checked'))
                {
                    alert('must be toggle on');
                    isvalid = false;
                }
                else
                    isvalid = true;
            }
            else
                isvalid = true;

        }
        else
        {
            // type == short data
            if (document.getElementById("shortdata".concat(rowid)) != null)
            {
                answerID = 'shortdata'.concat(rowid);
                if ($('#'.concat(answerID)).prop('required'))
                {
                    if($('#shortdata'.concat(rowid)).val() == '')
                    {
                        $("#".concat(answerID) ).addClass( "is-invalid" );
                        isvalid = false;
                    }
                    else
                        isvalid = true;
                }
                else
                    isvalid = true;
            }
            else
            {
                // type == long data
                if (document.getElementById("longdata".concat(rowid)) != null)
                {
                    answerID = 'longdata'.concat(rowid);
                    if ($('#'.concat(answerID)).prop('required'))
                    {
                        if($('#longdata'.concat(rowid)).val() == '')
                        {
                            $("#".concat(answerID) ).addClass( "is-invalid" );
                            isvalid = false;
                        }
                        else
                            isvalid = true;
                    }
                    else
                        isvalid = true;
                }
            }
        }
    });

    // insertion  to db
    var result = new Array();
    if(isvalid == true)
    {
        // collect answers
        $('#usechecklist tr').each(function()
        {
            var rowid = this.id;
            if(document.getElementById("check".concat(rowid)) != null)
            {
                if($('#'.concat('check'.concat(rowid))).is(':checked'))
                    answer = 'YES';
                else
                    answer = 'NO';

                result.push([answer,rowid])
            }
            else
            {
                if (document.getElementById("shortdata".concat(rowid)) != null)
                {
                    answer = $('#shortdata'.concat(rowid)).val();
                    result.push([answer,rowid])
                }
                else
                {
                    if (document.getElementById("longdata".concat(rowid)) != null)
                    {
                        answer = $('#longdata'.concat(rowid)).val();
                        result.push([answer,rowid])
                    }
                }
            }
        });
    }


    // send data via ajax
    $.ajax({
        url:'Actions/Submit_LIST.php',
        type: 'GET',
        dataType: 'html',
        data:
            {
                'result':result,
                'listid':$('#listid').val()
            },
        async: true,
        success: function ()
        {
            window.location.replace("home.php");
        }
    });
}