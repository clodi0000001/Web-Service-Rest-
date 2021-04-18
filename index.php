<?php
    include('./db/Student.php');
    $body = file_get_contents("php://input");
    $js_decoded = json_decode($body, true);

    $student = new Student();

    $student->_name = $js_decoded["_name"];
    $student->_surname = $js_decoded["_surname"];
    $student->_sidiCode = $js_decoded["_sidiCode"];
    $student->_taxCode = $js_decoded["_taxCode"];

    $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    header("Content-Type: application/json");
    echo($js_encode);

?>
