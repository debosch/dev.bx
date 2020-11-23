<?php

require_once 'Tasks/directory_status.php';
require_once 'Tasks/equal_to_max.php';
require_once 'Tasks/tests.php';

$directoryStatusExpectedResult = [
    "dirs" => [
        "TestFolder1" => [
            "is_readable" => true,
            "is_writable" => true,
        ],
        "TestFolder22" => [
            "is_readable" => true,
            "is_writable" => true,
        ],
        "TestFolder3" => [
            "is_readable" => true,
            "is_writable" => true,
        ],
        "TestFolder4" => [
            "is_readable" => true,
            "is_writable" => true,
        ],
    ],
    "files" => [
        "testFile1.txt" => [
            "is_readable" => true,
            "is_writable" => true,
            "size" => 11250,
        ],
        "testFile2.txt" => [
            "is_readable" => true,
            "is_writable" => true,
            "size" => 450,
        ],
        "testFile3.txt" => [
            "is_readable" => true,
            "is_writable" => true,
            "size" => 2250,
        ],
        "testFile4.txt" => [
            "is_readable" => true,
            "is_writable" => true,
            "size" => 4950,
        ],
    ]
];

$equalToMaxTestInput1 = [0, 0, 0, 0, 0, 0, 0, 0];
$equalToMaxTestInput2 = [1, 2, 3, 4, 0, 5, 2, 1, 7, 6, 1, 7, 7, 7, 7, 7];
$equalToMaxExpectedResult1 = 8;
$equalToMaxExpectedResult2 = 6;

$result = findEqualsToMax_TEST(findEqualsToMax($equalToMaxTestInput1), $equalToMaxExpectedResult1, "[0, 0, 0, 0, 0, 0, 0, 0]");
$result = findEqualsToMax_TEST(findEqualsToMax($equalToMaxTestInput2), $equalToMaxExpectedResult2, "[1, 2, 3, 4, 0, 5, 2, 1, 7, 6, 1, 7, 7, 7, 7, 7]");

$result = getDirectoryStatus("./TestDir");
getDirectoryStatus_TEST($directoryStatusExpectedResult, $result, "./TestDir");
