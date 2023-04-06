<?php 
namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{
    public function __construct(){
		$this->db =db_connect(); // loading database 
		helper('form');
	}
	public function index(){
		$builder = $this->db->table("usuarios");
		$builder->select("*");
		$builder->join('perfiles', 'usuarios.PERID   = perfiles.PERID  ');
		$builder->orderBy('USUID ','asc');
		$usuarios = $builder->get()->getResult();

        $data = [
            'usuarios' => $usuarios,
			'content' => 'Usuarios/UsuarioListar'
        ];

		$estructura=	view('Estructura/layout/index', $data);		
        return $estructura;
	}
	
	public function nuevo(){
		$builder = $this->db->table("perfiles");
		$builder->select('PERID,PERNOMBRE');
		$perfiles = $builder->get()->getResult();

		$data = [
			'perfiles' => $perfiles,
			'content' => 'Usuarios/UsuarioNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function guardar(){
		$UsuariosModel= new UsuariosModel($db);
		$request=\Config\Services::request();
		$data=array(
			'PERID'=>$request->getPostGet('cmbPerfiles'),
			'USUNOMBRE'=>$request->getPostGet('txtNombre'),
			'USUCEDULA'=>$request->getPostGet('txtCedula'),
			'USUCLAVE'=>$request->getPostGet('txtClave'),
			'USUCORREO'=>$request->getPostGet('txtCorreo'),
			'USUESTADO'=>$request->getPostGet('txtEstado'),	
		);
		if($UsuariosModel->save($data)===false){
			var_dump($UsuariosModel->errors());
		}
		return redirect()->to(site_url('/UsuariosController'));
	}

    public function editar(){
		$request=\Config\Services::request();
		if($request->getPostGet('id')){
        	$id=$request->getPostGet('id');
		}else{
			$id=$request->uri->getSegment(3);
		}
		
		$UsuariosModel=new UsuariosModel($db);
        $usuarios=$UsuariosModel->find($id);
		$builder = $this->db->table("perfiles");
		$builder->select('PERID,PERNOMBRE');
		$perfiles = $builder->get()->getResult();
		$builder = $this->db->table("perfiles");
		$builder->select('PERID,PERNOMBRE');
		$perfiles = $builder->get()->getResult();
		$data = [
			'usuarios' => $usuarios,
			'perfiles' => $perfiles,
			'content' => 'Usuarios/UsuarioEditar'
		];

		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	

	}

	public function modificar(){
		$UsuariosModel= new UsuariosModel($db);
		$request=\Config\Services::request();
		$data=array(
			'USUID'=>$request->getPostGet('txtCodigo'),
			'PERID'=>$request->getPostGet('cmbPerfiles'),
			'USUNOMBRE'=>$request->getPostGet('txtNombre'),
			'USUCEDULA'=>$request->getPostGet('txtCedula'),
			'USUCLAVE'=>$request->getPostGet('txtClave'),
			'USUCORREO'=>$request->getPostGet('txtCorreo'),
			'USUESTADO'=>$request->getPostGet('txtEstado'),
			
		);

		$USUID=$request->getPostGet('txtCodigo');

		if($UsuariosModel->update($USUID,$data)===false){
			var_dump($UsuariosModel->errors());
		}
		return redirect()->to(site_url('/UsuariosController'));
	}
	
	public function borrar(){
		$request=\Config\Services::request();
		$id=$request->getPostGet('id');

		$UsuariosModel=new UsuariosModel($db);
		$usuarios=$UsuariosModel->find($id);

		$builder = $this->db->table("perfiles");
		$builder->select('PERID,PERNOMBRE');
		$perfiles = $builder->get()->getResult();

		$data = [
			'usuarios' => $usuarios,
			'perfiles' => $perfiles,
			'content' => 'Usuarios/UsuarioBorrar'
		];							
	
		$estructura=	view('Estructura/layout/index', $data);
		return $estructura;	
	}	
		
	public function eliminar(){
		$request=\Config\Services::request();
		$UsuariosModel=new UsuariosModel($db);
		$id=$request->getPostGet('txtCodigo');
		$usuarios=$UsuariosModel->find($id);
		$usuarios=array('usuarios'=>$usuarios);
		
		if($UsuariosModel->delete($id)===false){
			print_r($UsuariosModel->errors());
		}else{
			$UsuariosModel->purgeDeleted($id);
		}

		return redirect()->to(site_url('/UsuariosController'));	

	}
		
	}