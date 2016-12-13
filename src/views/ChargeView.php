<?php

namespace roommates\hw5\views;
require_once 'vendor/autoload.php';
use roommates\hw5\resources as A;

/**
* This class renders the landing page to the website. 
*/
class ChargeView implements view{
	

	/**
	* This function spits out the html for the landing page of the website
	*
	* @param array $data Relational array holding any runtime infomation needed to render the page
	* @return null
	*/
	function render($data){
		$mysql = new \roommates\hw5\models\Model();
		$result = $mysql->select($_GET['hash']);
		
		?>
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="src/styles/style.css">
			</head>
			<body>
				Payment successfully charged
				<br>
				<h1>Check out this cool PDF of your wish</h1>
				<?php 
					ob_start();
					
					$userName = $result["UserName"];
					
					$height = 10;
					$imageNumber = $result["fountain"];
					$source = 'src/resources/fountain_' . $imageNumber . '.jpg';
					$wish = $result["wish"];
					$coin = 'coin';
					$fountain_name = 'fountain_name';
					$pdf = new \FPDF();
					$pdf->AddPage();
					$pdf->SetFont('Arial','B',16);

					$pdf->Cell(180,10,$wish,0,1,'C');
					$pdf->Cell(180, 10, $coin,0,1,'C');
					$pdf->Cell(180, 10, $fountain_name,0,1,'C');
					$pdf->Image($source,20 ,50);


					$pdf->Output();
					ob_end_flush();




				 ?>
			</body>
		</html>		
		<?php 
		
	}
	
}