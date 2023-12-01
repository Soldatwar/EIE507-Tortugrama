<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $switchState = $_POST["switchState"];
    $switchNumber = $_POST["switchNumber"];

    if ($switchState == "on") {
        $gpioState = 1;
    } else {
        $gpioState = 0;
    }

    // Asume que los interruptores controlan los GPIOs 17 y 18
    if ($switchNumber == 1) {
        $gpioNumber = 17;
    } else {
        $gpioNumber = 18;
    }

    // Usa la biblioteca WiringPi para controlar los GPIOs
    shell_exec("/usr/bin/gpio -g mode {$gpioNumber} out");
    shell_exec("/usr/bin/gpio -g write {$gpioNumber} {$gpioState}");
}
?>
