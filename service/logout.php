<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    session_unset(); 
    session_destroy();
    header('location: ../pages/index.php');
    $response = array(
        'status' => 'success',
        'message' => 'true',
    );
    echo json_encode($response);
}
?>