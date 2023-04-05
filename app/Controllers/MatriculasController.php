<?php 
namespace App\Controllers;

use App\Models\RegistroCursosModel;
use App\Models\MatriculasModel;
use App\Models\PagosModel;

class MatriculasController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{

		$matriculasData = $this->db->table("matriculas t1")
        ->join('registrocursos t2', 't2.RCUID = t1.RCUID')
		->join('cursos t3', 't2.CURID = t3.CURID')
		->join('estudiantes t4', 't2.ESTID = t4.ESTID')
		->join('pagos t5', 't1.MATID = t5.MATID')
		->get();
       foreach ($matriculasData->getResult() as $matriculas) {
			$pagos = $this->db->table("pagos")
			->where('MATID', $matriculas->MATID)->orderBy('PAGFECREGPAGO', 'DESC')
			->get()->getResultArray();

			$matriculas->pagos = $pagos;
		}
		$data['matriculas'] = $matriculasData->getResultArray();
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Matriculas/listar', $data).
						view('Estructura/Footer');
        return $estructura;

	}

	public function pendientes()
	{

		//metodo pager
		$model = new RegistroCursosModel();
		$data = [
			'matriculas' => $model->paginatePendientes(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/MatriculasController/pendientes'
		];
		//$data['matriculas'] = $matriculasData;
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Matriculas/pendientes', $data).
						view('Estructura/Footer');
        return $estructura;
	}

	public function matriculaPendiente(){

		$request=\Config\Services::request();
		$id = $request->getPostGet('id');
		$pendiente = $this->db->table("registrocursos t1")
		->join('cursos t2', 't1.CURID = t2.CURID')
		->join('estudiantes t3', 't3.ESTID  = t1.ESTID')
		->where('t1.RCUID', $id)
        ->get()
        ->getResultArray();

		$estudiante = '';
		$idCurso = "";
		foreach ($pendiente as $p) {
			$estudiante 	= $p['ESTNOMBRE'];
			$idCurso 		= $p['RCUID'];
			$precioCurso 	= $p['CURPRECIO'];
		}
		$data['estudiante'] = $estudiante;
		$data['idCurso'] 	= $idCurso;
		$data['pendiente'] = $pendiente;
		$data['precioCurso'] = $precioCurso;
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Matriculas/matricular',$data).
						view('Estructura/Footer');
		return $estructura;			
	}


	public function matricularAlumno(){

		$request=\Config\Services::request();
		$MatriculasModel = new MatriculasModel();
		$RegistroCursosModel = new RegistroCursosModel();
		$PagosModel = new PagosModel();
		//get data
		$idCurso = $request->getPostGet('idCurso');
		$precioCurso = $request->getPostGet('precioCurso');
		$tipoPago = $request->getPostGet('tipoPago');
		$numeroCuotas = $request->getPostGet('numeroCuotas');
		$fecha = $request->getPostGet('fecha');
		$estadoMatricula = $request->getPostGet('estadoMatricula');
		$estado = "ACTIVO";
		$valorCuota = $precioCurso / $numeroCuotas;
		//add data matriculas
		$data = array(
			'RCUID' => $idCurso,
			'MATTIPPAGO' => $tipoPago,
			'MATCUOTAS' => $numeroCuotas,
			'MATFECHA' => $fecha,
			'MATESTPAGO' => $estadoMatricula,
			'MATESTADO' => $estado
		);
		$MatriculasModel->add($data);
		$idMatricula = $this->db->insertID();

		//add data pagos
		$mesProximo = "";
		$contador = 0;
		if($numeroCuotas > 1){
			for ($i = 1; $i <= $numeroCuotas; $i++) {
				$data = array(
					'MATID' => $idMatricula,
					'PAGFECHA' => $fecha,
					'PAGFECREGPAGO' => date("Y-m-d",strtotime($fecha."+ ".$i." month")) ,
					'PAGESTADO' => 'PENDIENTE',
					'pagoCuota' => $valorCuota
				);
				$PagosModel->add($data);
			}
		}else{
			$data = array(
				'MATID' => $idMatricula,
				'PAGFECHA' => $fecha,
				'PAGFECREGPAGO' => $fecha,
				'PAGESTADO' => 'PENDIENTE',
				'pagoCuota' => $valorCuota
			);
			$PagosModel->add($data);
		}
		
		//update estado registro cursos
		$dataRegistroCurso = array(
			'RCUESTADO'=> 'INACTIVO'
		);
		if($RegistroCursosModel->update($idCurso,$dataRegistroCurso)===false){
			var_dump($RegistroCursosModel->errors());
		}
		return redirect()->to(site_url('/MatriculasController'));
	}

}
