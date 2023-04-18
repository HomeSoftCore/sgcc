<?php 
namespace App\Controllers;

use App\Models\OpcionesModel;

class OpcionesController extends BaseController
{
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		
		$builder = $this->db->table("opciones");
		$builder->select('*');
		$opciones = $builder->get()->getResult();

        $data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;		
	}

    public function nuevo(){

		$data = [
			'content' => 'Opciones/OpcionNuevo'
        ];

		$estructura=	view('Estructura/layout/index', $data);

		return $estructura;
	}

    public function guardar(){
		$OpcionesModel= new OpcionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
				'OPCNOMBRE'=>$request->getPostGet('txtNombre'),
                'OPCRUTA'=>$request->getPostGet('txtRuta'),
                'OPCESTADO'=>$request->getPostGet('txtEstado'),
                
		);
		
		if($OpcionesModel->insert($data)===false){
			var_dump($OpcionesModel->errors());
		}
		
		return redirect()->to(site_url('/OpcionesController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$OpcionesModel=new OpcionesModel($db);
		$opciones=$OpcionesModel->find($id);
	
		
        $data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionEditar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	

	}

	public function modificar(){
		$OpcionesModel= new OpcionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			
			'OPCNOMBRE'=>$request->getPostGet('txtNombre'),
			'OPCRUTA'=>$request->getPostGet('txtRuta'),
			'OPCESTADO'=>$request->getPostGet('txtEstado'),
			
		);
		$OPCID=$request->getPostGet('txtCodigo');
		
		if($OpcionesModel->update($OPCID,$data)===false){
			var_dump($OpcionesModel->errors());
		}
		return redirect()->to(site_url('/OpcionesController'));	
	}

	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$OpcionesModel=new OpcionesModel($db);
		$opciones=$OpcionesModel->find($id);

		$data = [
			'opciones' => $opciones,
			'content' => 'Opciones/OpcionBorrar'
		];

		$estructura=	view('Estructura/layout/index', $data);							
		return $estructura;			
	}
	
	public function eliminar(){
		$request=\Config\Services::request();
		$OpcionesModel=new OpcionesModel($db);
		$id=$request->getPostGet('txtCodigo');
		$opciones=$OpcionesModel->find($id);
		$opciones=array('opciones'=>$opciones);
		
		if($OpcionesModel->delete($id)===false){
			print_r($OpcionesModel->errors());
		}else{
			$OpcionesModel->purgeDeleted($id);
		}

		return redirect()->to(site_url('/OpcionesController'));	
	}

}
