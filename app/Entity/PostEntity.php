<?php
namespace App\Entity;



use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.show&id='.$this->id;
    }

    public function getExtrait(){
        $html = '<p>' .substr($this->description,0, strpos($this->description, ' ', 150)).' ... ';
        $html .= '<a class="btn btn-xs btn-warning" href="'.$this->getURL().'" role="button">Voir la suite &raquo;</a></p>';
        return $html;
    }


}