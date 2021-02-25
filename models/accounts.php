<?php


//Datenbankzugriffe auf accounts

namespace kae\model;
use \kae\core\Model as BaseModel;

class ModelAccount extends \kae\core\Model
{
	const TABLENAME = 'account';

	protected $schema = [
	  'id' 			    =>['type' => BaseModel::TYPE_INT] ,
  	'createdAt'		=>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		=>['type' => BaseModel::TYPE_STRING],
    'email'       =>['type' => BaseModel::TYPE_STRING,
                      'validate' => 
                      [
                      'email' => true,
                      ],
                    ],
  	'firstName'		=>['type' => BaseModel::TYPE_STRING,
                      'validate' => 
                      [
                      'min' => 2,
                      'max' => 45,
                      'none' => false
                      ],
                    ],
  	'lastName'		=>['type' => BaseModel::TYPE_STRING,
                    'validate' => 
                      [
                      'min' => 2,
                      'max' => 45,
                      'none' => false
                      ],
                    ],
  	'address_id'	=>['type' => BaseModel::TYPE_INT],
  	'isAdmin'		  =>['type' => BaseModel::TYPE_INT],
    'passwordHash'=>['type' => BaseModel::TYPE_STRING]
	];

  

}