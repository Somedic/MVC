<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{

    protected $table ='articles';
    /*
     * Recupère derniers articles  -> sur la page d'acceuil
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, categories.name,articles.logo, category_id as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.online =1
           ORDER BY articles.date DESC");
    }

    /*
   * Recupère derniers articles de la catégorie demandée -> pour afficher les article en fonction de la catégorie demandé
   * @param $category_id int
   * @return array
   */
    public function lastByCategory($category_id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu,articles.logo, categories.name as categorie
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
            SELECT articles.id, articles.titre, articles.contenu,articles.logo,articles.like_count,articles.dislike_count, categories.name as categorie
            FROM articles
            LEFT JOIN categories  ON category_id= categories.id
            WHERE articles.id =? ",[$id],true);
    }
}