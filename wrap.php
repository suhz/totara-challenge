<?php

function wrap($string, $length) {

    // we need to initialize some variables (and array)
    $lines = 1;
    $wraped = '';
    $stringArr[$lines] = [];

    // break the string into words
    $words = explode(' ', $string);

    // here we go, let the journey begins
    foreach ($words as $word) {

        // what we currently have in our line
        $currentLine = implode(' ',$stringArr[$lines]);

        // will the new line length go over $length? Calculating...
        $newLineLength = strlen($currentLine) + strlen($word);

        // looks like the new line will go over the limit
        if ($newLineLength >= $length) {
            $lines++; // go to the next line please
        }

        // add the word into current line that we are working for
        $stringArr[$lines][] = $word;
    }

    // gather everything into a string, and add the new line character
    $wraped = implode("\n", array_map(function($line) {
        return implode(' ', $line);
    }, $stringArr));

    // here we go, our wrapped string :)
    return $wraped;
}

echo wrap('testing one two three four five', 10);
