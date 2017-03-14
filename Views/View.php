<?php
namespace Blog\Views;

class View {
    private $name;
    private $layout_name;
    private $title = '';

    public function __construct($name, $layout_name = 'layout') {
        $this->name = $name;
        $this->layout_name = $layout_name;
    }

    // Génère la vue avec le layout et affiche le résultat
    public function generate($data) {
        // Génère la vue spécialisée
        $content = $this->generateView($this->name, $data);
        
        // Génère et affiche le layout
        echo $this->generateView($this->layout_name, [
            'title' => $this->title,
            'content' => $content
        ]);
    }

    // Fournit les données ($data) à la vue
    // puis renvoie la vue générée
    private function generateView($name, $data) {
        $view_path = 'Views/' . $name . '.php';
        if (!file_exists($view_path)) {
            throw new \Exception('View not found: ' . $this->name);
        }

        // Extraie les variables de $data
        extract($data);

        // Commence la mise en tampon
        ob_start();

        // Appelle la vue avec les variables extraites
        require $view_path;

        // Récupération du tampon
        $content = ob_get_clean();

        // Récupération du titre éventuellement défini par la vue
        if (isset($title)) {
            $this->title = $title;
        }

        return $content;
    }
}
