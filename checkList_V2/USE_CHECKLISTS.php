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
    <?php include ('master/NavBar.php');?>

    <div class="container">
        <div class="row">
            <?php
            session_start();
            include ('Actions/sessiontest.php');
            foreach ($_SESSION['use_check_list'] as $item)
            {
                echo '
                            <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                              <form>
                                  <a href="Actions/Use_item.php?list='.$item['id'].'&name='.$item['title'].'">
                                      <div class="card">
                                          <div class="card-body">
                                              <b><span class="check_name"> ';
                echo $item['title'];
                echo '</span></b>
                                          </div>
                                      </div>
                                  </a>
                              </form>
                            </div>';
            }
            ?>
        </div>
    </div>

    <?php include ('master/JSlinks.php');?>
</body>
</html>
