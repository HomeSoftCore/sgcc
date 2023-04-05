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

		//metodo pager
		/*$model = new OpcionesModel();
		$data = [
			'opciones' => $model->paginate(10),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/OpcionesController'
		];
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Opciones/OpcionListar',$data).
						view('Estructura/Footer');
        return $estructura;*/



		$builder = $this->db->table("opciones");
		$builder->select('*');
		$opciones = $builder->get()->getResult();
		$opciones=array('opciones'=>$opciones);
		
		$builder = $this->db->table("opciones");
		$builder->select('*');
		$opciones = $builder->get()->getResult();
		$opciones=array('opciones'=>$opciones);
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Opciones/OpcionListar',$opciones).
						view('Estructura/Footer');
        return $estructura;
		
	}

    public function nuevo()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Opciones/OpcionNuevo').
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;
        $builder = $this->db->table("opciones");
		$builder->select('*');
		$opciones = $builder->get()->getResult();
		$opciones=array('opciones'=>$opciones);
		
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
		
		$builder = $this->db->table("opciones");
		$builder->select("*");
		$opciones = $builder->get()->getResult();
		$opciones=array('opciones'=>$opciones);
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Opciones/OpcionListar',$opciones).
						view('Estructura/Footer');
        return $estructura;
		}

		public function editar(){
			$request=\Config\Services::request();
				$id=$request->getPostGet('id');
		
				$OpcionesModel=new OpcionesModel($db);
				$opciones=$OpcionesModel->find($id);
				$opciones=array('opciones'=>$opciones);
				//var_dump($areas);
				$data['opciones']=$opciones;

				$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Opciones/OpcionEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
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
				$opciones=array('opciones'=>$opciones);
				//var_dump($areas);
				$data['opciones']=$opciones;
				$estructura=	view('Estructura/Header').
								view('Estructura/Menu').
								view('Opciones/OpcionBorrar',$data).
								view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
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

	//--------------------------------------------------------------------

}
