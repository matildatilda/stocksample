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
            $this->Stocks->patchEntity($stock, $this->request->data);
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
    
    /*
    public function recipe()
    {
        $stocks = $this->Stocks->find('all');
        $this->set(compact('stocks'));
    }
    */
}
