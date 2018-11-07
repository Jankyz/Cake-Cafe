<h1>Edit Product</h1>
<?php
echo $this->Form->create($product);
echo $this->Form->control('id', ['type' => 'hidden']);
echo $this->Form->control('title');
echo $this->Form->control('p_desc', ['rows' => '4']);
echo $this->Form->button(__('Save Product'));
echo $this->Form->end();
?>