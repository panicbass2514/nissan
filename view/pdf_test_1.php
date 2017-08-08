<?php 

require('../pdf/fpdf.php');


// A4 width : 219mm
// default margin : 10mm each side
// writable horizontal : 219-(10*2)=189

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();

// set font to arial, bold, 14pt
$pdf->SetFont('Arial', 'B', 14);

// Cell (width, height, text, border, end line, [align])

$pdf->Cell(130, 5, 'Experience Share', 0, 0);
$pdf->Cell(59, 5, 'INVOICE', 0, 1);

// set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, '[Street Address]',0 , 0);
$pdf->Cell(59, 5, '', 0, 1);//EOL

$pdf->Cell(130, 5, '[City, Country, ZIP]', 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, '[dd/mm/yyyy]', 0, 1);//EOF

$pdf->Cell(130, 5, 'Phone[+123456789]', 0, 0);
$pdf->Cell(25, 5, 'Invoice #', 0, 0);
$pdf->Cell(34, 5, '[1234567]', 0, 1);//EOF

$pdf->Cell(130, 5, 'Fax[+123456789]', 0, 0);
$pdf->Cell(25, 5, 'Customer ID', 0, 0);
$pdf->Cell(34, 5, '[12345678]', 0, 1);//EOF

// Make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//EOF

// billing address
$pdf->Cell(100, 5, 'Bill to', 0, 1);//EOF

// Add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, '[Name]', 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, '[Company Name]', 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, '[Address]', 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, '[Phone]', 0, 1);

// Make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1);//EOF

// Invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(130, 5, 'Description', 0, 0);
$pdf->Cell(25, 5, 'Taxable', 0, 0);
$pdf->Cell(34, 5, 'Amount', 0, 1);//EOF

$pdf->SetFont('Arial', '', 12);

// Numbers are right-aligned so we give 'R'

$pdf->Cell(130, 5, 'Dildo', 0, 0);
$pdf->Cell(25, 5, '-', 0, 0);
$pdf->Cell(34, 5, '3.50', 0, 1, 'R');//EOF

$pdf->Cell(130, 5, 'Vibrator', 0, 0);
$pdf->Cell(25, 5, '-', 0, 0);
$pdf->Cell(34, 5, '5.30', 0, 1, 'R');//EOF

$pdf->Cell(130, 5, 'Lubricant', 0, 0);
$pdf->Cell(25, 5, '-', 0, 0);
$pdf->Cell(34, 5, '0.53', 0, 1, 'R');//EOF

// Summary
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Subtotal', 0, 0);
$pdf->Cell(4, 5, '$', 0, 0);
$pdf->Cell(30, 5, '450', 0, 1, 'R');

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Taxable', 0, 0);
$pdf->Cell(4, 5, '$', 0, 0);
$pdf->Cell(30, 5, '0', 0, 1, 'R');

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Subtotal', 0, 0);
$pdf->Cell(4, 5, '$', 0, 0);
$pdf->Cell(30, 5, '450', 0, 1, 'R');

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Tax Rate', 0, 0);
$pdf->Cell(4, 5, '$', 0, 0);
$pdf->Cell(30, 5, '10%', 0, 1, 'R');

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Total Due', 0, 0);
$pdf->Cell(4, 5, '$', 0, 0);
$pdf->Cell(30, 5, '4.450', 0, 1, 'R');

$pdf->Output();
?>