<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mtournee;
use App\Models\Mconteneur;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Ctournee extends Controller
{
	public function index()
	{
		$modelT = new Mtournee();
		$data['result'] = $modelT->getAll();
		$data['pager'] = $modelT->pager;



		$data['title'] = "Les tournées";
		$data['heading'] = "La Liste des tournées";

		$page['contenu'] = view('Tournees/v_liste_tournees', $data);
		return view('Commun/v_template', $page);
	}

	public function detail($prmId = null)
	{
		
		if ($prmId != null) {
			$modelT = new Mtournee();
			$data['resTournee'] = $modelT->getDetail($prmId);
			if (count($data['resTournee']) != 0) {
				$modelC = new Mconteneur();
				$data ['resConteneur'] = $modelC -> getAllByIdTournee($prmId);

				$data['title'] = "Jour de tournée";
				$data['heading'] = "Tournée " . $data['resTournee'][0]['Nom'] ;

				$page['contenu'] = view('Tournees/v_detail_tournee', $data);
				return view('Commun/v_template', $page);
			} else {
				throw PageNotFoundException::forPageNotFound("ce conteneur n existe pas");
			}
		} else {
			throw PageNotFoundException::forPageNotFound("il faut choisir un autre conteneur");
		}
	}



}