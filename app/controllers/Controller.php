<?php
require_once 'app/models/User.php';
require_once 'app/components/Weather.php';
class Controller
{
    public function homeAction() {
        $user = new User();
        $user->setFirstname('Роман');
        $user->setLastname('Ястребов');
        $this->render('home.php', 'Главная', [
            'user' => $user,
            'time' => time(),
        ]);
    }
    public function regAction() {
        $param = $_POST;
        $user = new User();
        if ( isset($param['is_agree']) ) {
            // Создание пользователя
            $user->setFirstname($param['firstname']);
            $user->setLastname($param['lastname']);
            $user->setPassword($param['password']);
            $user->setSex($param['sex']);
            $user->setAge($param['age']);
            $user->setGrowth($param['growth']);
            if (isset($param['stack_learn'])) {
                $user->setStackLearn($param['stack_learn']);
            }
            Session::addFlash(Session::FLASH_SUCCESS, 'Пользователь успешно зарегистрирован');
        }
        $this->render('reg.php', 'Регистрация', [
            'user' => $user,
        ]);
    }
    public function weatherAction() {
        $city = 'Saint Petersburg,ru';
        $weather = new Weather('012e34537b328a78762f56bb13b7ac8c');
        $this->render('weather.php', 'Погода', [
            'weatherByCity' => $weather->getWeatherByCity($city),
        ]);
    }
    private function render($view, $title, $param = []) {
        extract($param);
        require_once 'templates/layout.php';
    }
    public function route($route) {
        return '/micromvc/?act='.$route;
    }
}
