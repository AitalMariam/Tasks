<!doctype html>
<html lang="en">
<head>
    <title>HOME | <?php session_start();  echo $_SESSION['user_id']; ?></title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
</head>

<body>

<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="btn_container">
        <div  class="col-12 text-center">
            <a href="Actions/Use_CheckList.php"><button class="btn btn-outline-light btn-lg"><i class="fas fa-clipboard-list"></i>&nbsp; USE CHECKLIST</button></a>
            <a href="Manage_checklists.php"><button class="btn btn-outline-light btn-lg"><i class="fas fa-cogs"></i>&nbsp; MANAGE CHECKLIST</button></a>
        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>
