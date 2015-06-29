<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page</title>
</head>
<body>
    <nav class="nav" role="navigation">
        <ul>
            <?php foreach($menuItems as $item): ?>
                <li><a href="<?= $this->e($item['href']) ?>"><?= $this->e($item['text']) ?></a></li>
            <?php endforeach ?>
        </ul>
    </nav>
    
    <main class="main" role="main">
        <?= $this->section('main') ?>
    </main>
</body>
</html>