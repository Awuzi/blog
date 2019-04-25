<?php

namespace App\Table;

class Article extends Table {

    protected static $table = 'articles';


    public static function getLast() {
        return self::query("
            SELECT articles.id, titre, texte, categorie.nom as categorie 
            FROM articles 
            LEFT JOIN categorie 
                ON categorie_id = categorie.id");
    }

    public static function lastByCategorie($categorie_id) {
        return self::query("
            SELECT articles.id, titre, texte, categorie.nom as categorie 
            FROM articles 
            LEFT JOIN categorie 
                ON categorie_id = categorie.id 
                WHERE categorie_id = ?", [$categorie_id],false);
    }

    public function getExtrait() {
        $html = '<p>' . substr($this->texte, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">voir la suite</a></p>';
        return $html;
    }

    public function getUrl() {
        return 'index.php?p=article&id=' . $this->id;
    }
}