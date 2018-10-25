<!doctype html>
<html lang="en">
<head>
    <title>Manage Check Lists</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/new_checklist.css">
</head>
<body>
<?php //include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <?php $listname = $_GET['name'];?>
                    <h3 id="card-header-title"><i class="fas fa-edit"></i> Edit List <strong><?php echo $listname ?></strong></h3>
                    <button class="btn btn-success" id="save" onclick="document.getElementById('sub_form').click()"><i class="fas fa-save"></i></button>
                    <button class="btn btn-danger" id="save" style="margin-right:10px"><i class="fas fa-trash"></i></button>
                </div>

                <div class="card-body">
                    <div class="col-md-6 col-sm-12">

                        <div class="invalid-feedback">
                            Please write a title for this list
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 head_inputs">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" id="newitem" disabled>Add new item</button>
                            </div>
                            <select class="custom-select" id="itemType" onchange="checkselected()" required>
                                <option selected disabled>Choose item Type to add</option>
                                <option value="1">Checkbox</option>
                                <option value="2">Short data (10 character field)</option>
                                <option value="3">Long Data (Text box)</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Choice one Type
                            </div>
                        </div> <br>
                    </div>
                    <form method="POST" id="newItemForm"  class="needs-validation" novalidate>
                        <table class="table table-striped table-light table-hover" id="EditeChecklist">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Done</th>
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><input type="text"  class="form-control" value="title 1" required> <div class="invalid-feedback" value="Title 1">This field is requered</div></th>
                                <td>
                                    <div class="item"> <input type="checkbox" id="toggle_today_summary" checked> <div class="toggle"> <label for="toggle_today_summary"><i></i></label></div></div>
                                </td>
                                <td>
                                    <input type="text"  class="form-control" value="this is desception " required> <div class="invalid-feedback">This field is requered</div>
                                </td>
                                <td>
                                    <button type="text"  class="btn btn-success" style="margin-right:10px"><i class="fas fa-save"></i></button>
                                    <button type="text"  class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="submit" style="display:none" id="sub_form">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include ('master/JSlinks.php');?>
<script src="ASSETS/JS/EditChecklist%20-%20Copy.js"></script>

</body>
</html>
