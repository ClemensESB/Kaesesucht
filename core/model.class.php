<?php

//Grundlegende Datenbankzugriffsklasse , von welcher die models erben

namespace kae\core;

abstract class Model 
{
	// useful types for schema
    const TYPE_STRING   = 'string';
    const TYPE_INT  = 'integer';
    const TYPE_FLOAT = 'float';
    const TYPE_UINTEGER = 'uint';
    const TYPE_DECIMAL  = 'dec';
    const TYPE_DATE     = 'date';
    const TYPE_JSON     = 'json';

    protected $schema = [
    ];

    private $data = [
    ];

    public function __construct($params)
    {
        $this->fill($params);
    }

    protected function fill($params)
    {
        foreach($this->schema as $key => $value )
        {

            if(isset($params[$key]))
            {
                $this->{$key} = $params[$key]; //schreibt bei key von schema
            }
            else
            {
                $this->{$key} = null;
            }

        }

    }

    public function __get($key)
    {
        if(array_key_exists($key,$this->data))
        {
            return $this->data[$key];
        }
        throw new \Exception('You can not access to property "'.$key.'" for the class "'.get_called_class().'"');
    }

    public function __set($key,$value)
    {
        if(array_key_exists($key,$this->schema))
        {
            $this->data[$key] = $value;
            return;
        }
        throw new \Exception('You can not write to property "'.$key.'" for the class "'.get_called_class().'"');

    }



    public static function tablename()
    {
        $class = get_called_class();
        if(defined($class.'::TABLENAME'))
        {
            return $class::TABLENAME;
        }
        return null;
    }

    public static function find($where = '')
    {
        $db = $GLOBALS['db'];
        $result = null;

        try
        {
            $sql = 'SELECT * FROM '.self::tablename();

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
    
    public static function findOne($whereStr = '1')
    {
        $results = self::find($whereStr);

        if(count($results) > 0)
        {
            return $results[0];
        }

        return null;
    }

    public static function countTableEntries(){
        $db = $GLOBALS['db'];
        $result = null;
        try
        {
            $sql = 'SELECT count(id) FROM '.self::tablename();
            $result = $db->query($sql)->fetchAll();

        }
        catch(\PDOException $e)
        {
            die('Select statement failed: '. $e->getMessage());
        }
        $result = $result[0]['count(id)'];

        return $result;
    }

    public function updateModel(){
        $wherestr = '';
        foreach ($this->data as $key => $value) 
        {
            if($value != null && gettype($value) ==  self::TYPE_STRING)
            {
                $wherestr .= ' '.$key.' = "'.$value.'" and';
                #echo($value.': '.gettype($value));
            }
            elseif($value != null && gettype($value) ==  self::TYPE_INT)
            {
                $wherestr .= ' '.$key.' = '.$value.' and';
                #echo($value.': '.gettype($value));
            }
        }

        $wherestr = rtrim($wherestr,' and');
        #echo($wherestr);

        $erg = $this->findOne($wherestr);
        #pre_r($erg);

        foreach($this->schema as $key => $value )
        {
            if(isset($erg[$key]))
            {
                $this->{$key} = $erg[$key]; //schreibt bei key von schema
            }
            else
            {
                $this->{$key} = null;
            }
        }

    }

    public function insert(&$errors)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql  = 'INSERT INTO '. self::tablename().' (';
            $valueString = 'VALUES ( ';

            foreach ($this->schema as $key => $schemaOptions)
            {
                $sql .= '`'.$key.'`,';

                if($this->data[$key] === null)
                {
                    $valueString .='NULL,';
                }
                else
                {
                    $valueString .= $db->quote($this->data[$key]).',';
                }
            }
            $sql = trim($sql,',');
            $valueString = trim($valueString,',');
            $sql .= ')'.$valueString.');';
            $statement = $db->prepare($sql);
            $statement->execute();
            $this->updateModel();
            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error inserting '.get_called_class();
        }
        return false;
    }

    public function update(&$errors)
    {
        $db = $GLOBALS['db'];

        try
        {
            $sql = 'UPDATE '.self::tablename().' SET ';
            foreach($this->schema as $key => $schemaOptions)
            {
                if($this->data[$key] != null)
                {
                    $sql .= $key.' = '.$db->quote($this->data[$key]).',';
                }
            }
        $sql .= trim($sql, ',');
        $sql .= ' WHERE id = '.$this->data['id'];

        $statement = $db->prepare($sql);
        $statement->execute();

        return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error updating '.get_called_class();
        }
        return false;
    }

    public function delete(&$errors = null)
    {

        $db = $GLOBALS['db'];

        try
        {
            $sql = 'DELETE FROM '.self::tablename().' WHERE id = '.$this->id;
            $db->exec($sql);
            return true;
        }
        catch(\PDOException $e)
        {
            $errors[] = 'Error deleting '.get_called_class();
        }
        return false;
    }

    public function validate(&$errors = null)
    {
        foreach ($this->schema as $key => $schemaOptions)
        {
            if(isset($this->data[$key])&&is_array($schemaOptions))
            {
                $valueErrors = $this->validateValue($key,$this->data[$key],$schemaOptions);
                if($valueErrors !== true)
                {
                    array_push($errors, $valueErrors);
                }

            }
        }
        return count($errors) === 0 ? true : $errors;
    }


    protected function validateValue($attribute,&$value,&$schemaOptions)
    {
        $type = $schemaOptions['type'];
        $errors = [];

        switch($type)
        {
            case Model::TYPE_INT:
            break;
            case Model::TYPE_FLOAT:
            break;
            case Model::TYPE_STRING:
            {
                if(isset($schemaOptions['validate']['min']) && mb_strlen($value) < $schemaOptions['validate']['min'])
                {
                    $errors[] = $attribute.': String needs min. '.$schemaOptions['validate']['min'].' characters!';
                }
                if(isset($schemaOptions['validate']['max']) && mb_strlen($value) > $schemaOptions['validate']['max'])
                {
                    $errors[] = $attribute.': String can have max. '.$schemaOptions['validate']['max'].' characters!';
                }
                if(isset($schemaOptions['validate']['email']) && !filter_var($value, FILTER_VALIDATE_EMAIL))
                {
                    $errors[] = $attribute.': Email string not valid';
                }
                if(isset($schemaOptions['validate']['zip']) && mb_strlen($value) != $schemaOptions['validate']['zip'])
                {
                    $errors[] = $attribute.': PLZ zu lang oder kurz';
                }
            }
            break;
        }
        return count($errors) > 0 ? $errors : true;
    }

    

}

