<?php

namespace App\Models;

use CodeIgniter\Model;

class Mconteneur extends Model
{
  protected $table = 'conteneur';
  protected $primaryKey = 'Id';
  protected $returnType = 'array';

  public function getAll()
  {
    $requete = $this->select('Id, AddrEmplacement');
    //return $requete->findAll();
    return $requete->paginate(10);
  }
  public function  getAllWithPager()
  {
  }

  public function getDetail($prmId)
  {
    $requete = $this->select('AddrEmplacement, LatLng, VolumeMax, VolumeMesureActuel, Nom, JourCollecte')
      ->join('tourneestandard', 'conteneur.TourneeStandardId = tourneestandard.Id', 'left')
      ->where(['conteneur.Id' => $prmId]);
    return $requete->findAll();
  }

  public function getSearchWithPager($searchText)
  {
    $requete = $this->select('Id, AddrEmplacement ')
      ->like(['AddrEmplacement' => $searchText]);
    return $requete->paginate(10);
  }

  public function getSearch($searchText)
  {
    $requete = $this->select('Id, AddrEmplacement ')
      ->like(['AddrEmplacement' => $searchText]);
    return $requete->findAll();
  }

  public function getAllByIdTournee($prmIdTournee)
  {
    return $this->select('Id, AddrEmplacement')
      ->where(['TourneeStandardId' => $prmIdTournee])
      ->findAll();
  }

  public function createConteneur($prmData)
  {
    $this->allowedFields = ['AddrEmplacement', 'LatLng', 'VolumeMax'];
    $this->insert($prmData);

    $retour['lastInsertId'] = $this->insertID('Id');
    return $retour;
  }

  public function updateConteneur($prmId, $prmData)
  {
    $columns = $this->getFieldNames($this->table);
    unset($columns[array_search('Id', $columns)]);
    $this->allowedFields = $columns;

    $this->set($prmData);
    $this->where('Id', $prmId);
    $this->update();

    $retour = $this->getDetail($prmId);
    return $retour;
  }

  public function deleteConteneur($prmId)
  {
    $retour = $this->delete(['Id' =>$prmId]);
    return $retour;
  }
}
