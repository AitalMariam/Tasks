<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/Checklists.css">
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <?php
        session_start();
        foreach ($_SESSION['all_submissions'] as $list)
        {
            echo '<div class="col-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="card">
                            <a style="text-decoration:none;" href="Actions/All_Submissions_Item.php?listid='.$list['list_id'].'&title='.$list['list_name'].'"  class="card_link">
                                <div class="card-body">
                                    <b><span class="check_name">'.$list['list_name'].'</span> <br></b>
                                    <div>'.$list['list_creationDate'].'</div>
                                </div>
                            </a>
                        </div>
                    </div>';
        }
        ?>

    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>

