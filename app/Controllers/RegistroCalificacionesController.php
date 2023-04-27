<?php 
namespace App\Controllers;

use App\Models\RegistroCalificacionesModel;
use App\Models\CalificacionesItemsModel;
use App\Models\MatriculasModel;
use App\Models\DocentesModel;
use App\Models\CalificacionesModel;
use App\Models\CursosModel;
use App\Models\EstudianteModel;

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
		$query->select('est.*, rcu.*, mat.MATID');
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
		$request=\Config\Services::request();
		$ESTID = $request->getPostGet('id');
		$MATID = $request->getPostGet('mat');

		$CalificacionesModel = new CalificacionesModel($db);
		$calificacionData = $CalificacionesModel->findAll();

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->find($ESTID);

		$data = [
			'content' => 'RegistroCalificaciones/ListarCalificacion',
			'calificaciones' => $calificacionData,
			'estudiante' => $estudiante,
			'MATID' => $MATID,
			'ESTID' => $ESTID,
		];

		$estructura=	view('Estructura/layout/index', $data);						
        return $estructura;
	}

	public function viewItem() 
	{
		$request = \Config\Services::request();
		$CALID = $request->getPostGet('calificacion');
		$MATID = $request->getPostGet('MATID');
		$ESTID = $request->getPostGet('ESTID');

		$calificacionesItems = $this->db->table("calificacionesitems t1")
        ->join('calificaciones t2', 't2.CALID = t1.CALID')
        ->join('items t3', 't3.ITEID = t1.ITEID ')
		->join('registrocalificaciones registro', 'registro.CITID = t1.CITID', 'left')
		->where('t1.CALID ', $CALID)
		->select('t3.ITENOMBRE, t1.CITPONDERACION,  t1.CITTIPO, registro.RCANOTA, registro.RCAEQUIVALENTE, registro.RCAOBSERVACION, t1.CITID')
        ->get()
        ->getResultArray();	
		
		$data = [
			'calificacionesItems' => $calificacionesItems,
			'fecha_actual' => date('Y-m-d'),
			'MATID' => $MATID,		
			'ESTID' => $ESTID,			
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

		$request=\Config\Services::request();
		$RegistroCalificacionesModel= new RegistroCalificacionesModel($db);
		
		$ESTID = $request->getPostGet('ESTID');
		$MATID = $request->getPostGet('MATID');

		$data=array(
			'MATID'=>$MATID,
			'CITID'=>$request->getPostGet('CITID'),
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
		return redirect()->to(site_url('/RegistroCalificacionesController/indexCalificacion?id='.$ESTID.'&mat='.$MATID ));	
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
