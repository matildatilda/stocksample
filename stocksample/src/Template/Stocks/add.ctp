<h1>在庫追加</h1>
<?php
    echo $this->Form->create($stock);
    echo $this->Form->input('item_name', array('label' => '材料名'));
    echo $this->Form->input('volume', array('label' => '内容量'));
    echo $this->Form->input('unit', array('label' => '単位'));
    echo $this->Form->input('quantity', array('label' => '個数'));
    echo $this->Form->button(__('追加'));
    echo $this->Form->end();
?>