<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/Manage_Checklist.css">
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="btn_container">
        <div  class="col-12 text-center">
            <a href="New_Checklist.php"><button class="btn btn-outline-light btn-lg"><i class="fas fa-plus"></i>&nbsp; Add New List</button></a>
            <a href="Actions/Edit_CheckList.php"><button class="btn btn-outline-light btn-lg"><i class="fas fa-edit"></i>&nbsp; Edit List</button></a>

            <!--<button class="btn btn-outline-light btn-lg"><i class="fas fa-list-ul"></i>&nbsp; View Submissions</button> -->
            <!-- <img src="assets/img/checklist.svg" id="image"  class="img-fluid"> -->

            <button class="btn btn-outline-light btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul"></i>&nbsp; View Submissions &nbsp;&nbsp;</button>
            <div class="dropdown-menu">
                <a class="dropdown-item"  href="Actions/All_Submissions.php">View All Submissions</a>
                <a class="dropdown-item" href="Actions/view_by_list.php">View by List</a>
            </div>
        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
</body>
</html>
