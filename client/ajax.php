<?php
include('../conn/config.php');
include_once "Common.php";
if (isset($_POST['getStateByCountry']) == "getStateByCountry") {
    $countryId = $_POST['countryId'];
    $common = new Common();
    $states = $common->getStateByCountry($conn,$countryId);
    $stateData = '<option value="">State</option>';
    if ($states->num_rows>0){
        while ($state = $states->fetch_object()) {
            $stateData .= '<option value="'.$state->id.'">'.$state->statename.'</option>';
        }
    }
    echo "test^".$stateData;
}
if (isset($_POST['getCityByState']) == "getCityByState") {
    $stateId = $_POST['stateId'];
    $common = new Common();
    $cities = $common->getCityByState($conn,$stateId);
    $cityData = '<option value="">City</option>';
    if ($cities->num_rows>0){
        while ($city_n = $cities->fetch_object()) {
            $cityData .= '<option value="'.$city_n->id.'">'.$city_n->city_name.'</option>';
        }
    }
    echo "test^".$cityData;
}