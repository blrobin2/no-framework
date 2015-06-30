<?php $this->layout('layout', ['menuItems' => $menuItems]) ?>

<?php $this->start('main') ?>
    <?= $content ?>
<?php $this->stop();