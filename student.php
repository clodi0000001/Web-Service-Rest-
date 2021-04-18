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
    }
    if(!isset($id)){ 
      $students = $student->all();
      $js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
    }
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'POST':
    /*
    $id = $_GET['id'];
    $name = $_GET['name'];
    $surname= $_GET['surname'];
    $sidiCode = $_GET['sidiCode'];
    $taxCode = $_GET['taxCode']; */ 
    $id = '2';
    $name = 'Mario';
    $surname= 'Rossi';
    $sidi_Code = '123456';
    $tax_Code = 'QWERTY';
    if (isset($id, $name, $surname, $sidi_Code, $tax_Code)){
      $student = $student->insert($id, $name,$surname,$sidi_Code,$tax_Code);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    }else{
      echo "non inserito";
    }
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'DELETE':
     echo "detele";
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