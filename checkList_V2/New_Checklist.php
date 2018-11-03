<!doctype html>
<html lang="en">
    <head>
        <title>New CheckList | <?php session_start();  include ('Actions/sessiontest.php');  echo $_SESSION['user_id']; ?></title>
        <?php include ('master/MainLinks.php');?>
        <!-- CSS -->
        <link rel="stylesheet" href="ASSETS/CSS/new_checklist.css">
    </head>
    <body>
    <?php include ('master/NavBar.php');?>


    <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 id="card-header-title"><i class="fas fa-plus"></i> Add New List</h3>
                            <a href="home.php"><button class="btn btn-success" id="save" onclick=""><i class="fas fa-save"></i></button></a>
                        </div>

                        <div class="card-body">
                            <div class="col-md-6 col-sm-12">
                                <form method="post" action="">
                                    <div class="input-group mb-3" id="add_section">
                                        <input type="text"  onkeydown="checktitle()"  name="listname"  id='checklist_title'  class="form-control head_inputs" placeholder="List Name" aria-describedby="button-addcheck">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="button-addcheck" disabled>Create</button>
                                        </div>
                                    </div>
                                    <input id="checklistID" style="display: none;" value="">
                                </form>
                            </div>

                            <div id="cardbody" style="display:none">
                                <div class="col-md-6 col-sm-12 head_inputs">
                                   <!-- <form method="post" action=""> -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="itemtitle" placeholder="Item title" onkeyup="checkselected()">
                                    </div>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="itemType" onchange="checkselected()" style="border-radius: 50px;">
                                            <option selected disabled>Choose item Type to add</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option value="shortdata">Short data (10 character field)</option>
                                            <option value="longdata">Long Data (Text box)</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                            <input type="checkbox" class="custom-control-input"  id="checkItemRequired" onchange="requred()">
                                            <label class="custom-control-label" for="checkItemRequired">Required</label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                            <button class="btn btn-primary" id="newitem" disabled name="newitem" >Add new item</button>
                                    </div>
                                    <!--</form>-->
                                     <br>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-light table-hover" id="example">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Position</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Required</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <input type="submit" style="display:none" id="sub_form">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




        <?php include ('master/JSlinks.php');?>
         <!-- Create new list SCRIPT -->

    <script>
        function checkselected() {
            //var list = document.getElementById('itemType');
            //var btn_newitem = document.getElementById('newtiem');

            if ($('#itemtitle').val() == '' || $('#itemType').val() == null) {
                document.getElementById('newitem').disabled = true;
            }
            else {
                document.getElementById('newitem').disabled = false;
            }
        }
    </script>
    <script src="ASSETS/JS/CREAT_CHECKLIST.js"></script>

    </body>
</html>