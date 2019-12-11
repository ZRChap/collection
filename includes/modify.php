<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['deleteSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');
    }

}

if(isset($_POST['editSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        
    }
}