<?php 
namespace App\Controllers;

use App\Models\ItemsModel;

class ItemsController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index() {
		$builder = $this->db->table("items");
		$builder->select('*');
		$items = $builder->get()->getResult();
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsListar'			
		];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;		
	}

    public function nuevo() {
		$data = [
			'content' => 'Items/ItemsNuevo'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function guardar(){
		$ItemsModel= new ItemsModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ITENOMBRE'=>$request->getPostGet('txtNombre'),
            'ITEOBSERVACION'=>$request->getPostGet('txtObservacion'),
            'ITEESTADO'=>$request->getPostGet('txtEstado'),
		);
		//var_dump($data);
		if($ItemsModel->insert($data)===false){
			var_dump($ItemsModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/ItemsController'));	
	}

	public function editar(){
		$request=\Config\Services::request();
		$id = $request->getPostGet('id');

		$ItemsModel=new ItemsModel($db);
		$items=$ItemsModel->find($id);
		
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsEditar'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

	public function modificar(){
		$ItemsModel= new ItemsModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ITENOMBRE'=>$request->getPostGet('txtNombre'),
            'ITEOBSERVACION'=>$request->getPostGet('txtObservacion'),
            'ITEESTADO'=>$request->getPostGet('txtEstado'),
		);
		$ITEID=$request->getPost('txtCodigo');
		if($ItemsModel->update($ITEID,$data)===false){
			var_dump($AreasModel->errors());
		}

		//redirige a metodo index
		return redirect()->to(site_url('/ItemsController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$ItemsModel=new ItemsModel($db);
		$items=$ItemsModel->find($id);
		
		$data = [
			'items' => $items,
			'content' => 'Items/ItemsBorrar'
        ];
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$ItemsModel=new ItemsModel($db);
		$id=$request->getPostGet('txtCodigo');
		$items=$ItemsModel->find($id);
		$items=array('opciones'=>$items);
		
		if($ItemsModel->delete($id)===false){
			print_r($ItemsModel->errors());
		}else{
			$ItemsModel->purgeDeleted($id);
		}

		return redirect()->to(site_url('/ItemsController'));	

	}

}
