<?php
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
$method = $_SERVER["REQUEST_METHOD"];
//$method = 'DELETE';
//$method = 'POST';
//$method = 'PUT';
$method = 'GET';
include('./class/Student.php');
$student = new Student();
switch($method) {
  case 'GET':
    /*if (isset($_GET['id'])){
      $id = $_GET['id'];
      $student = $student->find($id);
      //$js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      $js_encode = json_encode(array('student'=>$student),true);
    } else {  */ 
      $student = $student->all();
      //$js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
      $js_encode = json_encode($student);
    //}
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'POST':
    $body = file_get_contents("php://input");
    $js_decoded = json_decode($body, true);
    $student = new Student();
    $student->_name = $js_decoded["name"];
    $student->_surname = $js_decoded["surname"];
    $student->_sidiCode = $js_decoded["sidi_code"];
    $student->_taxCode = $js_decoded["tax_code"];
    $student->insert($student);
    break;

  case 'DELETE':
      $id = $_GET['id'];
      if (isset($id) && $id != ""){
        $student = $student->delete($id);
      }
      $student = $student->all();
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
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