<?php
    require_once('hospitallogin.php');

    $conn = get_conn();

    $doctor_id = $_POST["doctorid"];
    $hospital = $_POST["hospitalid"];
    $patient_id = $_POST["patientid"];

    $query = "delete from $hospital where patientid='$patient_id'";
    $conn->query($query);
    $conn->close();
    echo $query;

?>
   