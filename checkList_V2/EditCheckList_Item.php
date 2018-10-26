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
                    <button class="btn btn-success" id="save" onclick="document.getElementById('sub_form').click()"><i class="fas fa-save"></i></button>
                    <button class="btn btn-danger" id="save" style="margin-right:10px"><i class="fas fa-trash"></i></button>
                </div>

                <div class="card-body">
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" value='<?php echo $_GET['name'] ?>'  onkeydown=""  name="listname"  id='checklist_title'  class="form-control head_inputs" placeholder="List Name">
                        </div>
                        <div class="invalid-feedback">
                            Please write a title for this list
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 head_inputs">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" id="newitem" disabled>Add new item</button>
                            </div>
                            <select class="custom-select" id="itemType" onchange="checkselected()" required>
                                <option selected disabled>Choose item Type to add</option>
                                <option value="1">Checkbox</option>
                                <option value="2">Short data (10 character field)</option>
                                <option value="3">Long Data (Text box)</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Choice one Type
                            </div>
                        </div> <br>
                    </div>
                        <table class="table table-striped table-light table-hover" id="EditeChecklist">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Done</th>
                                <th scope="col">Description</th>
                                <th scope="col">Required</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($_SESSION['list_items'] as $item)
                                    {
                                        echo '<tr>
                                                <th scope="row"><input type="text"  class="form-control" value="'.$item['item_title'].'" required> <div class="invalid-feedback" value="Title 1">This field is requered</div></th>
                                                ';
                                        // set data type
                                        echo '<td>';

                                        if(!empty($item['item_answer'][0]))
                                        {
                                            $it = $item['item_answer'][0];
                                            $answer = $it['answer_content'];
                                        }
                                        else
                                            $answer = '';

                                        /**************************************/
                                        // set required or not
                                        function getrequired($item_req){
                                            $required = '';
                                            if($item_req == '1'){
                                                $required = 'required';
                                                return $required;
                                            }else return $required=' ';
                                        }//end set required or not
                                        $required = getrequired($item['item_required']);
                                        $item_id = $item['item_id'];
                                        $checked = 'checked';
                                        if($required != 'required')
                                            $checked = " ";
                                        switch($item['item_datatype'])
                                        {
                                            case $item['item_datatype']='checkbox':
                                                echo '<div class="item"> ';
                                                if( $answer == '1')
                                                    echo '<input type="checkbox" id="check'.$item_id.'" '.$required.' checked>';
                                                else
                                                    echo '<input id="check'.$item_id.'" type="checkbox" '.$required.'> ';
                                                echo '<div class="toggle"> <label for="check'.$item_id.'" ><i></i></label></div></div>';
                                                break;
                                            case $item['item_datatype']='shortdata':
                                                echo '<input type="text" id="shortdata'.$item_id.'" '.$required.' class="form-control" maxlength="10" value='.$answer.'>';
                                                break;
                                            case $item['item_datatype']='longdata':
                                                echo '<input id="longdata'.$item_id.'" '.$required.' type="text" class="form-control" value = '.$answer.'>';

                                        }
                                         echo   '</td><td>
                                                    <input type="text"  class="form-control" value="'.$item['item_description'].'" required> <div class="invalid-feedback">This field is requered</div>
                                                </td>
                                                <td>
                                                    <div class="item">
                                                        <input type="checkbox"  id="required'.$item_id.'" '.$checked.'>  
                                                        <div class="toggle">
                                                            <label for="required'.$item_id.'" ><i></i></label>
                                                        </div>
                                                     </div>
                                                </td>
                                                <td>
                                                    <check type="text"  class="btn btn-danger"><i class="fas fa-trash"></i></check>
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

</body>
</html>
