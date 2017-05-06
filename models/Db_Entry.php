<?php

/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 5/1/2017
 * Time: 6:23 PM
 */
class Db_Entry
{
   protected $db;

   public function __construct($db)
   {
       $this->db = $db;
   }

   protected function makeStatement($sql, $data = NULL) {
       $statement = $this->db->prepare($sql);
       try {
           $statement->execute($data);
       } catch (Exception $e) {
           $exceptionMsg = "<p>You tried to run this sql: $sql <p>
 <p>Exception: $e</p>";
           trigger_error($exceptionMsg);
       }
       return $statement;
   }
}