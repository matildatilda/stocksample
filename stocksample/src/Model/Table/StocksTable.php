<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class StocksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');    
    }
    
}