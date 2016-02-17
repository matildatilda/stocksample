<h1>出庫</h1>

<table>
    <tr>
        <th>材料</th><th>在庫</th><th>出庫</th>    
    </tr>
    <?php foreach ($stocks as $stock): ?>
    <tr>
        <td><?= $stock->item_name.' （'.$stock->volume.' '.$stock->unit.'）'; ?></td>
        <td><?= $stock->quantity; ?></td>
        <td>
        <?php if ($stock->quantity > 0): ?>
        <?php 
            echo $this->Form->create($stock, array('url' => ['action' => 'out', $stock->id]));
            echo $this->Form->input('quantity', array('label' => '数量', 'value' => '0'));    
            echo $this->Form->button(__('出庫'));
            echo $this->Form->end();
        ?>
        <?php else: ?>
        在庫がありません
        <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
