<?php

namespace Core\Controller;

/**
 * Class Controller
 * Controler la navigation
 */
class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        /**
         * ob_start = démarre la temporisation de sortie (les données ne sont pas directement envoyées)
         * extract = vérifie chaque clé afin de contrôler si elle a un nom de variable valide
         * ob_get_clean = etourne le contenu du tampon de sortie et termine la session de temporisation
         * $viewPath et $template = voir AppController 
         */                                                                                                 
        ob_start();
        extract($variables);
        // chemin vers un fichier dans View
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        // $content = contenu du fichier $view
        $content = ob_get_clean();
        // chemin vers un fichier dans templates
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }
    
    /**
     * 403 forbidden = Le client n'a pas les droits d'accès au contenu, donc le serveur refuse de donner la véritable réponse
     */
    protected function forbidden($message = "Accès interdit !"){
        $this->render('posts.errorpage', compact("message"));
        die();
    }

    /**
     * 404 not found = Le serveur n'a pas trouvé la ressource demandée
     */
    protected function notFound($message = "OUPS ! La page que vous cherchez semble introuvable."){
        $this->render('posts.errorpage', compact("message"));
        die();
    }

}