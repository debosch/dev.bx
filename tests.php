<?php

function assertEquals($expectedResult, $result, $message): bool
{
    echo PHP_EOL;

    if ((int)$expectedResult == (int)$result)
    {
        echo "Test: {$message} - passed".PHP_EOL;

        return true;
    }
    else
    {
        echo "Test: {$message} - failed".PHP_EOL;

        return false;
    }
}

function getDirectoryStatus_TEST($expectedResult, $result, $directory): bool
{
    echo PHP_EOL;

    $dirsIntersects = array_intersect_key($result["dirs"], $expectedResult["dirs"]);
    $dirsDifferences = array_diff_key($expectedResult["dirs"], $result["dirs"]);

    foreach ($dirsIntersects as $key => $value)
    {
        echo "Test passed: {$key} folder exists in {$directory} directory.".PHP_EOL;

        $propertiesIntersects = array_intersect_assoc($value, $expectedResult["dirs"][$key]);
        $propertiesDifferences = array_diff_assoc($value, $expectedResult["dirs"][$key]);

        if (count($propertiesIntersects) != 0)
        {
            propertiesLog($propertiesIntersects, $expectedResult["dirs"][$key]);
        }

        if (count($propertiesDifferences) != 0)
        {
            propertiesLog($propertiesDifferences, $expectedResult["dirs"][$key], false);
        }

    }

    echo PHP_EOL;

    foreach ($dirsDifferences as $key => $value)
    {
        echo "TEST FAILED: {$key} doesn't exist in {$directory} directory".PHP_EOL;
    }

    echo PHP_EOL;

    $filesIntersects = array_intersect_key($result["files"], $expectedResult["files"]);
    $filesDifferences = array_diff_key($expectedResult["files"], $result["files"]);

    foreach ($filesIntersects as $key => $value)
    {
        echo "Test passed: {$key} file exists in {$directory} folder.".PHP_EOL;

        $propertiesIntersects = array_intersect_assoc($value, $expectedResult["files"][$key]);
        $propertiesDifferences = array_diff_assoc($value, $expectedResult["files"][$key]);

        if (count($propertiesIntersects) != 0)
        {
            propertiesLog($propertiesIntersects, $expectedResult["files"][$key]);
        }

        if (count($propertiesDifferences) != 0)
        {
            propertiesLog($propertiesDifferences, $expectedResult["files"][$key], false);
        }

    }

    foreach ($filesDifferences as $key => $value)
    {
        echo "TEST FAILED: {$key} file doesn't exist in {$directory} folder.".PHP_EOL;
    }

    return true;
}

function propertiesLog($folder, $expectedProperties, $isPassed = true)
{
    if ($isPassed)
    {
        foreach ($folder as $folderPropertyKey => $folderPropertyValue)
        {
            $res = $folderPropertyKey."=".(getString($folderPropertyValue));
            $passedTestText = "Test passed: result: {$res}";
            echo str_pad(
                     $passedTestText,
                     mb_strlen($passedTestText) + 6,
                     " ",
                     STR_PAD_LEFT
                 ).PHP_EOL;
        }
    }
    else
    {
        foreach ($folder as $folderPropertyKey => $folderPropertyValue)
        {
            $res = $folderPropertyKey."=".(getString($folderPropertyValue));
            $expRes = $folderPropertyKey."=".getString($expectedProperties[$folderPropertyKey]);
            $passedTestText = "TEST FAILED: result: {$res} | expected: {$expRes}";
            echo str_pad(
                     $passedTestText,
                     mb_strlen($passedTestText) + 6,
                     " ",
                     STR_PAD_LEFT
                 ).PHP_EOL;
        }
        echo PHP_EOL;
    }
}

function getString($number): string
{
    if ((int)$number > 1)
    {
        return $number;
    }

    if ($number == true)
    {
        return "true";
    }
    else
    {
        return "false";
    }
}
