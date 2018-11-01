$(document).ready(function() {

    var t = $('#usechecklist').DataTable({
        "paging": false,
        "searching": false
    });

} );


function saveSub()
{

    var isvalid;
    //var values = new Array();


    $('#usechecklist tr').each(function() {

        var rowid = this.id;
        //console.log(rowid);
        // get answerID
        var answerID;
        if(document.getElementById("check".concat(rowid)) != null){
            answerID = 'check'.concat(rowid);
            //console.log(answerID);
        }
        if (document.getElementById("shortdata".concat(rowid)) != null) {
            answerID = 'shortdata'.concat(rowid);
            //console.log(answerID);
        }
        if (document.getElementById("longdata".concat(rowid)) != null) {
            answerID = 'longdata'.concat(rowid);
            //console.log(answerID);
        }

        /***-----------------------------------------*/
      if (answerID == 'check'.concat(rowid))
      {
            if ($('#'.concat(answerID)).prop('required')){
                //alert($('#'.concat(answerID)+': Required'));
                if (!$('#'.concat(answerID)).is(':checked')){
                    alert('must be toggle on');
                    isvalid = false;
                    return false;
                }
            }
            else{

                isvalid = true;
                return true;
            }
                //answers.push($('#'.concat(answerID)).is('checked'));
      }
      else
      {
          if (answerID == 'shortdata'.concat(rowid))
          {
              if ($('#'.concat(answerID)).prop('required'))
              {
                  if($('#shortdata'.concat(rowid)).val() == ''){
                      $( "#".concat(answerID) ).addClass( "is-invalid" );
                      isvalid = false;
                      return false;
                    }else {
                          isvalid = true;
                          return true;
                          }
              }
          }
          if (answerID == 'longdata'.concat(rowid)){
              if ($('#'.concat(answerID)).prop('required'))
              {
                  if($('#shortdata'.concat(rowid)).val() == ''){
                      $( "#".concat(answerID) ).addClass( "is-invalid" );
                      isvalid = false;
                      return false;
                  }else {
                      isvalid = true;
                      return true;
                  }
              }
              }

      }

      //for(var i=0;i<answers.length;i++)
          //console.log(answers[i])

        // hna kateeml ajax
        //katsard lista

            // if (!this.rowIndex) return; // skip first row
        // ERR if type is Checkbox
       // var content = this.cells[1].children[0].val();
        //values.push(content);
        //alert(content);
    });
    // insert to db
    var result = new Array();
    alert(isvalid);
    if (isvalid == true)
    {
        $('#usechecklist tr').each(function() {
            var rowid = this.id;
            var answerID;
            if(document.getElementById("check".concat(rowid)) != null){
                answerID = 'check'.concat(rowid);
                //console.log(answerID);
            }
            if (document.getElementById("shortdata".concat(rowid)) != null) {
                answerID = 'shortdata'.concat(rowid);
                //console.log(answerID);
            }
            if (document.getElementById("longdata".concat(rowid)) != null) {
                answerID = 'longdata'.concat(rowid);
                //console.log(answerID);
            }
            var answer;
            //**** *******
            if (answerID == 'check'.concat(rowid))
            {
                if($('#'.concat(answerID)).is(':checked')){
                    answer = 'YES'
                }

                else {
                    answer = 'NO';
                }
            }
            if (answerID == 'shortdata'.concat(rowid)){
                answer = $('#shortdata'.concat(rowid)).val();
            }
            if (answerID == 'longdata'.concat(rowid)){
                answer = $('#longdata'.concat(rowid)).val();
            }
            /**** insert to db **/
            result.push([answer,rowid]);
            /*** end insert to db ***/
            console.log('4 ech row');

        });
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
            success: function () {
                window.location.replace("home.php");
            }
        });

    }




}