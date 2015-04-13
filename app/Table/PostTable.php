<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{

    protected $table ='articles';
    public $cat;
    /*
     * Recupère derniers articles  -> sur la page d'acceuil
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, categories.name,articles.logo,articles.description, category_id as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.online =1
           ORDER BY articles.date DESC");
    }

    /**
     * @return mixed affiche le nb d'article totaux
     */
    public function nbArticleTotal(){
        return $this->query("
            SELECT COUNT(id) as compte
            FROM articles
            WHERE articles.online = 1");
    }

    /**
     * @return mixed essai nouvelle fonction$
     */
    public function nbArticleCat($category_id){
        return $this->query("
         SELECT COUNT(id) as compte
            FROM articles
            WHERE category_id =?",[$category_id]
           );
    }
    /*
   * Recupère derniers articles de la catégorie demandée -> pour afficher les article en fonction de la catégorie demandé
   * @param $category_id int
   * @return array
   */
    public function lastByCategory($category_id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.logo,articles.description, categories.name as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.category_id =? AND articles.online =1
            ORDER BY articles.date DESC",[$category_id]);
    }


    /*
    * Recupère un article en liant la catégorie associée -> pour page Show
    * @param $id int
    * @return \App\Entity\PostEntity
    */

    public function findWithCategory($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu,articles.logo,articles.description, articles.like_count,articles.dislike_count, categories.name as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.id =? ",[$id],true);
    }


}