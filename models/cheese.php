<?php

//Datenbankzugriffe auf die Produkte
namespace kae\model;

class ModelCheese extends \kae\core\Model
{
	const TABLENAME = '`cheese`';

	protected $schema = [
	'id'			=>['type' => BaseModel::TYPE_INT],
  	'createdAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'cheeseName'	  =>['type' => BaseModel::TYPE_STRING],
  	'sort_id'		    =>['type' => BaseModel::TYPE_INT],
  	'price_id'		   =>['type' => BaseModel::TYPE_INT],
  	'specifics_id'	=>['type' => BaseModel::TYPE_INT],
  	'qtyInStock'	=>['type' => BaseModel::TYPE_INT],
  	'descrip'		=>['type' => BaseModel::TYPE_STRING],
  	'recipe'		=>['type' => BaseModel::TYPE_STRING],
    'taste'     =>['type' => BaseModel::TYPE_STRING],
    'lactose'   =>['type' => BaseModel::TYPE_INT],
    'milkType'  =>['type' => BaseModel::TYPE_STRING],
    'rawMilk'   =>['type' => BaseModel::TYPE_INT],
	];

  
}
