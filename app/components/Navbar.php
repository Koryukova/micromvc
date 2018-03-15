
<?php
namespace app\components;
class Navbar
{
    public static $menu = [
        'home' => [
            'title' => 'Главная',
        ],
        'reg' => [
            'title' => 'Регистрация',
        ],
        'weather' => [
            'title' => 'Погода',
        ],
        'test' => [
            'title' => 'Тест',
        ],
    ];
    public static $active = 'home';
}
