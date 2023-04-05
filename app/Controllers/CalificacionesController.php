<?php 
namespace App\Controllers;
use App\Models\CalificacionesItemsModel as ciModels;
use App\Models\CalificacionesModel;
use App\Models\ItemsModel as itemModel;

use CodeIgniter\HTTP\IncomingRequest;

class CalificacionesController extends BaseController
{
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
		
	}
	public function index()
	{
		/*
		$builder = $this->db->table("calificaciones");
		$builder->select('*');
		$calificaciones = $builder->get()->getResult();
		$calificaciones=array('calificaciones'=>$calificaciones);*/
		//metodo pager
		/*$model = new CalificacionesModel();
		$data = [
			'calificaciones' => $model->paginate(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/CalificacionesController'
		];
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Calificaciones/CalificacionListar',$data).
						view('Estructura/Footer');
        return $estructura;*/

		$builder = $this->db->table("calificaciones");
		$builder->select('*');
		$calificaciones = $builder->get()->getResult();
		$calificaciones=array('calificaciones'=>$calificaciones);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Calificaciones/CalificacionListar',$calificaciones).
						view('Estructura/Footer');
        return $estructura;
	}

    public function nuevo()
	{
        $builder = $this->db->table("calificaciones");
		$builder->select('*');
		$calificaciones = $builder->get()->getResult();
		$calificaciones=array('calificaciones'=>$calificaciones);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Calificaciones/CalificacionNuevo',$calificaciones).
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
						return $estructura;
	}

    public function guardar(){
		$CalificacionesModel= new CalificacionesModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
				'CALDESCRIPCION'=>$request->getPostGet('txtDescripcion'),
                'CALPUNTAJE'=>$request->getPostGet('txtPuntaje'),
                'CALPUNAPROBACION'=>$request->getPostGet('txtAprobado'),
				'CALESTADO'=>$request->getPostGet('txtEstado'),
                
		);
		
		if($CalificacionesModel->insert($data)===false){
			var_dump($CalificacionesModel->errors());
		}
		
		$builder = $this->db->table("calificaciones");
		$builder->select("*");
		$calificaciones = $builder->get()->getResult();
		$calificaciones=array('calificaciones'=>$calificaciones);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Calificaciones/CalificacionListar',$calificaciones).
						view('Estructura/Footer');
        return $estructura;
		}

		public function editar(){
			$request=\Config\Services::request();
				$id=$request->getPostGet('id');
		
				$CalificacionesModel=new CalificacionesModel($db);
				$calificaciones=$CalificacionesModel->find($id);
				$calificaciones=array('calificaciones'=>$calificaciones);
				//var_dump($areas);
				$data['calificaciones']=$calificaciones;
				
				$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Calificaciones/CalificacionEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;	
		}

		public function modificar(){
			$CalificacionesModel= new CalificacionesModel($db);
			$request=\Config\Services::request();
			$data=array(
				
				'CALDESCRIPCION'=>$request->getPostGet('txtDescripcion'),
                'CALPUNTAJE'=>$request->getPostGet('txtPuntaje'),
                'CALPUNAPROBACION'=>$request->getPostGet('txtAprobado'),
				'CALESTADO'=>$request->getPostGet('txtEstado'),
                
			);
			$CALID=$request->getPostGet('txtCodigo');
			
			if($CalificacionesModel->update($CALID,$data)===false){
				var_dump($CalificacionesModel->errors());
			}
             
			return redirect()->to(site_url('/CalificacionesController'));

		}
	
			public function borrar(){
				$request=\Config\Services::request();
				$id=$request->getPostGet('id');
		
				$CalificacionesModel=new CalificacionesModel($db);
				$calificaciones=$CalificacionesModel->find($id);
				$calificaciones=array('calificaciones'=>$calificaciones);
				//var_dump($areas);
				$data['calificaciones']=$calificaciones;
				
				
				$estructura=	view('Estructura/Header').
								view('Estructura/Menu').
								view('Calificaciones/CalificacionBorrar',$data).
								view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
								return $estructura;	
			}
		
			public function eliminar(){
				$request=\Config\Services::request();
				$CalificacionesModel=new CalificacionesModel($db);
				$id=$request->getPostGet('txtCodigo');
				$calificaciones=$CalificacionesModel->find($id);
				$calificaciones=array('calificaciones'=>$calificaciones);
				
				if($CalificacionesModel->delete($id)===false){
					print_r($CalificacionesModel->errors());
				}else{
					$CalificacionesModel->purgeDeleted($id);
				}
		          
				return redirect()->to(site_url('/CalificacionesController'));	
			}


	public function registrarItems(){

		$request = \Config\Services::request();
		$idCalificacion = $request->getPostGet('id');
		//get data calificacion
		$CalificacionesModel = new CalificacionesModel($db);
		$calificacionData = $CalificacionesModel->find($idCalificacion);
		//get data items
		$ItemsModel = new itemModel($db);
		$itemsData = $ItemsModel->findAll();
		//get data calificaciones-items
		$calificacionesItems = $this->db->table("calificacionesitems t1")
        ->join('calificaciones t2', 't2.CALID = t1.CALID')
        ->join('items t3', 't3.ITEID = t1.ITEID ')
		->where('t1.CALID ', $idCalificacion)
        ->get()
        ->getResultArray();

		
		$data = [];
		$data['calificacion'] = $calificacionData;
		$data['items'] = $itemsData;
		$data['calificacionesItems'] = $calificacionesItems;
		$estructura = view('Estructura/Header') .
		view('Estructura/Menu') .
		view('Calificaciones/RegistrarItems', $data) .
		view('Estructura/Footer');
		return $estructura;	
	}


	public function insertItem(){
		$request = \Config\Services::request();
		$txtCalificacion = $request->getPostGet('txtCalificacion');
		$item = $request->getPostGet('item');
		$CalificacionesItemsModel = new ciModels();
		$data = array(
			'CALID' => $txtCalificacion,
			'ITEID' => $item,
			'CITPONDERACION' => null,
			'CITTIPO' => null,
			'CITESTADO' => null
		);
		$CalificacionesItemsModel->add($data);
		echo json_encode(array(
			"status" => TRUE,
			//"txtCalificacion" => $txtCalificacion,
			//"item" => $item
		));

	}

	public function deleteItem() {
		$request = \Config\Services::request();
		$item = $request->getPostGet('item');
        $CalificacionesItemsModel = new ciModels();
        $CalificacionesItemsModel->delete_item($item);
        echo json_encode(array("status" => TRUE));
    }

}

