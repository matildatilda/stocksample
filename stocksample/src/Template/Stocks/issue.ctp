<h1>出庫</h1>
<?php foreach ($stocks as $stock): ?>
<div>
    <p><?= $stock->item_name.' （'.$stock->volume.' '.$stock->unit.'）'; ?>
    <p>在庫：<?= $stock->quantity; ?></p>
    <?php 
        echo $this->Form->create($stock, array('url' => ['action' => 'out', $stock->id]));
        echo $this->Form->input('quantity', array('label' => '数量', 'value' => '0'));    
        echo $this->Form->button(__('出庫'));
        echo $this->Form->end();
    ?>
</div>
<?php endforeach; ?>