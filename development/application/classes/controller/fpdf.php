<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Fpdf extends Controller_Core_Frontend {

	public function before()
	{
		parent::before();
		$this->simple = TRUE;
	}

	public function action_index()
	{
		$this->response->headers("Content-Type", "application/pdf");
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(40,10,utf8_decode('Hello, world!'));
		$pdf->Output();
	}

}
