<?php
namespace App\Controller;

class StocksController extends AppController
{
    public function index()
    {
        $stocks = $this->Stocks->find('all');
        $this->set(compact('stocks'));
    }

    public function add()
    {
        $stock = $this->Stocks->newEntity();
        if ($this->request->is('Post'))
        {
            $stock = $this->Stocks->patchEntity($stock, $this->request->data);
            $stock->registered_at = new \DateTime();
            if ($this->Stocks->save($stock))
            {
                $this->Flash->success(__('在庫を追加しました'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('在庫が追加できません'));
        }
        $this->set('stock', $stock);
    }
    
    public function edit($id = null)
    {
        $stock = $this->Stocks->get($id);
        if ($this->request->is(['post', 'put']))
        {
            $this->Stocks->patchEntity($stock, $this->request->data);
            if ($this->Stocks->save($stock))
            {
                $this->Flash->success(__('更新しました'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash_error(__('更新できません'));
        }
        $this->set('stock', $stock);
    }
    
    public function issue()
    {
        $stocks = $this->Stocks->find('all');
        $this->set(compact('stocks'));
    }
    
    public function out($id = null)
    {
        $stock = $this->Stocks->get($id);
        if ($this->request->is(['post', 'put']))
        {
            $oldQuantity = $stock->quantity;
            $this->Stocks->patchEntity($stock, $this->request->data);
            $stock->quantity = $oldQuantity - $stock->quantity;

            if ($this->Stocks->save($stock))
            {
                $this->Flash->success(__('出庫しました'));    
            }
            else
            {
                $this->Flash->error(__('出庫できません'));    
            }
        }
        $this->redirect(['action' => 'issue']);
    }
    
    public function recipe()
    {
        $ingredients = array();
        for ($i = 0; $i < 3; $i++)
        {
            $ingredients[] = array(
                'item_name' => '',
                'volume' => 0);
        }
    
        if ($this->request->is('post'))
        {
            $inStocks = array();
            
            $ingredients = $this->request->data['ingredients'];
            foreach ($ingredients as $ingredient)
            {
                $stocks = $this->Stocks->find('all', array(
                    'conditions' => array('item_name' => $ingredient['item_name']),
                    'order' => array('volume DESC', 'registered_at DESC'),
                ));
                $needsVolume = (int)$ingredient['volume'];
                $inStock = false;
                foreach ($stocks as $stock)
                {
                    $needsQuantity = $needsVolume / $stock->volume;
                    //在庫あり
                    if ($stock->quantity > $needsQuantity)
                    {
                        $needsVolume = $needsVolume - ($needsQuantity * $stock->volume);            
                    }
                    if ($needsVolume <= 0)
                    {
                        $inStock = true;
                        break;    
                    }
                }
                $inStocks[] = $inStock;
            }
            $this->set('inStocks', $inStocks);
        }
        $this->set('ingredients', $ingredients);
    }
}
