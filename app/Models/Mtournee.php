<?php
namespace App\Models;
use CodeIgniter\Model;

class Mtournee extends Model
{
 protected $table = 'tourneestandard';
 protected $primaryKey = 'Id';
 protected $returnType = 'array';

 public function getAll()
 {
 $requete = $this->select('*');
 //return $requete->findAll();
 return $requete->findAll(); 
 }
public function  getAllWithPager()
{

}

public function getDetail($prmId)
 {
 $requete = $this->select('*')
 ->where(['Id' => $prmId]);
 return $requete->findAll();
 }


 public function getAllByIdTournee($prmIdTournee)
 {
     return $this -> select ('Id, AddrEmplacement')
     -> where (['TourneeStandardId' => $prmIdTournee])
     ->findAll();
 }


}
