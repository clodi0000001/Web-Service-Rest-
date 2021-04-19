<?php
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
$method = $_SERVER["REQUEST_METHOD"];
//$method = 'DELETE';
//$method = 'POST';
//$method = 'PUT';
include('./db/Student.php');
$student = new Student();

switch($method) {
  case 'GET':
    $id = $_GET['id'];
    if (isset($id)){
      $student = $student->find($id);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    }else{ 
      $students = $student->all();
      $js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
    }
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'POST':
    $body = file_get_contents("php://input");
    $js_decoded = json_decode($body, true);
    $student->_name = $js_decoded["_name"];
    $student->_surname = $js_decoded["_surname"];
    $student->_sidiCode = $js_decoded["_sidiCode"];
    $student->_taxCode = $js_decoded["_taxCode"];
    $student = $student->insert();
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'DELETE':
      $id = $_GET['id'];
      if (isset($id)){
        $student = $student->delete($id);
        $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      }
      header("Content-Type: application/json");
      echo($js_encode);
    break;

  case 'PUT':
    $id = $_GET['id'];
    if (isset($id)){
      $student = $student->update($id);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    }
    break;

  default:
     $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
     $response['body'] = null;
    break;
}
?>