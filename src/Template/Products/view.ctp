<h1><?= h($product->title) ?></h1>
<p><small>Created: <?= $product->created->format(DATE_RFC850) ?></small></p>
<p><?= h($product->p_desc) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $product->id]) ?></p>
<p>
    <?= $this->Form->postLink('Delete',
        ['action' => 'delete', $product->id],
        ['confirm' => 'Are You sure?'])
    ?>
</p>
<p>
    <?= $this->Html->link('Back', ['action' => 'index']) ?>
</p>