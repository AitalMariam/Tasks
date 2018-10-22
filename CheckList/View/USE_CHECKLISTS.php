<!doctype html>
<html lang="en">
<head>
    <title>USE CHECKLISTS</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <!-- CSS -->
    <link rel="stylesheet" href="ASSETS/CSS/Checklists.css">
</head>
<body>
    <?php //include ('master/NavBar.php');?>

    <div class="container">
        <div class="row">
            <?php
                session_start();
                $lists = $_SESSION["lists"];
                foreach ($lists as $list)
                {
                    echo '<div class="col-12 col-sm-4 col-md-3 col-lg-3">
                                <a href="USE_CHECKLISTS_ITEM.php">
                                    <div class="card">
                                        <div class="card-body">
                                            <b><span class="check_name"> '.$list['title'].'</span></b>
                                        </div>
                                    </div>
                                </a>
                            </div>';
                }
            ?>
        </div>
        <!--<div class="row">
            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                <a href="USE_CHECKLISTS_ITEM.php">
                    <div class="card">
                        <div class="card-body">
                            <b><span class="check_name"> check list1</span></b>
                        </div>
                    </div>
                </a>
            </div>
        </div>-->


    </div>

    <?php include ('master/JSlinks.php');?>
</body>
</html>
