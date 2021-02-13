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
    'email'       =>['type' => BaseModel::TYPE_STRING],
  	'firstName'		=>['type' => BaseModel::TYPE_STRING],
  	'lastName'		=>['type' => BaseModel::TYPE_STRING],
  	'address_id'	=>['type' => BaseModel::TYPE_INT],
  	'isAdmin'		  =>['type' => BaseModel::TYPE_INT],
    'passwordHash'=>['type' => BaseModel::TYPE_STRING],
    'zipCode'   =>['type' => BaseModel::TYPE_STRING],
    'city'      =>['type' => BaseModel::TYPE_STRING],
    'street'  =>['type' => BaseModel::TYPE_STRING], 
    'strNo'   =>['type' => BaseModel::TYPE_STRING],
    'strAdd'  =>['type' => BaseModel::TYPE_STRING],
	];

  public static function fullTable()
    {
      $db = $GLOBALS['db'];
      $result = null;
      $sql = 'SELECT account.id,account.createdAt.account.updatetAt,email,firstName,lastName,address_id,isAdmin,passwordHash,zipCode,city,street,strNo,strAdd FROM '.self::tablename().' JOIN address ON account.address_id = address.id';

      $result = $db->query($sql)->fetchAll();
      return $result;
    }
  public function fullUser($id)
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
            $sql = 'SELECT account.id, account.createdAt,account.updatetAt,email,firstName,lastName,address_id,isAdmin,passwordHash,zipCode,city,street,strNo,strAdd FROM '.self::tablename().' JOIN address ON account.address_id = address.id';

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