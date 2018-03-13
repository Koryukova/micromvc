<?php
/**
 * @var $weatherByCity array
 */
dump($weatherByCity);
?>

<div class="container">
    <h1>Погода:</h1>
    <p><?= $weatherByCity['name'] ?>: <?= $weatherByCity['weather'][0]['main'] ?></p>
</div>
