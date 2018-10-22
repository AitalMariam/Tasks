<?php

require_once '..\Operations\CheckLists.php';
session_start();
    // get all checklists
$listoperations = new CheckLists();
$result = $listoperations->getAll();

if($result == 'ERR')
{
    // alert ==> There s no lists yet to display
    header('Location: ..\View\home.php');
}
else
    header('Location: ..\View\USE_CHECKLISTS.php');
