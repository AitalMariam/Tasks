<!doctype html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/new_checklist.css">
</head>
<body>
<?php //include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="card-header-title"><i class="fas fa-edit"></i> Edit List <strong><?php echo $_GET['name'] ?></strong></h3>
                    <a href="home.php"><button class="btn btn-success" id="save" onclick=""><i class="fas fa-save"></i></button></a>

                    <button class="btn btn-danger" id="save" style="margin-right:10px" onclick="deleteList()"><i class="fas fa-trash"></i></button>
                </div>
                <div class="card-body">
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" value='<?php echo $_GET['name'] ?>'  onkeydown=""  name="listname"  id='checklist_title'  class="form-control head_inputs" placeholder="List Name">
                        </div>
                        <div class="invalid-feedback">
                            Please write a title for this list
                        </div>
                        <input type="text" id="list_id" style="display: none;" value="<?php echo $_GET['list_id'] ?>">
                    </div>
                    <div class="col-md-12 col-sm-12 head_inputs">
                        <!-- <form method="post" action=""> -->
                        <div class="input-group">
                            <input type="text" class="form-control" id="itemtitle" placeholder="Item title" onkeyup="checkselected()">
                            <select class="custom-select" id="itemType" onchange="checkselected()">
                                <option selected disabled>Choose item Type to add</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="shortdata">Short data (10 character field)</option>
                                <option value="longdata">Long Data (Text box)</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Choice one Type
                            </div>
                            <div class="custom-control custom-checkbox my-1 mr-sm-2" style="margin-left:25px">
                                <input type="checkbox" class="custom-control-input"  id="checkItemRequired" onchange="requred()">
                                <label class="custom-control-label" for="checkItemRequired">Required</label>
                            </div>
                            <button class="btn btn-primary" id="newitem" disabled name="newitem" >Add new item</button>

                        </div>
                        <!--</form>-->
                        <br>
                    </div>
                        <table class="table table-striped table-light table-hover" id="EditeChecklist">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Position</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Required</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach ($_SESSION['list_items'] as $item)
                                    {
                                        $i = $i +1 ;
                                        $item_id = $item['item_id'];
                                        echo '<tr id="'.$item_id.'">';
                                        echo '<td><label>'.$i.'</label></td>';
                                        echo      ' <th scope="row"><input type="text" id="title'.$item_id.'"  class="form-control" value="'.$item['item_title'].'" required> <div class="invalid-feedback" value="Title 1">This field is requered</div></th>
                                                ';
                                        echo '<td>
                                                    <input type="text"  class="form-control" id="description'.$item_id.'" value="'.$item['item_description'].'" required> <div class="invalid-feedback">This field is requered</div>
                                               </td>';
                                        // set data type
                                        echo '<td id="'.$item_id.'">';

                                        if(!empty($item['item_answer'][0]))
                                        {
                                            $it = $item['item_answer'][0];
                                            $answer = $it['answer_content'];
                                        }
                                        else
                                            $answer = '';


                                        $required = ' ';
                                        if($item['item_required'] == '1'){
                                            $required = 'required';
                                        }

                                        $checked = 'checked';
                                        if($required != 'required')
                                            $checked = " ";
                                        switch($item['item_datatype'])
                                        {
                                            case $item['item_datatype']='checkbox':
                                                echo 'Check Box';
                                                break;
                                            case $item['item_datatype']='shortdata':
                                                echo 'Short Data';
                                                break;
                                            case $item['item_datatype']='longdata':
                                                echo 'Long Data';
                                                break;

                                        }
                                         echo   '</td>
                                                <td>
                                                    <div class="item">
                                                        <input type="checkbox"  id="required'.$item_id.'" '.$checked.'>  
                                                        <div class="toggle">
                                                            <label for="required'.$item_id.'" ><i></i></label>
                                                        </div>
                                                     </div>
                                                </td>
                                                <td>
                                                    <button id="delete'.$item_id.'" onclick="deleteitem('.$item_id.')"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                                               </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
<script src="ASSETS/JS/Edite_Checklist.js"></script>
<script>
    function checkselected()
    {

        if ($('#itemtitle').val() == '' || $('#itemType').val() == null) {
            document.getElementById('newitem').disabled = true;
        }
        else {
            document.getElementById('newitem').disabled = false;
        }
    }
</script>
<!-- Delete List -->
<script>
    function deleteList()
    {
        if (confirm("Are you sure?") == true)
        {
            // Get list id
            var url = new URL(window.location.href);
            //
            $.ajax({
                url:'Actions/Delete_CheckList.php',
                type: 'GET',
                dataType: 'html',
                data:
                    {
                        'list_id':url.searchParams.get("list_id")
                    },
                success:function () {
                    alert('Deleted !')
                    window.location.href = 'home.php';
                }
            })
        }

    }
</script>
</body>
</html>
