<?php


//Datenbankzugriffe auf accounts

namespace kae\model;
use \kae\core\Model as BaseModel;

class ModelAccountFull extends \kae\core\Model
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
    'firstName'   =>['type' => BaseModel::TYPE_STRING,
                      'validate' => 
                      [
                      'min' => 2,
                      'max' => 45,
                      'none' => false,
                      ],
                    ],
    'lastName'    =>['type' => BaseModel::TYPE_STRING,
                      'validate' =>
                      [
                        'min' => 2,
                        'max' => 45,
                        'none' => false,
                      ],
                    ],
  	'address_id'	=>['type' => BaseModel::TYPE_INT],
  	'isAdmin'		  =>['type' => BaseModel::TYPE_INT],
    'passwordHash'=>['type' => BaseModel::TYPE_STRING],
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
    'street'  =>['type' => BaseModel::TYPE_STRING,
                  'validate' => [
                    'min' => 2,
                    'max' => 100,
                    'null' => false,
                  ],
                ], 
    'strNo'   =>['type' => BaseModel::TYPE_STRING,
                  'validate' => [
                    'min' => 1,
                    'max' => 5,
                    'null' => false,
                  ],
                ],
	];

  public static function fullTable()
    {
      $db = $GLOBALS['db'];
      $result = null;
      $sql = 'SELECT account.id,account.createdAt.account.updatetAt,email,firstName,lastName,address_id,isAdmin,passwordHash,zipCode,city,street,strNo FROM '.self::tablename().' JOIN address ON account.address_id = address.id';

      $result = $db->query($sql)->fetchAll();
      return $result;
    }
  public function fullUser()
    {
      $result = self::fullTable();
      return $result[0];
    }

  public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT account.id, account.createdAt,account.updatetAt,email,firstName,lastName,address_id,isAdmin,passwordHash,zipCode,city,street,strNo FROM '.self::tablename().' JOIN address ON account.address_id = address.id';

            if(!empty($where))
            {
                $sql .= ' WHERE '.$where.';'; 
            }
            $result = $db->query($sql)->fetchAll();
        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }
        return $result;
    }

    public static function findOne($where = '1')
    {
       $results = self::find($where);
       if(count($results) > 0)
        {
            return $results[0];
        }
        return null;
    }
}