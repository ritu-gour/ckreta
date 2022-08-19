<?php
/**
 * Created by PhpStorm.
 * User: Ankit
 * Date: 11/29/2018
 * Time: 7:50 PM
 */

class Common
{
  public function getCountry($conn)
  {
      $mainQuery = "SELECT * FROM countries";
      $result1 = $conn->query($mainQuery) or die("Error in main Query".$conn->error);
      return $result1;
  }

  public function getStateByCountry($conn,$countryId){
      $query = "SELECT * FROM states WHERE countryId='$countryId'";
      $result = $conn->query($query) or die("Error in  Query".$conn->error);
      return $result;
  }

  public function getCityByState($conn,$stateId){
      $query = "SELECT * FROM tb_cities WHERE state_id='$stateId'";
      $result = $conn->query($query) or die("Error in  Query".$conn->error);
      return $result;
  }
}