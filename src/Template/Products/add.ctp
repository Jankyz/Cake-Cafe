<h1>Add Product</h1>

<?php
echo $this->Form->create('$product');
echo $this->Form->control('title');
echo $this->Form->control('p_desc', ['rows' => '4']);
echo $this->Form->button(__('Add Product'));
echo $this->Form->end();
?>