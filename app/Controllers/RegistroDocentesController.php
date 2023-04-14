<?php 
namespace App\Controllers;

use App\Models\RegistroDocentesModel;

class RegistroDocentesController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		$registros = $this->db->table("registrodocente t1")
							->select('*')
							->join('docentes t2', 't1.DOCID  = t2.DOCID ')
							->join('cursos t3', 't3.CURID  = t1.CURID ')
							->get()->getResultArray();

		$data = [
			'content' => 'RegistroDocentes/Listar',
			'registros' => $registros
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;		
	}

	public function nuevo()
	{
		$docentes = $this->db->table("docentes")
							->select('*')
							->get()->getResultArray();
		
		$cursos = $this->db->table("cursos")
						->select('*')
						->get()->getResultArray();

		$data = [
			'content' => 'RegistroDocentes/Registrar',
			'cursos' => $cursos,
			'docentes' => $docentes,
			'fecha_actual' => date('Y-m-d')
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;			
	}


    public function guardar(){

		$RegistroDocentesModel= new RegistroDocentesModel($db);
		$request=\Config\Services::request();
		$data=array(
			'DOCID'=>$request->getPostGet('docente'),
			'CURID'=>$request->getPostGet('curso'),
			'RDOFECHA'=>$request->getPostGet('fecha'),
			'RDOESTADO'=> 'ACTIVO'
		);
		
		if($RegistroDocentesModel->add($data)===false){
			var_dump($RegistroDocentesModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/RegistroDocentesController'));	
	}

	public function eliminar(){

		$request=\Config\Services::request();
		$RegistroDocentesModel=new RegistroDocentesModel($db);
		$id=$request->getPostGet('id');
		
		if($RegistroDocentesModel->delete($id)===false){
			print_r($RegistroDocentesModel->errors());
		}else{
			$RegistroDocentesModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/RegistroDocentesController'));	
	}

	/*
    public function nuevo()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Areas/AreasNuevo').
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
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
