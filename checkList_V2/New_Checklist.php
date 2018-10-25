<!doctype html>
<html lang="en">
    <head>
        <title>New CheckList | <?php session_start();  echo $_SESSION['user_id']; ?></title>
        <?php include ('master/MainLinks.php');?>
        <!-- CSS -->
        <link rel="stylesheet" href="ASSETS/CSS/new_checklist.css">
    </head>
    <body>

    <?php //include ('master/NavBar.php');?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 id="card-header-title"><i class="fas fa-plus"></i> Add New List</h3>
                            <button class="btn btn-success" id="save" onclick=""><i class="fas fa-save"></i></button>
                        </div>

                        <div class="card-body">
                            <div class="col-md-6 col-sm-12">
                                <form method="post" action="">
                                    <div class="input-group mb-3">
                                        <input type="text"  onkeydown="checktitle()"  name="listname"  id='checklist_title'  class="form-control head_inputs" placeholder="List Name" aria-describedby="button-addcheck">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="button-addcheck" disabled>Create</button>
                                        </div>
                                    </div>
                                    <input id="checklistID" style="display: none;" value="">
                                    <div class="invalid-feedback">
                                        Please write a title for this list
                                    </div>
                                </form>
                            </div>

                            <div id="cardbody" style="display: none">
                                <div class="col-md-6 col-sm-12 head_inputs">
                                   <!-- <form method="post" action=""> -->
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" id="newitem" disabled name="newitem" >Add new item</button>
                                            </div>
                                            <select class="custom-select" id="itemType" onchange="checkselected()" required>
                                                <option selected disabled>Choose item Type to add</option>
                                                <option value="checkbox">Checkbox</option>
                                                <option value="shortdata">Short data (10 character field)</option>
                                                <option value="longdata">Long Data (Text box)</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please Choice one Type
                                            </div>

                                            <div class="custom-control custom-checkbox my-1 mr-sm-2" style="margin-left:25px">
                                                <input type="checkbox" class="custom-control-input" id="checkItemRequired" onchange="requred()">
                                                <label class="custom-control-label" for="checkItemRequired">Required</label>
                                            </div>
                                        </div>
                                    <!--</form>-->
                                     <br>
                                </div>
                                <form method="POST" id="newItemForm"  class="needs-validation" novalidate>
                                    <table class="table table-striped table-light table-hover" id="example">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Done</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <input type="submit" style="display:none" id="sub_form">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




        <?php include ('master/JSlinks.php');?>
         <!-- Create new list SCRIPT -->

    <script>
        $(document).ready(function() {
            var t = $('#example').DataTable({
                "paging": false,
            });
            /*$('#newitem').on( 'click', function () {
                var value = document.getElementById('itemType').value;
                var type;
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
            $('#addRow').click(); */
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
        /* function checkname(){
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
         }*/
        function checkselected() {
            var list = document.getElementById('itemType');
            var btn_newitem = document.getElementById('newtiem');

            if (list.value != null) {
                document.getElementById('newitem').disabled = false;
            }
            else {
                document.getElementById('newitem').disabled = true;
            }
        }


    </script>
    <script src="ASSETS/JS/CREAT_CHECKLIST.js"></script>

    </body>
</html>