<h1>Products</h1>
<?= $this->Html->link('Add Product', ['action' => 'add']); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td>
                <?= $product->id?>
            </td>
            <td>
                <?= $this->Html->link($product->title, ['action' => 'view', $product->id]) ?>
            </td>
            <td>
                <?= $product->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?= $this->Html->link('Edit', ['action' => 'edit', $product->id]) ?>
                <?= $this->Form->postLink('Delete',
                    ['action' => 'delete', $product->id],
                    ['confirm' => 'Are You sure?'])
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

