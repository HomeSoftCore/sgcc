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
		$estudiantes = $builder->get()->getResult();
		
		//metodo pager
		$model = new EstudianteModel();
        $data = [
			'estudiantes' => $estudiantes,
			'content' => 'Estudiantes/EstListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;
	}

    public function nuevo(){
		$data = [
			'content' => 'Estudiantes/EstNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);		

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
		
		return redirect()->to(site_url('/EstudianteController'));
	}

	public function editar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$EstudianteModel=new EstudianteModel($db);
		$estudiante=$EstudianteModel->find($id);

		$data = [
			'content' => 'Estudiantes/EstEditar',
			'estudiantes' => $estudiante
		];

		$estructura =	view('Estructura/layout/index', $data);		
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
	
		$data = [
			'content' => 'Estudiantes/EstBorrar',
			'estudiantes' => $estudiante
		];

		$estructura =	view('Estructura/layout/index', $data);		
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

	public function nuevoreg(){
		$data['validation'] = $this->validator;
		$estructura =	view('Estudiantes/EstNuevoReg',$data);		

		return $estructura;
	}

	public function guardarreg(){

        $rules = [
            'txtNombre' => 
			[ 
				'rules' => 'required',
				'errors' => [
					'required' => 'Campo Nombre es requerido'
				]
			],
            'txtCedula' => 
			[ 
				'rules' => 'required|numeric|min_length[10]',
				'errors' => [
					'required' => 'Campo C&eacute;dula es requerido',
					'min_length' => 'M&iacute;nimo 10 digitos...'
				]
			],		
            'txtCorreo' => 
			[ 
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Campo Correo es requerido',
					'valid_email' => 'Digite un correo valido...'
				]
			],				
        ];

		if ( $this->validate($rules) ) { 
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
			return redirect()->to(site_url('/login'));
		} else {
			$data['validation'] = $this->validator;
			$estructura =	view('Estudiantes/EstNuevoReg', $data);
			return $estructura;
		}

	}
}
