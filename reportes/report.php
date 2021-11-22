<?php
    include "../fpdf/fpdf.php";

    $doc=new FPDF("L","mm",array(280,160));
    // (L vertical p horizontal)(tamaño)

    include("../modelo/conexion.php");
    $bd = conectar();


    $id=$_GET['id'];

   
    $sql = "SELECT *from reporte where id='$id'";
    $result = mysqli_query($bd,$sql);
    $nomina = mysqli_fetch_row($result);

    $doc->AddPage();// adiccionar pagina
    
    $doc->SetFillColor(17, 127, 224);
    $doc->Rect(0,0, 280, 30, 'F');
    
    $doc->SetFont('Arial', 'B', 30);
    $doc->SetTextColor(255,255,255);
    $doc->SetXY(25,10);
    $doc->Write(5, 'Comprobante de Pago');

    $doc->Image('../imagen/logo.png',200,10,50);
    
    $doc->SetFont('Arial', '', 14);
    $doc->SetTextColor(0,0,0);

    $doc->SetXY(20,40);
    $doc->Write(5, 'Nombres');
                $doc->SetXY(60,40);
                $doc->Write(5, $nomina[1]);

    $doc->SetXY(20,50);
    $doc->Write(5, 'Cedula');
                $doc->SetXY(60,50);
                $doc->Write(5, $nomina[2]);
                $fechaActual=(date("d"))." / ".date("m")." / ".date("Y");

    $doc->SetXY(150,40);
    $doc->Write(5, 'Fecha:'.$fechaActual);


    $serial="ABE00".$nomina[2]."000";
    $doc->SetXY(150,50);
    $doc->Write(5, 'Serie: '.$serial);

    $doc->SetXY(150,60);
    $doc->Write(6, 'Firma: _____________________');
    //$doc->Line(0,70,280,70);



    $doc->SetXY(20,60);
    $doc->Write(5, 'Cargo');
                $doc->SetXY(60,60);
                $doc->Write(5, $nomina[3]);

    $doc->Line(0,70,280,70);
    
    $doc->SetXY(50,75);
    $doc->SetFontSize(20);
    $doc->Write(5, 'Devengados');
    $doc->Line(00,82,280,82);


    $doc->SetFontSize(14);
    $doc->SetXY(20,85);
    $doc->Write(5, 'Salario Basico');
                $doc->SetXY(80,85);
                $doc->Write(5, $nomina[4]);

    $doc->SetXY(20,93);
    $doc->Write(5, 'Alimentacion');
                $doc->SetXY(80,93);
                $doc->Write(5, $nomina[6]);

    $doc->SetXY(20,101);
    $doc->Write(5, 'Auxilio Transporte');
                $doc->SetXY(80,101);
                $doc->Write(5, $nomina[8]);

    $doc->SetXY(20,109);
    $doc->Write(5, 'Auxilio Vivienda');
                $doc->SetXY(80,109);
                $doc->Write(5, $nomina[7]);

    $doc->SetXY(20,117);
    $doc->Write(5, 'Bonificaciones');
                $doc->SetXY(80,117);
                $doc->Write(5, $nomina[5]);

    $doc->SetXY(20,125);
    $doc->Write(5, 'Horas Extras');
                $doc->SetXY(80,125);
                $doc->Write(5, $nomina[9]);

    $doc->SetFont('Arial','B',14);
    $doc->SetXY(20,133);            
    $doc->Write(6, 'Total a Pagar');
                $doc->SetXY(200,133);
                $doc->Write(5, $nomina[19]);

    $doc->SetFont('Arial', '', 14);
    $doc->SetFontSize(20);
    $doc->SetXY(170,75);
    $doc->Write(5, 'Descuento');

    $doc->SetFontSize(14);
            
    $doc->SetXY(130,85);
    $doc->Write(5, 'Arl');
                $doc->SetXY(165,85);
                $doc->Write(5, '%'.$nomina[10]);

                $doc->SetXY(200,85);
                $doc->Write(5,$nomina[14]);

    $doc->SetXY(130,93);
    $doc->Write(5, 'Salud');
                $doc->SetXY(165,93);
                $doc->Write(5, '%'.$nomina[11]);

                $doc->SetXY(200,93);
                $doc->Write(5, $nomina[15]);

    $doc->SetXY(130,101);
    $doc->Write(5, 'Pension');
                $doc->SetXY(165,101);
                $doc->Write(5, '%'.$nomina[12]);

                $doc->SetXY(200,101);
                $doc->Write(5, $nomina[16]);

    $doc->SetXY(130,109);
    $doc->Write(5, 'Parafiscal');
                $doc->SetXY(165,109);
                $doc->Write(5, '%'.$nomina[13]);

                $doc->SetXY(200,109);
                $doc->Write(5, $nomina[17]);

    $doc->SetFont('Arial','B',14);
    $doc->SetXY(130,125);
    $doc->Write(6, 'Total Descuentos');
                $doc->SetXY(200,125);
                $doc->Write(5, $nomina[18]);

    $doc->SetFillColor(17, 127, 224);
    $doc->Rect(0,142, 280, 10, 'F');
    
    $doc->SetTextColor(255,255,255);

    

    $doc->Output();



?>

