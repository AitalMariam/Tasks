<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/Checklists.css">
</head>
<body>
<?php //include ('master/NavBar.php');?>
<?php session_start(); $lists = $_SESSION['Edit_list_items']; ?>
<div class="container">
    <div class="row">

        <?php
            foreach ($lists as $item)
            {
                echo ' <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                    <a href="Actions/GetListItems.php?name='.$item["title"].'&id='.$item['id'].'">
                    <div class="card">
                        <div class="card-body">
                            <b><span class="check_name"> '.$item["title"].'</span> </b>
                        </div>
                    </div>
                    </a>
                </div>';
            }
        ?>

    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>
