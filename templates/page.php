<?php $this->layout('layout', ['menuItems' => $menuItems]) ?>

<?php $this->start('main') ?>
    <?= $this->e($content) ?>
<?php $this->stop() ?>
