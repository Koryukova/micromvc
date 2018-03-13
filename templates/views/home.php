
<?php
/**
 * @var $this Controller
 * @var $user User
 * @var $time integer
 */
?>

<div class="container">
    <h1>Hello <?= $user->getFullName() ?></h1>
    <p>Unix время: <?= $time ?></p>
    <a href="<?= $this->route('reg') ?>" class="btn">Регистрация</a>
    <a href="<?= $this->route('weather') ?>" class="btn">Погода</a>
</div>
