<?php
include("config.php");
class Student 
{
  private $db;
  public $_id;
  public $_name;
  public $_surname;
  public $_sidiCode;
  public $_taxCode;

  public function __construct() {
    $this->db = new DBConnection();
    $this->db = $this->db->returnConnection();
  }

  public function find($id){
    $sql = "SELECT * FROM student WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    $data = [
      'id' => $id
    ];
    $stmt->execute($data);
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
  public function all(){
    $sql = "SELECT * FROM student";
    $stmt = $this->db->prepare($sql);
    $stmt->execute($data);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }
  public function insert($id, $name, $surname, $sidi_Code, $tax_Code){
    $sql = " INSERT INTO student
        (id, name, surname, sidi_Code,tax_Code)
    VALUES
        (:id, :name, :surname, :sidi_Code,:tax_Code);";
    $stmt = $this->db->prepare($sql);
    $data =[
      'id' => $id,
      'name' => $name,
      'surname'  => $surname,
      'sidi_Code' => $sidi_Code,
      'tax_Code' => $tax_Code
    ];
    $stmt->execute($data);
  }  

  public function delete($id){
    $sql = "DELETE FROM student WHERE id=:id";
    $stmt = $this->db->prepare($sql);
    $data =" eliminato";
    $stmt->execute($data);
  }

  public function update($id){
    $sql = "UPDATE person SET 
        name = :name,
        surname  = :surname,
        sidi_Code = :sidi_Code,
        tax_Code = :tax_Code
        WHERE id = :id; ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
  }
/*
  public function post($id, $_name,$_surname,$_sidiCode,$_taxCode){
    $sql = "INSERT into student (id, name, surname, sidiCode,taxCode) VALUES ('$_id', '$_name', '$_surname', '$_sidiCode',' $_taxCode')";
    $stmt = $this->db->prepare($sql);
    $data = [
      'id' => $id
    ];
    $stmt->execute($data);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }*/
}
?>
