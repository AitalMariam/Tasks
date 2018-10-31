<!doctype html>
<html lang="en">
<head>
    <title>Checklist Title</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <!-- CSS -->
    <link rel="stylesheet" href="ASSETS/CSS/singl_checklist.css">
</head>
<body>
<?php //include ('master/NavBar.php');?>

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-dark">Done</button>
                        <h3 class="card-title"><?php echo $_GET['name']; ?></h3>
                        <table id="usechecklist" class="table table-striped table-light table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Done</th>
                                    <th scope="col">Description </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    session_start();
                                    foreach ($_SESSION['use_list_items'] as $item)
                                {
                                    $item_id = $item['item_id'];
                                    echo '<tr id="'.$item_id.'">
                                                <th scope="row"> '.$item['item_title'].'</th>
                                                ';
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
                                    switch($item['item_datatype'])
                                    {
                                        case $item['item_datatype'] = 'checkbox':
                                            echo '<div class="item">
                                                <input id="check'.$item_id.'" type="checkbox" '.$required.'> 
                                                <div class="toggle"> 
                                                    <label for="check'.$item_id.'" ><i></i></label>
                                                </div>
                                               </div>';
                                            break;
                                        case $item['item_datatype'] = 'shortdata':
                                            echo '<input type="text" id="shortdata'.$item_id.'" '.$required.' class="form-control" maxlength="10">';
                                            break;
                                        case $item['item_datatype'] = 'longdata': echo 'Long Data';
                                            echo '<input id="longdata'.$item_id.'" '.$required.' type="text" class="form-control"';
                                            break;
                                    }
                                    echo   '</td>   
                                         <td>'.$item['item_description'].' </td>
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
</div>

<?php include ('master/JSlinks.php');?>
<script>
    $(document).ready(function() {
        var t = $('#checklist_item').DataTable({
            "paging": false,
        });
    } );
</script>

<script src="ASSETS/JS/USE_CHECKLIST.js"></script>
</body>
</html>
