<?php defined('BASEPATH') OR exit('No direct script access allowed');
    require_once(dirname(__FILE__) . '/dompdf-3.0.0/autoload.inc.php');
    
    use Dompdf\Dompdf;
    use Dompdf\Options;

    class Pdf extends Dompdf {
        protected function ci() {
            return get_instance();
        }
        
        public function load_view($view, $data = array()){
            $html = $this->ci()->load->view($view, $data,TRUE);
            $this->load_html($html);
        }
    }
?>