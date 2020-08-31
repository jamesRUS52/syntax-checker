<?php


namespace SyntaxChecker;

use InvalidArgumentException;

class Checker
{
    private $available_chars = ['(', ')', '\n', '\r', '\t', ' '];
    public function setAvailableChars(array $available_chars) : void
    {
        $this->available_chars = $available_chars;
    }

    public function CheckBrackes(string $string) : bool {
        $open_break = 0;
        $close_break = 0;
        foreach (str_split($string) as $char) {
            if (!in_array($char, $this->available_chars))
                throw new InvalidArgumentException("Char {$char} not available");
            if ($char == '(') {
                $open_break++;
            }
            if ($char == ")") {
                $close_break++;
            }
            if ($close_break > $open_break)
                return false;
        }
        return $open_break == $close_break;
    }
}