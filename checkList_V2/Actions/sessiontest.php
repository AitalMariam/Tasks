<?php
if($_SESSION['user_id'] == null)
{
    header("Location: index.php");
}
