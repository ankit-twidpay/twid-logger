<?php

// test-logger.php

require_once __DIR__ . '/vendor/autoload.php'; // Include the Composer autoload file

use twid\logger\Test;


$test = new Test();

// Example usage of your package that generates log entries
$result = $test->test();

