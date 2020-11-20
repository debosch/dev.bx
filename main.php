<?php

require_once 'directory_status.php';
require_once 'tests.php';

$expectedResult = [
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

$result = getDirectoryStatus("./TestDir");
getDirectoryStatus_TEST($expectedResult, $result, "./TestDir");
