<?php

// AGREGAR PLUGIN FPDF
require_once '../pdf/fpdf.php';
class PDF extends FPDF


{
    
    function Header()
    {
        //LOGO
        //$this->Image('',5,5,20);
        //TIPO DE FUENTE, Stylo, TAMAÑO
        $this->SetFont('Times', '', 15);
        //MOVERSE A LA DERECHA
        $this->Cell(80);
        //TITULO
        $this->Image("../images/bootstrap_logo_icon.png", 10,8,15,15);
        $this->Ln(20);
        $this->SetFillColor(232,232,232);
        $this->Cell(204,7 ,utf8_decode ('INFORMACIÓN GENERAL ACTA DE CALIFICACIONES'), 0,1,'C', true);
        
        
        
        //SALTO DE PAGINA
        $this->Ln(4);
        
        
    }
    
    
    function Footer() 
    {
        //POSICION:
        $this->SetY(-15);
        //TIPO DE FUENTE, ESTILO Y TAMAÑO
        $this->SetFont('Times', '', 8);
        //NUMERO DE PAGINA
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        
    }
   
}