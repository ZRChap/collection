<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['deleteSubmit'])) {
$checked = $_POST['checkboxes'];
    if(!empty($checked)) {
     
    }

}

if(isset($_POST['editSubmit'])) {
    $checked = $_POST['checkboxes']; 
    echo "edit button checked";
    print_r($checked);
}