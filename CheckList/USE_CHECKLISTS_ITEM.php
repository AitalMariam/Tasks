<!doctype html>
<html lang="en">
<head>
    <title>Checklist Title</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <!-- CSS -->
    <link rel="stylesheet" href="ASSETS/CSS/singl_checklist.css">
</head>
<body>
<?php include ('master/NavBar.php');?>

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-dark">Done</button>
                        <h3 class="card-title">Special title treatment</h3>
                        <table id="checklist_item" class="table table-striped table-light table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Done</th>
                                <th scope="col">Description </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <div class="item">
                                        <input type="checkbox" id="toggle_today_summary" onchange="test()" checked>
                                        <div class="toggle">
                                            <label for="toggle_today_summary"><i></i></label>
                                        </div>
                                    </div>
                                </td>
                                <td>Otto</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>
                                    <div>
                                        <input type="text" class="form-control">
                                    </div>
                                </td>
                                <td>Thornton</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>
                                    <div>
                                        <input type="text" class="form-control" maxlength="10">
                                    </div
                                </td>
                                <td>the Bird</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('master/JSlinks.php');?>
<script>
    $(document).ready(function() {
        var t = $('#checklist_item').DataTable({
            "paging": false,
        });
    } );
</script>
</body>
</html>
