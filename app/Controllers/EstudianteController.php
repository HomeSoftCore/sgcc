<?php 
namespace App\Controllers;

use App\Models\EstudianteModel;

class EstudianteController extends BaseController
{
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index()
	{
		
		$builder = $this->db->table("estudiantes");
		$builder->select('*');
		$estudiante = $builder->get()->getResult();
		$estudiante=array('estudiantes'=>$estudiante);
		
		//metodo pager
		$model = new EstudianteModel();
		$data = [
			'estudiantes' => $model->paginate(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/EstudianteController',
			//'estudiantes' => $estudiante
		];

		$estructura =	view('Estructura/Header').
						view('Estructura/Menu').
						view('Estudiantes/EstListar',$estudiante).
						view('Estructura/Footer');
		return $estructura;
	}

    public function nuevo()
	{
        $builder = $this->db->table("estudiantes");
		$builder->select('*');
		$estudiante = $builder->get()->getResult();
		$estudiante=array('estudiantes'=>$estudiante);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Estudiantes/EstNuevo',$estudiante).
						view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;
	}

    public function guardar(){
		$EstudianteModel= new EstudianteModel($db);
		$request=\Config\Services::request();
		$data=array(
			    
				'ESTCEDULA'=>$request->getPostGet('txtCedula'),
                'ESTNOMBRE'=>$request->getPostGet('txtNombre'),
                'ESTDIRECCION'=>$request->getPostGet('txtDreccion'),
                'ESTTELEFONO'=>$request->getPostGet('txtTelefono'),
                'ESTCORREO'=>$request->getPostGet('txtCorreo'),
                'ESTESTADO'=>$request->getPostGet('txtEstado'),
		);
		
		if($EstudianteModel->insert($data)===false){
			var_dump($EstudianteModel->errors());
		}
		
		$builder = $this->db->table("estudiantes");
		$builder->select("*");
		$estudiante = $builder->get()->getResult();
		$estudiante=array('estudiantes'=>$estudiante);
		
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('Estudiantes/EstListar',$estudiante).
						view('Estructura/Footer');
        return $estructura;
	}

	public function editar(){
		$request=\Config\Services::request();
			$id=$request->getPostGet('id');
	
			$EstudianteModel=new EstudianteModel($db);
			$estudiante=$EstudianteModel->find($id);
			$estudiante=array('estudiantes'=>$estudiante);
			//var_dump($areas);
			$data['estudiantes']=$estudiante;
			
			
			$estructura=view('Estructura/Header').
						view('Estructura/Menu').
						view('Estudiantes/EstEditar',$data).
						view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
						return $estructura;			
	}

	public function modificar(){
		$EstudianteModel= new EstudianteModel($db);
		$request=\Config\Services::request();
		$data=array(
			
			'ESTCEDULA'=>$request->getPostGet('txtCedula'),
			'ESTNOMBRE'=>$request->getPostGet('txtNombre'),
			'ESTDIRECCION'=>$request->getPostGet('txtDreccion'),
			'ESTTELEFONO'=>$request->getPostGet('txtTelefono'),
			'ESTCORREO'=>$request->getPostGet('txtCorreo'),
			'ESTESTADO'=>$request->getPostGet('txtEstado'),
			
		);
		$ESTID=$request->getPostGet('txtCodigo');
		
		if($EstudianteModel->update($ESTID,$data)===false){
			var_dump($EstudianteModel->errors());
		}
		return redirect()->to(site_url('/EstudianteController'));
		
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->find($id);
		$estudiante=array('estudiantes'=>$estudiante);
		//var_dump($areas);
		$data['estudiantes']=$estudiante;
		
		$estructura=	view('Estructura/Header').
								view('Estructura/Menu').
								view('Estudiantes/EstBorrar',$data).
								view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
								return $estructura;		
	}
		
	public function eliminar(){
		$request=\Config\Services::request();
		$EstudianteModel=new EstudianteModel($db);
		$id=$request->getPostGet('txtCodigo');
		$estudiante=$EstudianteModel->find($id);
		$estudiante=array('estudiantes'=>$estudiante);
		
		if($EstudianteModel->delete($id)===false){
			print_r($EstudianteModel->errors());
		}else{
			$EstudianteModel->purgeDeleted($id);
		}

		return redirect()->to(site_url('/EstudianteController'));	
	}


	public function dashboardEstudiante()
	{
		$estructura=	view('Estructura/Header').
						view('Estructura/Menu').
						view('DashboardEstudiante/DashboardEstudiante').
						view('Estructura/Footer');
        return $estructura;
	}

	//--------------------------------------------------------------------

}
