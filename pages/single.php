<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$post = Article::find($_GET['id']);

if ($post === false) {
    App::notFound();
}

$categorie = Categorie::find($post->categorie_id);
?>


<h1><?php echo $post->titre; ?></h1>

<p><?php echo $post->texte; ?></p>
