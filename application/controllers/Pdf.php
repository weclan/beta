<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

	function __construct()
    {
        parent::__construct();	
        $this->load->helper(array('form'));	
    }
	
	public function index()
	{
		$data = [];
		//load the view and saved it into $html variable
		$html=$this->load->view('welcome_message', $data, true);

        //this the the PDF filename that user will get to download
		$pdfFilePath = "output_pdf_name.pdf";

		include('./resource/lib/mpdf60/mpdf.php');
        $mpdf=new mPDF('','F4','','',15,15,15,16,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        
        $mpdf->Output($pdfFilePath, "D");
        exit;
        
	}

	function show() {
		$data = [];
		$this->load->view('welcome_message', $data, FALSE);
	}
	
}

