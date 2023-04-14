<?php 
namespace App\Controllers;

use App\Models\PagosModel;
use App\Models\MatriculasModel;
//fix error Class 'Dompdf\Cpdf' not found
require_once APPPATH . 'ThirdParty' . DIRECTORY_SEPARATOR . 'dompdf' . DIRECTORY_SEPARATOR . 'autoload.inc.php'; 

class PagosController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); 
		helper('form');
	}
	public function index()
	{
        //data pagos
        $query = ("
        SELECT
            p.MATID, p.PAGFECREGPAGO, p.PAGESTADO, 
            p.PAGESTADO, p.PAGCUOTA, p.FORMAPAGO, 
            p.NUMDOCPAGO, p.PAGID,
            m.MATCUOTAS, c.CURNOMBRE, e.ESTNOMBRE
        FROM pagos as p
            LEFT JOIN matriculas m ON m.MATID = p.MATID
            LEFT JOIN registrocursos rc ON rc.RCUID = m.RCUID
            LEFT JOIN cursos c ON c.CURID = rc.CURID
            LEFT JOIN estudiantes e ON rc.ESTID = e.ESTID
        ");
        $pagosPendientes=$this->db->query($query);
        $pagosPendientes->getResultArray();
        $data = [];
        $data['pagosPendientes'] = $pagosPendientes;

        //return vista
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Pagos/pendientes',$data).
						view('Estructura/Footer');
        return $estructura;
	}

    public function registrarPago(){

        $PagosModel= new PagosModel($db);
        $MatriculasModel=new MatriculasModel($db);
		$request=\Config\Services::request();
        //data post
        $pagoId = $request->getPost('pagoId');
        $formaPago = $request->getPost('formaPago');
        $numeroDocumento = $request->getPost('numeroDocumento');
        //insert pago
		$data = array(
			//'PAGID' => $pagoId,
			'FORMAPAGO' => $formaPago,
            'NUMDOCPAGO' => $numeroDocumento,
            'PAGESTADO' => 'CANCELADO'
		);
       
		if($PagosModel->update($pagoId, $data)===false){
			var_dump($PagosModel->errors());
		}
      

		//redirige a pagos pendientes
		return redirect()->to(site_url('/PagosController'));
    }

    public function generarFactura(){

        $PagosModel= new PagosModel($db);
		$request=\Config\Services::request();
        $pagoId = $request->getPostGet('id');
        $query = ("
        SELECT
            p.MATID, p.PAGFECREGPAGO, p.PAGESTADO, 
            p.PAGESTADO, p.pagoCuota, p.FORMAPAGO, 
            p.NUMDOCPAGO, p.PAGID,
            m.MATCUOTAS, c.CURNOMBRE, e.ESTNOMBRE
        FROM pagos as p
            LEFT JOIN matriculas m ON m.MATID = p.MATID
            LEFT JOIN registrocursos rc ON rc.RCUID = m.RCUID
            LEFT JOIN cursos c ON c.CURID = rc.CURID
            LEFT JOIN estudiantes e ON rc.ESTID = e.ESTID
        WHERE p.PAGID = ").$pagoId . " and p.PAGESTADO = 'CANCELADO' ";
        $pagosPendientes=$this->db->query($query)
                                    ->getResultArray();
        
        $data['pago'] = $pagosPendientes;
		//invocar dompdf
		$dompdf = new \Dompdf\Dompdf(array('enable_remote' => true)); 
		//carga el template dompdf
		$dompdf->loadHtml(view('Pagos/factura', $data));
		//set paramatros pdf
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		//retorna pdf download
		$dompdf->stream('FACTURA.pdf');
    }
}