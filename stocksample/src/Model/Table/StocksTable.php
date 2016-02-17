<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StocksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');    
    }
    
    /*
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('item_name')
            ->notEmpty('volume')
            ->notEmpty('unit')
            ->notEmpty('quantity')
            ->notEmpty('registered_at');

        return $validator;
    }
    */
    
}