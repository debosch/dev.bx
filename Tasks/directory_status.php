<?php

function getDirectoryStatus($path)
{
    if (is_dir($path))
    {
        if (($currentDir = opendir($path)) !== false)
        {
            $content = [
                "dirs" => [],
                "files" => []
            ];

            while (($element = readdir($currentDir)) !== false)
            {
                if (in_array($element, [".", ".."], true))
                {
                    continue;
                }

                $pathToElement = "{$path}/{$element}";


                if (is_dir($pathToElement))
                {
                    $content["dirs"][$element] = getKeys($pathToElement);
                }
                else
                {
                    $content["files"][$element] = getKeys($pathToElement);
                }
            }

            closedir($currentDir);
            return $content;
        }
    }
    else
    {
        echo "Path to directory doesn't exist, try again".PHP_EOL;
    }

    return false;
}

function getKeys($path) : array
{
    $result = [];
    $result["is_readable"] = is_readable($path);
    $result["is_writable"] = is_readable($path);
    if (is_file($path))
    {
        $result["size"] = filesize($path);
    }
    return $result;
}
