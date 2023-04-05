<?php 
namespace App\Controllers;

use App\Models\AsistenciasModel;

class AsistenciasController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}

	public function index()
	{
		$data = [];
		//asistencias registradas
		$asistencias = $this->db->table("asistencias t1")
								->select('*')
								->join('matriculas t2 ', 't2.MATID = t1.MATID')
								->join('registrocursos t3 ', 't3.RCUID = t2.RCUID ')
								->join('cursos t4 ', 't4.CURID = t3.CURID ')
								->join('estudiantes t5 ', 't5.ESTID = t3.ESTID ')
								->get()->getResultArray();
		$data['asistencias'] = $asistencias;
		//listado alumnos
		$alumnos = $this->db->table("matriculas t1")
								->select('*')
								->join('registrocursos t3 ', 't3.RCUID = t1.RCUID ')
								->join('cursos t4 ', 't4.CURID = t3.CURID ')
								->join('estudiantes t5 ', 't5.ESTID = t3.ESTID ')
								->get()->getResultArray();
		$data['alumnos'] = $alumnos;					
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Asistencias/Listar', $data).
						view('Estructura/Footer');
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




	/*
    public function nuevo()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Areas/AreasNuevo').
						view('Estructura/Footer');

		return $estructura;
	}

    public function guardar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ARENOMBRE'=>$request->getPostGet('txtAreas'),
		);
		//var_dump($data);
		if($AreasModel->insert($data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		//var_dump($areas);
		$data['areas']=$areas;
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Areas/AreasEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;			
	}

	public function modificar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'AREID'=>$request->getPost('txtCodigo'),
			'ARENOMBRE'=>$request->getPost('txtArea'),
		);
		$AREID=$request->getPost('txtCodigo');
		if($AreasModel->update($AREID,$data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$AreasModel=new AreasModel($db);
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		//var_dump($areas);
		$data['areas']=$areas;
		
		$estructura=	view('Estructura/Header').
		view('Estructura/Menu').
		view('Areas/AreasBorrar',$data).
		view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
		return $estructura;		
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$AreasModel=new AreasModel($db);
		$id=$request->getPostGet('txtCodigo');
		$areas=$AreasModel->find($id);
		$areas=array('areas'=>$areas);
		
		if($AreasModel->delete($id)===false){
			print_r($AreasModel->errors());
		}else{
			$AreasModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/AreasController'));	
	}
*/
}
