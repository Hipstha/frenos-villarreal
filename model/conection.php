<?php

  class conection{

    private $host;
    private $user;
    private $pass;
    private $db;

    function __construct( $host="localhost", $user="root", $pass="", $db="tallerdb" ) {
  		$this->host = $host;
  		$this->user = $user;
      $this->pass = $pass;
      $this->db = $db;
  	}

    private function createConection(){
      $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
      return $mysqli;
    }

    public function check(){
      $mysqli = $this->createConection();
      if($mysqli){
        echo "si jala";
      }else{
        echo "no jala";
      }
    }

    public function getAdmin($user, $pass){
      $mysqli = $this->createConection();
      $pass = md5($pass);
      $sql = "SELECT * FROM admin WHERE user = '".$user."' AND password = '".$pass."'" ;
      $result = $mysqli->query($sql);
      $return = $result->fetch_assoc();
      return $return;
    }

    public function getSchedule($idSchedule=null){
      $mysqli = $this->createConection();
      if(isset($idSchedule)){
        $sql = "SELECT*FROM schedule WHERE id=".$idSchedule;
        $result = $mysqli->query($sql);
        $return = $result->fetch_assoc();
      }else{
        $sql = "SELECT*FROM schedule";
        $result = $mysqli->query($sql);
        $return = $result->fetch_all();
      }
      return $return;
    }

    public function updateSchedule($idSchedule, $schedule){
      $mysqli = $this->createConection();
      $sql = "UPDATE schedule SET schedule = '".$schedule."' WHERE id = '".$idSchedule."'";
      if($mysqli->query($sql)===TRUE){
        return 1;
      }else{
        return 0;
      }
    }

    public function getServices(){
      $mysqli = $this->createConection();
      $sql = "SELECT*FROM services";
      $result = $mysqli->query($sql);
      $return = $result->fetch_all();
      return $return;
    }

    public function getStatus(){
      $mysqli = $this->createConection();
      $sql = "SELECT*FROM status";
      $result = $mysqli->query($sql);
      $return = $result->fetch_all();
      return $return;
    }

    public function setOrder($clientName, $adminId, $serviceId, $statusId, $notes){
      $mysqli = $this->createConection();
      $sql = "INSERT INTO orders (clientName, admin_id, services_id, status_id, notes) VALUES ('".$clientName."', '".$adminId."', '".$serviceId."', '".$statusId."', '".$notes."')";
      if($mysqli->query($sql)===TRUE){
        return 1;
      }else{
        return 0;
      }
    }

    public function getOrders($idOrder=null){
      $mysqli = $this->createConection();
      if($idOrder!=null){
        $sql1 = "SELECT * FROM orders WHERE id='".$idOrder."'";
      }else{
        $sql1 = "SELECT * FROM orders ORDER BY id DESC";
      }
      $sql2 = "SELECT * FROM services";
      $sql3 = "SELECT * FROM status";
      $result1 = $mysqli->query($sql1);
      $return1 = $result1->fetch_all();
      $result2 = $mysqli->query($sql2);
      $return2 = $result2->fetch_all();
      $result3 = $mysqli->query($sql3);
      $return3 = $result3->fetch_all();
      $orders = array();
      foreach ($result1 as $key => $ordVal) {
        $serviceId = $ordVal['services_id'];
        $statId = $ordVal['status_id'];
        foreach ($return2 as $key => $serVal) {
          if($serVal[0]==$serviceId){
            $serArray = array(
              "id" => $serVal[0],
              "service" => $serVal[1],
            );
          }
        }
        foreach ($return3 as $key => $staVal) {
          if($staVal[0] == $statId){
            $staArray = array(
              "id" => $staVal[0],
              "status" => $staVal[1],
            );
          }
        }
        $orderArray = array(
          "id" => $ordVal['id'],
          "client" => array(
            "id" => $ordVal['id'],
            "name" => $ordVal['clientName'],
          ),
          "service" => $serArray,
          "status" => $staArray,
          "note" => $ordVal['notes'],
        );
        array_push($orders, $orderArray);
      }
      return $orders;
    }

    public function deleteOrder($idOrder){
      $mysqli = $this->createConection();
      $sql = "DELETE FROM orders WHERE id='".$idOrder."'";
      if($mysqli->query($sql)===TRUE){
        echo 1;
      }else{
        echo 0;
      }
    }

    public function updateOrder($idOrder, $client, $idService, $note, $idStatus){
      $mysqli = $this->createConection();
      $sql = "UPDATE orders SET clientName = '".$client."', services_id = '".$idService."', status_id = '".$idStatus."', notes = '".$note."' WHERE id = '".$idOrder."'";
      if($mysqli->query($sql)===TRUE){
        echo 1;
      }else{
        echo 0;
      }
    }

  }

 ?>
