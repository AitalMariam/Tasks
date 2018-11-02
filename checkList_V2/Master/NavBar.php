<!--NavbBar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Actions/Use_CheckList.php">Use CheckList</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mange Checklist
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="New_Checklist.php">New CheckList</a>
                    <a class="dropdown-item" href="Actions/Edit_CheckList.php">Edit  Checklist</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Actions/All_Submissions.php">View all submission</a>
                    <a class="dropdown-item" href="Actions/view_by_list.php">View by list </a>
                </div>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Log Out</button>
        </div>
    </div>
</nav>
<!--End NavBAR-->