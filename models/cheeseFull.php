<?php

//Datenbankzugriffe auf die Produkte
namespace kae\model;
use \kae\core\Model as BaseModel;

class ModelCheeseFull extends \kae\core\Model
{
	const TABLENAME = 'cheese';

	protected $schema = [
	  'id'			      =>['type' => BaseModel::TYPE_INT],
  	'createdAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'updatetAt'		  =>['type' => BaseModel::TYPE_STRING],
  	'cheeseName'	  =>['type' => BaseModel::TYPE_STRING],
  	'sort_id'		    =>['type' => BaseModel::TYPE_INT],
  	'price_id'		  =>['type' => BaseModel::TYPE_INT],
  	'qtyInStock'	  =>['type' => BaseModel::TYPE_INT],
  	'descrip'		    =>['type' => BaseModel::TYPE_STRING],
  	'recipe'		    =>['type' => BaseModel::TYPE_STRING],
    'taste'         =>['type' => BaseModel::TYPE_STRING],
    'lactose'       =>['type' => BaseModel::TYPE_INT],
    'milkType'      =>['type' => BaseModel::TYPE_STRING],
    'rawMilk'       =>['type' => BaseModel::TYPE_INT],
    'pictureName'   =>['type' => BaseModel::TYPE_STRING],
    'sortName'      =>['type' => BaseModel::TYPE_STRING],
    'pricePerUnit'  =>['type' => BaseModel::TYPE_FLOAT],
	];

  private $quantity = 1;
  public function getQuantity(){
    return $this->quantity;
  }
  public function setQuantity($qty){
    $this->quantity= $qty;
  }



  public static function fullTable()
    {
        $db = $GLOBALS['db'];
        $result = null;

        $sql = 'SELECT * FROM cheese JOIN sort ON cheese.sort_id = sort.id 
        JOIN price ON cheese.price_id = price.id';

        $result = $db->query($sql)->fetchAll();
        return $result;

    }
  public function fullProduct($id)
  {
        $result = $this::fullTable();
        return $result[0];
  }

  public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT * FROM '.self::tablename().' JOIN sort ON cheese.sort_id = sort.id JOIN price ON cheese.price_id = price.id';

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
}
