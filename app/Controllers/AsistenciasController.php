<?php 
namespace App\Controllers;

use App\Models\AsistenciasModel;
use App\Models\DocentesModel;
use App\Models\CursosModel;

class AsistenciasController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}

	public function index()
	{
		$session=session();
		$perfilId=$session->get('perfilId');
		
		$query = $this->db->table("cursos cur");
		$query->join('registrodocente rdo', 'cur.CURID = rdo.CURID');

		if ( $perfilId <> 1 ) {
			$usuCedula=$session->get('usuCedula');
			$docenteModel=new DocentesModel($db);
			$docente=$docenteModel->where('DOCCEDULA', $usuCedula)->first();
			$DOCID = $docente['DOCID'];			
			$query->where('rdo.DOCID =', $DOCID);
		}
		
		$query->select('cur.*, rdo.DOCID');
		$cursos = $query->get()->getResultArray();

		$data = [
			'content' => 'Asistencias/Listar',
			'cursos' => $cursos
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}

	public function indexEstudiantes()
	{	
		$request=\Config\Services::request();
		$CURID = $request->getPostGet('id');

		$query = $this->db->table("matriculas mat");
		$query->join('registrocursos rcu', 'mat.RCUID = rcu.RCUID');
		$query->join('estudiantes est', 'est.ESTID = rcu.ESTID');
		$query->where('rcu.CURID =', $CURID);
		$query->select('est.*, rcu.*, mat.MATID');
		$estudiantes = $query->get()->getResultArray();

		$CursosModel=new CursosModel($db);
        $curso=$CursosModel->find($CURID);

		$data = [
			'content' => 'Asistencias/ListarEstudiantes',
			'estudiantes' => $estudiantes,
			'curso' => $curso,
			'fecha_actual' => date('Y-m-d'),
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}


    public function nuevo()
	{
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');
		$data = [];
		$alumno = $this->db->table("matriculas t1")
								->select('*')
								->join('registrocursos t3 ', 't3.RCUID = t1.RCUID ')
								->join('cursos t4 ', 't4.CURID = t3.CURID ')
								->join('estudiantes t5 ', 't5.ESTID = t3.ESTID ')
								->where('t1.MATID = ', $id)
								->get()->getResultArray();
		$data['alumno'] = $alumno;
		$estructura =	view('Estructura/Header').
						view('Estructura/Menu').
						view('Asistencias/Registrar', $data).
						view('Estructura/Footer');

		return $estructura;
	}

    public function guardar(){
		$AsistenciasModel= new AsistenciasModel($db);
		$request=\Config\Services::request();
		$MATID = $request->getPostGet('MATID');
		
		$data = array(
			'MATID' => $MATID,
			'ASIFECHA'=>$request->getPostGet('fecha'),
			'ASIESTADO'=>$request->getPostGet('asistencia'),
			'ASIOBSERVACION'=>$request->getPostGet('observacion'),
		);
		/*
		if($AsistenciasModel->insert($data)===false){
			var_dump($AsistenciasModel->errors());
		}*/
		$AsistenciasModel->add($data);

		//redirige a metodo index
		return redirect()->to(site_url('/AsistenciasController'));
	}

	public function eliminar(){
		$request = \Config\Services::request();
		$AsistenciaModel = new AsistenciasModel($db);
		$id = $request->getPostGet('id');
		//$asistencia = $AsistenciaModel->find($id);
		if($AsistenciaModel->delete($id)===false){
			print_r($AsistenciaModel->errors());
		}else{
			$AsistenciaModel->purgeDeleted($id);
		}
		//recargar apgina
		return redirect()->to(site_url('/AsistenciasController'));	
	}

}
