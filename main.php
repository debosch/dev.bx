<?php

require_once 'Tasks/directory_status.php';
require_once 'Tasks/equal_to_max.php';
require_once 'Tasks/tests.php';
require_once 'Tasks/Chess/ChessFigure.php';
require_once 'Tasks/Chess/Rook.php';
require_once 'Tasks/Chess/Queen.php';

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

/*
$result = getDirectoryStatus("./TestDir");
getDirectoryStatus_TEST($directoryStatusExpectedResult, $result, "./TestDir");
*/

$equalToMaxInput1 = [0, 0, 0, 0, 0, 0, 0, 0];
$equalToMaxInput2 = [1, 2, 3, 4, 0, 5, 2, 1, 7, 6, 1, 7, 7, 7, 7, 7];
$equalToMaxInput3 = [0];
$equalToMaxInput4 = [];
$equalToMaxExpectedResult1 = 8;
$equalToMaxExpectedResult2 = 6;
$equalToMaxExpectedResult3 = 1;
$equalToMaxExpectedResult4 = 0;

$result = findEqualsToMax($equalToMaxInput1);
assertEquals($equalToMaxExpectedResult1, $result, "[0, 0, 0, 0, 0, 0, 0, 0]");

$result = findEqualsToMax($equalToMaxInput2);
assertEquals($equalToMaxExpectedResult2, $result, "[1, 2, 3, 4, 0, 5, 2, 1, 7, 6, 1, 7, 7, 7, 7, 7]");

$result = findEqualsToMax($equalToMaxInput3);
assertEquals($equalToMaxExpectedResult3, $result, "[0]");

$result = findEqualsToMax($equalToMaxInput4);
assertEquals($equalToMaxExpectedResult4, $result, "[]");

$rook1 = new Rook([2, 2, 6, 2]);
$result = $rook1->IsPossibleToMove($rook1->place, $rook1->desiredPlace);
assertEquals(true, $result, "[2, 2, 6, 2]");

$rook2 = new Rook([0, 0, 0, 0]);
$result = $rook2->IsPossibleToMove($rook2->place, $rook2->desiredPlace);
assertEquals(true, $result, "[0, 0, 0, 0]");

$rook3 = new Rook([1, 2, 3, 4]);
$result = $rook3->IsPossibleToMove($rook3->place, $rook3->desiredPlace);
assertEquals(false, $result, "[1, 2, 3, 4]");

$rook4 = new Rook([5, 2, 6, 2]);
$result = $rook4->IsPossibleToMove($rook4->place, $rook4->desiredPlace);
assertEquals(true, $result, "[5, 2, 6, 2])");

$queen1 = new Queen([1, 1, 8, 8]);
$result = $queen1->IsPossibleToMove($queen1->place, $queen1->desiredPlace);
assertEquals(true, $result, "[1, 1, 8, 8]");

$queen2 = new Queen([1, 3, 1, 7]);
$result = $queen2->IsPossibleToMove($queen2->place, $queen2->desiredPlace);
assertEquals(true, $result, "[1, 3, 1, 7]");

$queen3 = new Queen([2, 2, 6, 2]);
$result = $queen3->IsPossibleToMove($queen3->place, $queen3->desiredPlace);
assertEquals(true, $result, "[2, 2, 6, 2]");

$queen4 = new Queen([2, 7, 6, 2]);
$result = $queen4->IsPossibleToMove($queen4->place, $queen4->desiredPlace);
assertEquals(false, $result, "[2, 7, 6, 2]");

$queen5 = new Queen([4, 4, 4, 4]);
$result = $queen5->IsPossibleToMove($queen5->place, $queen5->desiredPlace);
assertEquals(false, $result, "[1, 1, 1, 1]");

$queen6 = new Queen([1, 1, 10, 1]);
$result = $queen6->IsPossibleToMove($queen6->place, $queen6->desiredPlace);
assertEquals(false, $result, "[1, 1, 10, 1]");

