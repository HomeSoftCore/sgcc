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
        $request=\Config\Services::request();
        $id = $request->getPostGet('id');

        $query = ("
        SELECT
            p.MATID
            , p.PAGFECREGPAGO
            , p.PAGESTADO
            , p.PAGESTADO
            , p.PAGCUOTA
            , p.PAGFORMAPAGO as FORMAPAGO
            , p.PAGNUMDOCPAGO AS NUMDOCPAGO
            , p.PAGID
            , m.MATCUOTAS
            , c.CURNOMBRE
            , e.ESTNOMBRE
            , p.PAGNUMCUOTA
        FROM pagos as p
            LEFT JOIN matriculas m ON m.MATID = p.MATID
            LEFT JOIN registrocursos rc ON rc.RCUID = m.RCUID
            LEFT JOIN cursos c ON c.CURID = rc.CURID
            LEFT JOIN estudiantes e ON rc.ESTID = e.ESTID
            WHERE p.MATID = $id
            ORDER BY p.PAGNUMCUOTA
        ");

        $pagosPendientes=$this->db->query($query);
		$data = [
			'pagosPendientes' => $pagosPendientes->getResultArray(),
			'content' => 'Pagos/pendientes'			
		];

		$estructura=	view('Estructura/layout/index', $data);
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
        $MATID = $request->getPost('MATID');
        //insert pago
		$data = array(
			//'PAGID' => $pagoId,
			'PAGFORMAPAGO' => $formaPago,
            'PAGNUMDOCPAGO' => $numeroDocumento,
            'PAGESTADO' => 'CANCELADO'
		);
       
		if($PagosModel->update($pagoId, $data)===false){
			var_dump($PagosModel->errors());
		}
		return redirect()->to(site_url('/PagosController/index?id='.$MATID));
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

    public function indexPagoPendiente() {

        $query = ("
        SELECT 
        mat.MATID
        ,cur.CURNOMBRE
        ,est.ESTNOMBRE
        ,cur.CURPRECIO
        ,mat.MATCUOTAS
        FROM matriculas AS mat
        JOIN registrocursos as regc on mat.RCUID = regc.RCUID
        JOIN cursos AS cur on regc.CURID = cur.CURID
        JOIN estudiantes as est on regc.ESTID = est.ESTID");

        $lv_pago_pendientes = $this->db->query($query);

		$data = [
			'matriculas' => $lv_pago_pendientes->getResult(),
			'content' => 'Pagos/pagoPendientes'			
		];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
    }
}