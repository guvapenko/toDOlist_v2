<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'db_config.php';

    $pdf = new tFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);
    $pdo = new dbConnect();
    $result = $pdo->query("SELECT * FROM justdoit ORDER BY id");
    foreach ($result as $value)
    {
        $pdf->Ln();
        foreach ($value as $cell)
        {
            $pdf->Cell(50,10,$cell);
        }
    }
    $pdf->Output();





