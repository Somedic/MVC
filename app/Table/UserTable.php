<?php

namespace App\Table;

use Core\Table\Table;

class UserTable extends Table{


    public function findWithCategory($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu,articles.logo,articles.like_count,articles.dislike_count,  categories.name as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.id =?",[$id],true);
    }

}