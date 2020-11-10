<?php

require_once 'input.php';
require_once 'tests.php';
require_once 'calc.php';

$result = readFromConsole();
assertEquals(true,$result,'true');

$result = readFromConsole();
assertEquals(false,$result,'false');

$result = readFromConsole();
assertEquals(null,$result,'!stop');

$result = readFromConsole();
assertEquals(1.3,$result,'1.3');

$result = readFromConsole();
assertEquals(1,$result,'1');

$result = readFromConsole();
assertEquals("test",$result,'test');
