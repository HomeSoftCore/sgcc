<?php 
namespace App\Controllers;

use App\Models\RegistroCalificacionesModel;
use App\Models\CalificacionesItemsModel;
use App\Models\MatriculasModel;
use App\Models\DocentesModel;
use App\Models\CalificacionesModel;
use App\Models\CursosModel;

class RegistroCalificacionesController extends BaseController
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
			'content' => 'RegistroCalificaciones/Listar',
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
		$query->select('est.*, rcu.*');
		$estudiantes = $query->get()->getResultArray();

		$CursosModel=new CursosModel($db);
        $curso=$CursosModel->find($CURID);

		$data = [
			'content' => 'RegistroCalificaciones/ListarEstudiante',
			'estudiantes' => $estudiantes,
			'curso' => $curso,
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}	

	public function indexCalificacion()
	{	
		// $request=\Config\Services::request();
		// $CURID = $request->getPostGet('id');

		$CalificacionesModel = new CalificacionesModel($db);
		$calificacionData = $CalificacionesModel->findAll();

		$data = [
			'content' => 'RegistroCalificaciones/ListarCalificacion',
			'calificaciones' => $calificacionData
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}

	public function viewItem() 
	{
		$request = \Config\Services::request();
		$CALID = $request->getPostGet('calificacion');

		$calificacionesItems = $this->db->table("calificacionesitems t1")
        ->join('calificaciones t2', 't2.CALID = t1.CALID')
        ->join('items t3', 't3.ITEID = t1.ITEID ')
		->where('t1.CALID ', $CALID)
        ->get()
        ->getResultArray();	
		
		$data = [
			'calificacionesItems' => $calificacionesItems
		];		

		$html = view('RegistroCalificaciones/tableItemsCalificaciones', $data);

		echo json_encode(array(
			"status" => TRUE,
			"html" => $html
		));		

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
