<form method="post" id="make_pdf" action="create_pdf.php">
    <input type="hidden" name="hidden_html" id="hidden_html" />
    <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Make PDF</button>
   </form>

<?php

//pdf.php

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf{

 public function __construct(){
  parent::__construct();
 }
}

?>
<?php

//create_pdf.php


include('pdf.php');

if(isset($_POST["hidden_html"]) && $_POST["hidden_html"] != '')
{
 $file_name = 'google_chart.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html .= $_POST["hidden_html"];

 $pdf = new Pdf();
 $pdf->load_html($html);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}

?>