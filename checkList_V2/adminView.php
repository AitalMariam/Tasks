<!doctype html>
<html lang="en">
<head>
    <title>Admin view</title>
    <?php include ('master/MainLinks.php');?>
    <!-- CSS -->

</head>
<body>
<?php include ('master/NavBar.php');?>
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div id="cardbody" >
                        <table class="table table-striped table-light table-hover" id="example">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Submit Date</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Checklist Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    session_start();
                                    foreach ($_SESSION['admin_list'] as $val)
                                    {
                                        echo '<tr>
                                              <td><a href="Actions/userSub.php?listid='.$val['list_id'].'&userid='.$val['user_id'].'">'.$val['sub_date'].'</a></td>';
                                        echo '<td>'.$val['user_name'].'</td>';
                                        echo '<td>'.$val['list_title'].'</td><tr>';
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




</body>
</html>