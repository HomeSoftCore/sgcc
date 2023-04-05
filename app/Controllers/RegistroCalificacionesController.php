<?php 
namespace App\Controllers;

use App\Models\RegistroCalificacionesModel;
use App\Models\CalificacionesItemsModel;
use App\Models\MatriculasModel;

class RegistroCalificacionesController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		//listado registro calificaciones
		$calificaciones = $this->db->table("registrocalificaciones t1")
									->select('*')
									->join('matriculas t2', ' t1.MATID  = t2.MATID ')
									->join('registrocursos t3 ', 't3.RCUID = t2.RCUID ')
									->join('cursos t4 ', 't4.CURID = t3.CURID ')
									->join('estudiantes t5 ', 't5.ESTID = t3.ESTID ')
									->join('areas t6 ', 't4.AREID = t6.AREID ')
									->get()->getResultArray();
		$data['calificaciones'] = $calificaciones;
		//listado alumnos
		$listadoAlumnos = $this->db->table("matriculas t1")
									->select('*')
									->join('registrocursos t2', 't2.RCUID = t1.RCUID')
									->join('cursos t3', 't2.CURID = t3.CURID')
									->join('estudiantes t4', 't2.ESTID = t4.ESTID')
									->get()->getResultArray();
		$data['listadoAlumnos'] = $listadoAlumnos;
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('RegistroCalificaciones/Listar', $data).
						view('Estructura/Footer');
        return $estructura;
	}

	public function nuevo(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		//listado items
		$listadoItems = $this->db->table("calificacionesitems t1")
									->select('*')
									->join('items t3', 't1.ITEID = t3.ITEID')
									->get()->getResultArray();
		$data['listadoItems']= $listadoItems;
		//alumno 
		$alumno = $this->db->table("matriculas t1")
									->select('*')
									->join('registrocursos t2', 't2.RCUID = t1.RCUID')
									->join('cursos t3', 't2.CURID = t3.CURID')
									->join('estudiantes t4', 't2.ESTID = t4.ESTID')
									->where('t1.MATID = ', $id )
									->get()->getResultArray();
		foreach($alumno as $a){
			$estudiante = $a['ESTNOMBRE'];
			$curso = $a['CURNOMBRE'];
		}			
		$data['estudiante'] = $estudiante;
		$data['matriculaId']= $id;
		$data['curso']= $curso;
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('RegistroCalificaciones/Registrar', $data).
						view('Estructura/Footer');
		return $estructura;			
	}

	public function guardar(){

		$RegistroCalificacionesModel= new RegistroCalificacionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			'MATID'=>$request->getPostGet('MATID'),
			'CITID'=>$request->getPostGet('item'),
			'RCAFECHA'=>$request->getPostGet('fecha'),
			'RCANOTA'=>$request->getPostGet('nota'),
			'RCAEQUIVALENTE'=>$request->getPostGet('equivalente'),
			'RCAOBSERVACION'=>$request->getPostGet('observacion'),
			'RCAESTADO'=>'ACTIVO',
		);
		
		if($RegistroCalificacionesModel->add($data)===false){
			var_dump($RegistroCalificacionesModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/RegistroCalificacionesController'));	
	}

	public function eliminar(){

		$request=\Config\Services::request();
		$RegistroCalificacionesModel = new RegistroCalificacionesModel($db);
		$id = $request->getPostGet('id');
		
		if($RegistroCalificacionesModel->delete($id)===false){
			print_r($RegistroCalificacionesModel->errors());
		}else{
			$RegistroCalificacionesModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/RegistroCalificacionesController'));	
	}

}
