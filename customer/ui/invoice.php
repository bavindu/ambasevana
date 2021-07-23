<?php 

    session_start();
    require_once('../includes/dbh.inc.php');
    require_once('./components.php');
    require_once('../includes/functions.inc.php');


    require('../fpdf183/fpdf.php');

    $pdf = new FPDF();
    $pdf ->AddPage();
    $pdf ->SetFont('Arial', 'B', 16);
    $pdf ->Cell(190, 20, 'Invoice - AMBASEWANA RESTAURANT ', 1, 0, 'C');
    $pdf ->Output();





?>