<?php
$title = $post['title'];

// Données par défaut du formulaire
if (!isset($error)) $error = false;
if (!isset($author)) $author = '';
if (!isset($content)) $content = '';
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
        <strong><?= htmlspecialchars($comment['author']) ?></strong><br />
        <time><?= $comment['creation_date'] ?></time><br />
        <?= nl2br(htmlspecialchars($comment['content'])) ?>
    </p>
<?php
endforeach;
?>

<hr />

<h2 id="comment-form">Poster un commentaire</h2>

<form action="posts/<?= $post['id'] ?>/comment#comment-form" method="post">
    <p>
        <label>
            Nom :<br />
            <input type="text" name="author" value="<?= htmlspecialchars($author) ?>" />
        </label>
    </p>
    <p>
        <label>
            Commentaire :<br />
            <textarea name="content"><?= htmlspecialchars($content) ?></textarea>
        </label>
    </p>

    <?php if($error): ?>
    <p class="error">
        <?php
        switch ($error) {
            case 'AUTHOR':
                echo 'Merci d\'entrer un nom comportant entre 3 et 30 caractères non spéciaux';
                break;
            case 'CONTENT':
                echo 'Merci d\'écrire un commentaire avant de le poster, ça serait plus pratique :-)';
                break;
        }
        ?>
    </p>
    <?php endif; ?>

    <input type="submit" value="Envoyer" />
</form>
