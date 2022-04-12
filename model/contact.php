<?php

class Contact
{
   private $conn;
   private $table = 'contact';
      
   public function __construct($db)
   {
      $this->conn = null;
      $this->conn = $db;
   }

   public function insert($firstname,$lastname,$email,$subject,$message)
   {
         $sql = "
            INSERT INTO `$this->table` (`id`, `firstname`, `lastname`, `email`, `subject`, `message`) VALUES (NULL, '$firstname', '$lastname', '$email', '$subject', '$message');         
         ";
         $result = $this->conn->run_query($sql);
         return $result;
   }

   //Read all
   public function read()
   {
      $sql = "SELECT * FROM $this->table";
      $result = $this->conn->result_array($sql);
      return $result;
   }

   //Read sivgle
   public function read_single($id)
   {
      $sql = "SELECT * FROM $this->table WHERE id = $id LIMIT 0,1";
      $result = $this->conn->result_array($sql);
      return $result;
   }

   public function been_contacted()
   {
      $sql = "SELECT count(*) as been_contacted FROM $this->table";
      $result = $this->conn->result_array($sql);
      return $result[0]['been_contacted'];
   }

}
