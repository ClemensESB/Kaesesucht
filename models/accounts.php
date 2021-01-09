<?php


//Datenbankzugriffe auf accounts

namespace kae\model;

class ModelAccount extends \kae\core\Model
{
	const TABLENAME = 'account';

	protected $schema = [
	  'id' 			    =>['type' => BaseModel::TYPE_INT] ,
  	'createdAt'		=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		=>['type' => BaseModel::TYPE_STRING],
    'email'       =>['type' => BaseModel::TYPE_STRING],
  	'firstName'		=>['type' => BaseModel::TYPE_STRING],
  	'lastName'		=>['type' => BaseModel::TYPE_STRING],
  	'address_id'	=>['type' => BaseModel::TYPE_INT],
  	'payMethod'		=>['type' => BaseModel::TYPE_STRING],
  	'isAdmin'		  =>['type' => BaseModel::TYPE_INT],
    'passwordHash'=>['type' => BaseModel::TYPE_STRING]
	];

}
