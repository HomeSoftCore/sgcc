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
		$builder = $this->db->table("perfiles");
		$builder->select('*');
		$perfiles = $builder->get()->getResult();
		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilListar'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;

	}

	public function nuevo() {
		$data = [
			'content' => 'Perfiles/PerfilNuevo'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
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

		return redirect()->to(site_url('/PerfilesController'));	
	}

	public function editar() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);

		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilEditar'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function editarOpciones() {
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');

		$PerfilesModel = new PerfilesModel($db);
		$perfiles = $PerfilesModel->find($id);

		$perfilesOpciones = $PerfilesModel->getOptions($id);

		$OpcionesModel = new OpcionesModel($db);
		$opciones = $OpcionesModel->findAll();

		// $opcionesLimpias = [];
		// foreach ($opciones as $opcion) {
		// 	if (!in_array($opcion['OPCID'], array_column($perfilesOpciones, 'OPCID'))) {
		// 		$opcionesLimpias[] = $opcion;
		// 	}
		// }

		$data = [
			'perfiles' => $perfiles,
			'opciones' => $opciones,
			'perfilesOpciones' => $perfilesOpciones,
			'content' => 'Perfiles/PerfilAgregarOpciones'
		];

		$estructura =	view('Estructura/layout/index', $data);		
		return $estructura;
	}

	public function modificar() {
		$PerfilesModel = new PerfilesModel($db);
		$request = \Config\Services::request();
		$data = [
			'PERNOMBRE' => $request->getPostGet('txtNombre'),
			'PERESTADO' => $request->getPostGet('txtEstado'),
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

		$data = [
			'perfiles' => $perfiles,
			'content' => 'Perfiles/PerfilBorrar'
		];

		$estructura =	view('Estructura/layout/index', $data);		
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
}
