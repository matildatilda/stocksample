<h1>レシピ</h1>
<form action="/stocksample/stocks/recipe" method="post">
    <table>
        <tr><th>材料</th><th>数量</th><th>在庫</th></tr>
        <tr>
            <td><input type="text" name="ingredients[0][item_name]" value="<?= $ingredients[0]["item_name"]; ?>" /></td>
            <td><input type="text" name="ingredients[0][volume]" value="<?= $ingredients[0]["volume"]; ?>" /></td>
            <td>
                <?php if (isset($inStocks)): ?>
                    <?php if ($inStocks[0]) : ?>
                        <p>在庫があります</p>
                    <?php else: ?>
                        <p>在庫がありません</p>
                    <?php endif; ?>    
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="ingredients[1][item_name]" value="<?= $ingredients[1]["item_name"]; ?>" /></td>
            <td><input type="text" name="ingredients[1][volume]" value="<?= $ingredients[1]["volume"]; ?>" /></td>
            <td>
                <?php if (isset($inStocks)): ?>
                    <?php if ($inStocks[1]) : ?>
                        <p>在庫があります</p>
                    <?php else: ?>
                        <p>在庫がありません</p>
                    <?php endif; ?>    
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><input type="text" name="ingredients[2][item_name]" value="<?= $ingredients[2]["item_name"]; ?>" /></td>
            <td><input type="text" name="ingredients[2][volume]" value="<?= $ingredients[1]["volume"]; ?>" /></td>
            <td>
                <?php if (isset($inStocks)): ?>
                    <?php if ($inStocks[2]) : ?>
                        <p>在庫があります</p>
                    <?php else: ?>
                        <p>在庫がありません</p>
                    <?php endif; ?>    
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <input type="submit" value="在庫確認" />
</form>

