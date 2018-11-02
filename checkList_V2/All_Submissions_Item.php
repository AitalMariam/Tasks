<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/All_Submissions.css">
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="display:inline"><?php session_start();echo $_GET['title']; ?></h3>

                </div>
                <div class="card-body">
                    <table id="usechecklist" class="table table-striped table-light table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Description </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($_SESSION['all_submissions_items'] as $item)
                        {
                            echo '<tr>
                                    <th scope="row"> '.$item["item_title"].'</th>';
                            if (empty($item["item_answer"])){
                                echo '<td><b> No answer </b></td>';
                            }else
                                echo '<td><b> '.$item["item_answer"].'</b></td>';

                            if (empty($item["item_description"])){
                                echo '<td> No Description  </td>';
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
<?php include ('master/JSlinks.php');?>
<script>
    $('#deletCheck').tooltip()
    $('.delet_item').tooltip()
</script>
</body>
</html>
