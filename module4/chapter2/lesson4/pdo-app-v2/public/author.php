<?php

require_once __DIR__ . '/../boot.php';

$repository = \PdoApp\Repository\AuthorRepositoryFactory::make();

$authors = $repository->findAll();

?>
<h1>Authors/Books</h1>
<form action="insert-author.php" method="post">
    <input type="text" name="name" id="name" placeholder="Name"><br><br>
<!--    <input type="text" name="country" id="country" placeholder="Country"><br><br>-->
    <button type="submit">Insert</button>
</form>

<hr />

<h4>Authors</h4>

<ul>
    <?php foreach ($authors as $author): ?>
    <li><?=$author->id()?> | <?=$author->name()?> from <?=$author->country()?></li>
    <?php endforeach ?>
</ul>
