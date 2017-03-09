<?php
$title = 'Accueil';

ob_start();
  
foreach ($posts as $post):
?>
    <article>
    <header>
        <h1 class="titreBillet"><?= $post['title'] ?></h1>
        <time><?= $post['creation_date'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
    </article>
    <hr />
<?php
endforeach;

$content = ob_get_clean();

require 'layout.php';
