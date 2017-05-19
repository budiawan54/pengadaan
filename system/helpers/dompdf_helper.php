 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Spartan
 * Date: 3/5/2016
 * Time: 7:26 PM
 */
 
use Dompdf\Dompdf;	
function pdf_create($html, $filename='', $stream=TRUE, $orientation = 'portrait') 
{
    require_once("dompdf/autoload.inc.php");
    $dompdf = new Dompdf();
    $dompdf->load_html($html);
    $dompdf->setPaper('F4', $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename);
    } else {
        return $dompdf->output();
    }
}
