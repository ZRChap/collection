<?php
include_once(dirname(__FILE__)."/header.php");

if(isset($_POST['deleteSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        for ($i = 0; $i <= count($checked) -1; $i++) {
            $colId = "$checked[$i]";
            $int = intval($colId);
            $db->deleteRow('DELETE FROM collection WHERE collection.collection_id =' . "$int" . '');
            header('Location:http://localhost/collection/addpage.php?recordDeleted');
        }
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');
        }

}

if(isset($_POST['editSubmit'])) {
    $checked = $_POST['checkboxes'];
    if(!empty($checked)) {
        echo "checked";
    } else {
        header('Location:http://localhost/collection/addpage.php?noSelect');  
        }
}