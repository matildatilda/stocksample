<h1>在庫一覧</h1>
<?= $this->Html->link('在庫追加', ['action' => 'add']); ?>
<table>
    <tr>
        <th>材料名</th><th>内容量</th><th>単位</th><th>数量</th><th>入庫日</th><th>編集</th>    
    </tr>    
    <?php foreach ($stocks as $stock): ?>
    <tr>
        <td><?= $stock->item_name; ?></td>
        <td><?= $stock->volume; ?></td>
        <td><?= $stock->unit; ?></td>
        <td><?= $stock->quantity; ?></td>
        <td>
            <?php if (is_null($stock->registered_at)): ?>
            -
            <?php else: ?>
            <?= $stock->registered_at->format('Y-m-d H:i'); ?>
            <?php endif; ?>
        </td>
        <td><?= $this->Html->link('編集', ['action' => 'edit', $stock->id]); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

