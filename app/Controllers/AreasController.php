<?php 
namespace App\Controllers;

use App\Models\AreasModel;

class AreasController extends BaseController
{
    public function __construct(){

		$this->db =db_connect(); // loading database 
		helper('form');

	}
	public function index(){
		$builder = $this->db->table("areas");
		$builder->select('*');
		$areas = $builder->get()->getResult();
		// $areas=array('areas'=>$areas);
		//metodo pager
		$model = new AreasModel();
        $data = [
            'areas' => $model->paginate(10),
            'pager' => $model->pager,
			'pagi_path' => 'sgcc/areas',
			'content' => 'Areas/AreasListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
        return $estructura;
	}

    public function nuevo(){
		$data = [
			'content' => 'Areas/AreasNuevo'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function guardar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'ARENOMBRE'=>$request->getPostGet('txtAreas'),
		);

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

		$data = [
			'areas' => $areas,
			'content' => 'Areas/AreasEditar'
		];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;			
	}

	public function modificar(){
		$AreasModel= new AreasModel($db);
		$request=\Config\Services::request();
		$data=array(
			'AREID'=>$request->getPost('txtCodigo'),
			'ARENOMBRE'=>$request->getPost('txtAreas'),
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
		
		$data = [
			'areas' => $areas,
			'content' => 'Areas/AreasBorrar'
		];
		
		$estructura=	view('Estructura/layout/index', $data);
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

}
