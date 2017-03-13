<?php
$title = 'Erreur';

ob_start();
?>

<h1>Une erreur s'est produite ;-(</h1>
<p>
    <?= $errorMessage ?>
</p>

<?php
$content = ob_get_clean();

require 'views/layout.php';
