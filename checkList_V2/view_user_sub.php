<!doctype html>
<html lang="en">
<head>
    <title>Checklist Title</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php session_start(); include ('Actions/sessiontest.php'); ;include ('master/MainLinks.php');?>
    <!-- CSS -->
    <link rel="stylesheet" href="ASSETS/CSS/singl_checklist.css">
</head>
<body>
<?php include ('master/AdminNavBar.php');?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $_GET['list'] ?></h3>
                        <table id="usechecklist" class="table table-striped table-light table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Answer</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($_SESSION['answers_list_by_user'] as $item)
                                    {
                                        echo '<tr>
                                           <th scope="row"> '.$item["item_title"].'</th>';
                                        if (empty($item["item_answer"])){
                                            echo '<td><small>No answer</small></td>';
                                        }else
                                            echo '<td><b> '.$item["item_answer"].'</b></td>';

                                        if (empty($item["item_description"])){
                                            echo '<td> <small>No Description </small> </td>';
                                        }else
                                            echo ' <td>'.$item["item_description"].' </td>
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
