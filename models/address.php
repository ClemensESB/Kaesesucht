<?php

//Datenbankzugriffe auf die Adressen
namespace kae\model;
use \kae\core\Model as BaseModel;
class ModelAddress extends \kae\core\Model
{
	const TABLENAME = '`address`';

	protected $schema = [
  	'id'        =>['type' => BaseModel::TYPE_INT],
  	'createdAt' =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt' =>['type' => BaseModel::TYPE_STRING],
  	'zipCode'   =>['type' => BaseModel::TYPE_STRING,
                    'validate' =>[
                      'zip' =>5,
                    ],
                  ],
  	'city'      =>['type' => BaseModel::TYPE_STRING,
                    'validate' => [
                      'min' => 2,
                      'max' => 50,
                      'null' => false,
                                  ],
                  ],
  	'street' 	=>['type' => BaseModel::TYPE_STRING,
                  'validate' => [
                    'min' => 2,
                    'max' => 100,
                    'null' => false,
                  ],
                ], 
  	'strNo' 	=>['type' => BaseModel::TYPE_STRING,
                  'validate' => [
                    'min' => 1,
                    'max' => 5,
                    'null' => false,
                  ],
                ],
	];
}