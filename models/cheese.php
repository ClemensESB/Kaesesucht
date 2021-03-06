<?php

//Datenbankzugriffe auf die Produkte
namespace kae\model;
use \kae\core\Model as BaseModel;

class ModelCheese extends \kae\core\Model
{
	const TABLENAME = '`cheese`';

	protected $schema = [
	 'id'			         =>['type' => BaseModel::TYPE_INT],
  	'createdAt'		   =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		   =>['type' => BaseModel::TYPE_STRING],
  	'cheeseName'	   =>['type' => BaseModel::TYPE_STRING],
  	'sort_id'		     =>['type' => BaseModel::TYPE_INT],
  	'price_id'		   =>['type' => BaseModel::TYPE_INT],
  	'qtyInStock'	=>['type' => BaseModel::TYPE_INT],
  	'descrip'		=>['type' => BaseModel::TYPE_STRING],
  	'recipe'		=>['type' => BaseModel::TYPE_STRING],
    'taste'     =>['type' => BaseModel::TYPE_STRING],
    'lactose'   =>['type' => BaseModel::TYPE_INT],
    'milkType'  =>['type' => BaseModel::TYPE_STRING],
    'rawMilk'   =>['type' => BaseModel::TYPE_INT],
    'pictureName'=>['type' => BaseModel::TYPE_STRING],
	];

  private $quantity = 1;
  public function getQuantity(){
    return $this->quantity;
  }
  public function setQuantity($qty){
    $this->quantity= $qty;
  }
}
