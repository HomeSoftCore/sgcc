<?php 
namespace App\Controllers;

use App\Models\ItemsModel;

class ItemsController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		/*$builder = $this->db->table("items");
		$builder->select('*');
		$items = $builder->get()->getResult();
		$items=array('items'=>$items);*/
		//metodo pager
		$model = new ItemsModel();
		$data = [
			'items' => $model->paginate(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/ItemsController'
		];
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasListar',$areas).view('Estructura/pie');
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Items/ItemsListar',$data).
						view('Estructura/Footer');
        return $estructura;
	}

    public function nuevo()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Items/ItemsNuevo').
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
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
		$items=array('items'=>$items);
		//var_dump($areas);
		$data['items']=$items;
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Items/ItemsEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
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
		$items=array('items'=>$items);
		//var_dump($areas);
		$data['items']=$items;
		
		$estructura=	view('Estructura/Header').
		view('Estructura/Menu').
		view('Items/ItemsBorrar',$data).
		view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
		return $estructura;		
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$ItemsModel=new ItemsModel($db);
		$id=$request->getPostGet('txtCodigo');
		$items=$ItemsModel->find($id);
		$items=array('items'=>$items);
		
		if($ItemsModel->delete($id)===false){
			print_r($ItemsModel->errors());
		}else{
			$ItemsModel->purgeDeleted($id);
		}

		//redirige a metodo index
		return redirect()->to(site_url('/ItemsController'));	
	}

}
