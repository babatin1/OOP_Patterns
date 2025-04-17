<?php

interface Device {
    public function turn_on();
    public function turn_off();
    public function set_state($state);
}

abstract class TV implements Device {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function turn_on() {
        echo "{$this->brand} TV включен.\n";
    }

    public function turn_off() {
        echo "{$this->brand} TV выключен.\n";
    }
}

class SonyTV extends TV {
    public function __construct() {
        parent::__construct("Sony");
    }

    public function set_state($state) {
        echo "Канал переключен на {$state} на {$this->brand} TV.\n";
    }
}

class SamsungTV extends TV {
    public function __construct() {
        parent::__construct("Samsung");
    }

    public function set_state($state) {
        echo "Канал переключен на {$state} на {$this->brand} TV.\n";
    }
}

abstract class Light implements Device {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function turn_on() {
        echo "{$this->brand} лампочка включена.\n";
    }

    public function turn_off() {
        echo "{$this->brand} лампочка выключена.\n";
    }
}

class PhilipsLight extends Light {
    public function __construct() {
        parent::__construct("Philips");
    }

    public function set_state($state) {
        echo "Яркость установлена на {$state} на {$this->brand} лампочке.\n";
    }
}

class IKEALight extends Light {
    public function __construct() {
        parent::__construct("IKEA");
    }

    public function set_state($state) {
        echo "Яркость установлена на {$state} на {$this->brand} лампочке.\n";
    }
}

class RemoteControl {
    private $device;

    public function __construct(Device $device) {
        $this->device = $device;
    }

    public function turn_on() {
        $this->device->turn_on();
    }

    public function turn_off() {
        $this->device->turn_off();
    }

    public function set_state($state) {
        $this->device->set_state($state);
    }
}

function main() {
    $sony_tv = new SonyTV();
    $samsung_tv = new SamsungTV();
    $philips_light = new PhilipsLight();
    $ikea_light = new IKEALight();

    $remote_for_sony = new RemoteControl($sony_tv);
    $remote_for_samsung = new RemoteControl($samsung_tv);
    $remote_for_philips = new RemoteControl($philips_light);
    $remote_for_ikea = new RemoteControl($ikea_light);

    $remote_for_sony->turn_on();
    $remote_for_sony->set_state("HBO");
    $remote_for_sony->turn_off();

    $remote_for_samsung->turn_on();
    $remote_for_samsung->set_state("CNN");
    $remote_for_samsung->turn_off();

    $remote_for_philips->turn_on();
    $remote_for_philips->set_state("75%");
    $remote_for_philips->turn_off();

    $remote_for_ikea->turn_on();
    $remote_for_ikea->set_state("50%");
    $remote_for_ikea->turn_off();
}

main();

?>