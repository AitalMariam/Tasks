<!doctype html>
<html lang="en">
<?php  session_start();  $user = $_SESSION["user"]; ?>

<head>
    <title>HOME | <?php echo $user['name'] ?></title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
</head>

<body>

<?php //include ('master/NavBar.php');?>
<div class="container">
    <div class="btn_container">
        <div  class="col-12 text-center">
            <form method="post" action="..\Actions\UseCheckList.php"><a><button class="btn btn-outline-light btn-lg"><i class="fas fa-clipboard-list"></i>&nbsp; USE CHECKLIST</button></a></form>
            <a href="Manage_checklists.php"><button class="btn btn-outline-light btn-lg"><i class="fas fa-cogs"></i>&nbsp; MANAGE CHECKLIST</button></a>
            <!-- <img src="assets/img/checklist.svg" id="image"  class="img-fluid"> -->
        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>
