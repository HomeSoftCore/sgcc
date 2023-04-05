<?php 
namespace App\Controllers;

use App\Models\DocentesModel;

class DocentesController extends BaseController
{
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		
		
			$builder = $this->db->table("docentes");
			$builder->select('*');
			$docentes = $builder->get()->getResult();
			$docentes=array('docentes'=>$docentes);
			
			$estructura=	view('Estructura/Header').
							view('Estructura/Menu').
							view('Docentes/DocenteListar',$docentes).
							view('Estructura/Footer');
			return $estructura;



			/*//metodo pager
		$model = new DocentesModel();
		$data = [
			'docentes' => $model->paginate(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/DocentesController'
		];
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Docentes/DocenteListar',$data).
						view('Estructura/Footer');
        return $estructura;
	}*/
		}

		

    public function nuevo()
	{
        $builder = $this->db->table("docentes");
		$builder->select('*');
		$docentes = $builder->get()->getResult();
		$docentes=array('docentes'=>$docentes);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Docentes/DocenteNuevo',$docentes).
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;
		
	}

    public function guardar(){
		$DocentesModel= new DocentesModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
			'DOCCEDULA'=>$request->getPostGet('txtCedula'),
			'DOCNOMBRE'=>$request->getPostGet('txtNombre'),
			'DOCTITULO'=>$request->getPostGet('txtTitulo'),
			'DOCTELEFONO'=>$request->getPostGet('txtTelefono'),
			'DOCCORREO'=>$request->getPostGet('txtCorreo'),
			'DOCESTADO'=>$request->getPostGet('txtEstado'),
		);
		
		if($DocentesModel->insert($data)===false){
			var_dump($DocentesModel->errors());
		}
		
		$builder = $this->db->table("docentes");
		$builder->select("*");
		$docentes = $builder->get()->getResult();
		$docentes=array('docentes'=>$docentes);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Docentes/DocenteListar',$docentes).
						view('Estructura/Footer');
        return $estructura;
	}

	public function editar(){
		$request=\Config\Services::request();
			$id=$request->getPostGet('id');
	
			$DocentesModel=new DocentesModel($db);
			$docentes=$DocentesModel->find($id);
			$docentes=array('docentes'=>$docentes);
			//var_dump($areas);
			$data['docentes']=$docentes;
			
			
			$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Docentes/DocenteEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;			
	}

	public function modificar(){
		$DocentesModel= new DocentesModel($db);
		$request=\Config\Services::request();
		$data=array(
					
			'DOCCEDULA'=>$request->getPostGet('txtCedula'),
			'DOCNOMBRE'=>$request->getPostGet('txtNombre'),
			'DOCTITULO'=>$request->getPostGet('txtTitulo'),
			'DOCTELEFONO'=>$request->getPostGet('txtTelefono'),
			'DOCCORREO'=>$request->getPostGet('txtCorreo'),
			'DOCESTADO'=>$request->getPostGet('txtEstado'),
			
			
		);
		$DOCID=$request->getPostGet('txtCodigo');
		
		if($DocentesModel->update($DOCID,$data)===false){
			var_dump($DocentesModel->errors());
		}
		   
		return redirect()->to(site_url('/DocentesController'));
	}

	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$DocentesModel=new DocentesModel($db);
		$docentes=$DocentesModel->find($id);
		$docentes=array('docentes'=>$docentes);
		//var_dump($areas);
		$data['docentes']=$docentes;
		
		$estructura=	view('Estructura/Header').
								view('Estructura/Menu').
								view('Docentes/DocenteBorrar',$data).
								view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
								return $estructura;	
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$DocentesModel=new DocentesModel($db);
		$id=$request->getPostGet('txtCodigo');
		$docentes=$DocentesModel->find($id);
		$docentes=array('estudiadocentesntes'=>$docentes);
		
		if($DocentesModel->delete($id)===false){
			print_r($DocentesModel->errors());
		}else{
			$DocentesModel->purgeDeleted($id);
		}
		
		return redirect()->to(site_url('/DocentesController'));	
	}

	public function dashboardDocente()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('DashboardDocente/DashboardDocente').
						view('Estructura/Footer');
        return $estructura;
	}
}
