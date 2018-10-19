<!doctype html>
<html lang="en">
<head>
    <title>New Checklist</title>
    <link rel="stylesheet" href="ASSETS/CSS/index.css">
    <?php include ('master/MainLinks.php');?>
    <link rel="stylesheet" href="ASSETS/CSS/new_checklist.css">
</head>
<body>
<?php include ('master/NavBar.php');?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 id="card-header-title"><i class="fas fa-plus"></i> Add New List</h3>
                    <button class="btn btn-success" id="save" onclick="document.getElementById('sub_form').click()"><i class="fas fa-save"></i></button>
                </div>

                <div class="card-body">
                    <div class="col-md-6 col-sm-12">
                        <input  type="text" class="form-control head_inputs" placeholder="List Name" id='checklist_title' onchange="checkname()" required> <br>
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

                            <div class="custom-control custom-checkbox my-1 mr-sm-2" style="margin-left:25px">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Required</label>
                            </div>
                        </div> <br>
                    </div>
                    <form method="POST" id="newItemForm"  class="needs-validation" novalidate>
                        <table class="table table-striped table-light table-hover" id="New_checklist">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Done</th>
                                <th scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>



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
<script src="ASSETS/JS/NewChecklist.js"></script>
</body>
</html>
