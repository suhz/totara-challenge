<?php

function wrap($string, $length) {

    // initialize var
    $lineNumber = 1;

    // just to make sure that we don't touch existing newline char
    $lines = explode("\n", $string);

    // go through each line
    foreach ($lines as $line) {

        // split all word in the line
        $words = explode(' ', $line);

        // iterate to add each word into NEW line, but don't go over $length
        for ($x=0; $x < count($words); $x++) {

            // if one word is over $length. break that word
            if (strlen($words[$x]) > $length) {
                $temp = str_split($words[$x], $length);

                // add each pieces to new line
                for($y = 0; $y < count($temp); $y++) {
                    $stringArr[$lineNumber][] = $temp[$y];
                    $lineNumber++;
                }

            // else, add the word into our new line
            } else {
                $stringArr[$lineNumber][] = $words[$x];

                // check if there is any word next? and then check if next line will go over $length
                if (isset($words[$x+1])) {

                    // query current line, if its a new line add the first word
                    $currentLine = isset($stringArr[$lineNumber]) ? implode(' ',$stringArr[$lineNumber]) : $words[$x];

                    // current line length + next word length + 1 space
                    $newLineLength = strlen($currentLine) + strlen($words[$x+1]) + 1;

                    // new line is over $length, go to the next line
                    if ($newLineLength > $length) {
                        $lineNumber++;
                    }
                }
            }
        }
    }

    // glue everything together
    $wraped = implode("\n", array_map(function($line) {
        return implode(' ', $line);
    }, $stringArr));

    return $wraped;
}
