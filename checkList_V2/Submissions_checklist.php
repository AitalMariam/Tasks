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
<div class="container">
    <div class="row">
        <?php
            session_start();
            foreach ($_SESSION['view_by_list'] as $list)
            {
                echo '<div class="col-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="card">
                            <a  class="card_link">
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
