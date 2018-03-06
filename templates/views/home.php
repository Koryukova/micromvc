
<?php
/**
 * @var $this Controller
 * @var $user User
 * @var $time integer
 * */
?>



<div class="container">
    <h1>Hello <?php $user->getFullName() ?> </h1>
    <h1>Time <?php $time ?> </h1>
    <a href="<? $this->route ('reg')?>" class="btn">Регистрация</a>
    <a href="<? $this->route ('weather')?>" class="btn">Погода</a>
</div>


