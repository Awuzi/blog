<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
if ($categorie == false) { App::notFound(); }

$article = Article::lastByCategorie($_GET['id']);
$categories = Categorie::all();


?>

<h1><?php echo $categorie->nom; ?></h1>
<div class="row">

    <div class="col-sm-8">

        <?php foreach ($article as $post): ?>
            <?php //App::getDb() = connexion à la base de donnée ?>
            <?php //getLast est une fonction static de la classe article dans le namespace App\Table ?>

            <h2><a href="<?php echo $post->url; ?>"><?php echo $post->titre; ?></a></h2>

            <p><em><?php echo $post->categorie ?></em></p>

            <p><?php echo $post->extrait; ?></p>
        <?php endforeach; ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $categorie) : ?>
                <li>
                    <a href="<?php echo $categorie->url; ?>"><?php echo $categorie->nom ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


