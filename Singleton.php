<?php

class GameSettings {
    private static $instance = null;

    private $volume;
    private $difficulty;

    private function __construct() {
        $this->volume = 50; // Значение по умолчанию
        $this->difficulty = "Normal"; // Значение по умолчанию
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new GameSettings();
        }
        return self::$instance;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;
    }
}

$settings1 = GameSettings::getInstance();
$settings2 = GameSettings::getInstance();
var_dump($settings1 === $settings2);

$settings1->setVolume(70);
$settings1->setDifficulty("Hard");

echo $settings2->getVolume(); // Вывод: 70
echo $settings2->getDifficulty(); // Вывод: Hard

?>