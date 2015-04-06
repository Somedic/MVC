<?php
namespace App\Entity;



use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.show&id='.$this->id;
    }

    public function getExtrait(){
        $html = '<p>' .substr($this->contenu,0, strpos($this->contenu, ' ', 200)).' ... </p>';
        $html .= '<p><a class="btn btn-xs btn-default" href="'.$this->getURL().'" role="button">Voir la suite &raquo;</a></p>';
        return $html;
    }
}