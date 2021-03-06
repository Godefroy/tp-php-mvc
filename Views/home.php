<?php
$title = 'Accueil';

foreach ($posts as $post):
?>
    <article>
    <header>
        <h1 class="titreBillet">
            <a href="posts/<?= $post['id'] ?>">
                <?= htmlspecialchars($post['title']) ?>
            </a>
        </h1>
        <time><?= $post['creation_date'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
    </article>
    <hr />
<?php
endforeach;
