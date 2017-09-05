<?php

class Wrap {

    public $wrapped, $string, $length;

    public function __construct($string, $length) {
        $this->string = $string;
        $this->length = $length;
        $this->wrap();
    }

    private function wrap() {
        $lines = 1;
        $stringArr[$lines] = [];

        $words = explode(' ', $this->string);

        foreach ($words as $word) {

            $currentLine = implode(' ',$stringArr[$lines]);
            $newLineLength = strlen($currentLine) + strlen($word);

            if ($newLineLength >= $this->length) {
                $lines++;
            }

            $stringArr[$lines][] = $word;
        }

        $this->wrapped = implode("\n", array_map(function($line) {
            return $line = implode(' ', $line);
        }, $stringArr));
    }
}

// $wrap = new Wrap('testing one two three four five', 10);
// echo $wrap->wrapped;


?>
