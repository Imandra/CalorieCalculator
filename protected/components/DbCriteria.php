<?php

class DbCriteria extends CDbCriteria
{
    public function compare($column, $value, $partialMatch=false, $operator='AND', $escape=true, $binary=false)
    {
        if(is_array($value))
        {
            if($value===array())
                return $this;
            return $this->addInCondition($column,$value,$operator);
        }
        else
            $value="$value";

        if(preg_match('/^(?:\s*(<>|<=|>=|<|>|=))?(.*)$/',$value,$matches))
        {
            $value=$matches[2];
            $op=$matches[1];
        }
        else
            $op='';

        if($value==='')
            return $this;

        if($partialMatch)
        {
            if ($op === '')
                return $binary ? $this->addSearchCondition($column, $value, $escape, $operator, 'LIKE BINARY') :
                    $this->addSearchCondition($column, $value, $escape, $operator);
            if ($op === '<>')
                return $binary ? $this->addSearchCondition($column, $value, $escape, $operator, 'NOT LIKE BINARY') :
                    $this->addSearchCondition($column, $value, $escape, $operator, 'NOT LIKE');
        }
        elseif($op==='')
            $op='=';

        $binary ? $this->addCondition($column.$op." BINARY ".self::PARAM_PREFIX.self::$paramCount,$operator) :
            $this->addCondition($column.$op.self::PARAM_PREFIX.self::$paramCount,$operator);
        $this->params[self::PARAM_PREFIX.self::$paramCount++]=$value;

        return $this;
    }
}