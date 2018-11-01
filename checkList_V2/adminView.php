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
                                    <th scope="col">Check List </th>
                                    <th scope="col">Users submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    session_start();
                                    foreach ($_SESSION['admin_list'] as $val)
                                    {
                                        echo '<tr><td>'.$val['list_title'].'</td>';
                                        echo '<td>';
                                        foreach ($val['sub_users'] as $user_item)
                                        {
                                            echo '<a href="Actions/userSub.php?list='.$val['list_id'].'?user='.$user_item['id'].'">';
                                            echo $user_item['name'].'</a>';
                                        }
                                        echo'</td></tr>';
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