<?php
$title = $post['title'];

ob_start();

?>
<article>
    <header>
        <h1 class="titreBillet">
            <?= htmlspecialchars($post['title']) ?>
        </h1>
        <time><?= $post['creation_date'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
</article>
<hr />

<h2 id="titreReponses">Commentaires</h2>
<?php
foreach ($comments as $comment):
?>
    <p>
        <strong><?= $comment['author'] ?></strong><br />
        <time><?= $comment['creation_date'] ?></time><br />
        <?= $comment['content'] ?>
    </p>
<?php
endforeach;

$content = ob_get_clean();

require 'layout.php';
