<?php

namespace App\Controllers;

use App\Models\PerfilesModel;
use App\Models\OpcionesModel;

class PerfilesController extends BaseController {
	public function __construct() {
		$this->db = db_connect(); // loading database
		helper('form');
	}

	public function index() {
		/*$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
		*/
		//metodo pager
		/*$model = new PerfilesModel();
		$data = [
			'perfiles' => $model->paginate(3),
			'pager' => $model->pager,
			'pagi_path' => 'sgcc/PerfilesController'
		];
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilListar', $data) .
			view('Estructura/Footer');
		return $estructura;*/

		$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilListar', $perfiles) .
			view('Estructura/Footer');
		return $estructura;



	}

	public function nuevo() {
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilNuevo') .
			view('Estructura/Footer');

		//$estructura=view('Estructura/Encabezado').view('Areas/AreasNuevo').view('Estructura/pie');
		return $estructura;
		$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
	}

	public function guardar() {
		$PerfilesModel = new PerfilesModel($db);
		$request = \Config\Services::request();
		$data = [

			'PERNOMBRE' => $request->getPostGet('txtNombre'),
			'PERESTADO' => $request->getPostGet('txtEstado'),

		];

		if ($PerfilesModel->insert($data) === false) {
			var_dump($PerfilesModel->errors());
		}

		$builder = $this->db->table("perfiles");
		$builder->select("*");
		$perfiles = $builder->get()->getResult();
		$perfiles = ['perfiles' => $perfiles];
		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilListar', $perfiles) .
			view('Estructura/Footer');
		return $estructura;
	}

	public function editar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		// Perfiles Model
		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);
		//var_dump($areas);
		$data['perfiles'] = $perfiles;

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilEditar', $data) .
			view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;
	}

	public function editarOpciones() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		// Perfiles Model
		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);
		//var_dump($areas);
		$data['perfiles'] = $perfiles;

		// Perfiles Opciones Model
		$perfilesOpciones = $PerfilesModel->getOptions($id);
		// $perfilesOpciones = $PerfilesModel->where('PERID', $id)->join('perfilesopciones as po', 'po.PERID = perfiles.PERID')->join('opciones as op', 'op.OPCID = po.OPCID')->findAll();
		$data['perfilesOpciones'] = $perfilesOpciones;

		// Opciones Model
		$OpcionesModel = new OpcionesModel($db);
		$opciones = $OpcionesModel->findAll();

		$opcionesLimpias = [];
		// Descartar las opciones que ya estan asignadas
		foreach ($opciones as $opcion) {
			if (!in_array($opcion['OPCID'], array_column($perfilesOpciones, 'OPCID'))) {
				$opcionesLimpias[] = $opcion;
			}
		}

		$data['opciones'] = $opcionesLimpias;

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilAgregarOpciones', $data) .
			view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasEditar',$data).view('Estructura/pie');
		return $estructura;
	}

	public function modificar() {
		$PerfilesModel = new PerfilesModel($db);
		$request = \Config\Services::request();

		$estado = $request->getPostGet('txtEstado') == '1' ? 'ACTIVO' : 'INACTIVO';

		$data = [
			'PERNOMBRE' => $request->getPostGet('txtNombre'),
			'PERESTADO' => $estado,
		];
		
		$PERID = $request->getPostGet('txtCodigo');

		if ($PerfilesModel->update($PERID, $data) === false) {
			var_dump($PerfilesModel->errors());
		}
		return redirect()->to(site_url('/PerfilesController'));
	}

	public function borrar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);
		$perfiles = ['perfiles' => $perfiles];
		//var_dump($areas);
		$data['perfiles'] = $perfiles;

		$estructura = view('Estructura/Header') .
			view('Estructura/Menu') .
			view('Perfiles/PerfilBorrar', $data) .
			view('Estructura/Footer');
		//$estructura=view('Estructura/Encabezado').view('Areas/AreasBorrar',$data).view('Estructura/pie');
		return $estructura;
	}

	public function eliminar() {
		$request = \Config\Services::request();
		$PerfilesModel = new PerfilesModel($db);
		$id = $request->getPostGet('txtCodigo');
		$perfiles = $PerfilesModel->find($id);
		$perfiles = ['perfiles' => $perfiles];
		var_dump($perfiles);
		if ($PerfilesModel->delete($id) === false) {
			print_r($PerfilesModel->errors());
		} else {
			$PerfilesModel->purgeDeleted($id);
		}

		return redirect()->to(site_url('/PerfilesController'));
	}

	//--------------------------------------------------------------------

}
