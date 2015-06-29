<?php $this->layout('layout', ['menuItems' => $menuItems]) ?>

<?php $this->start('main') ?>
    <h1>Hello World</h1>
    <p>Hello, <?= $this->e($name) ?></p>
<?php $this->stop() ?>