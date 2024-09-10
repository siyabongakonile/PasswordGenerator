<?php
declare(strict_types = 1);

class PasswordGenerator{
    /** Characters that are going to be used to generate the password. */
    protected string $acceptedChars = '';

    protected string $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    protected string $numbers  = '0123456789012345678901234567890123456789';

    protected string $specialChars = '@,.*&^%$#!-_+=:;?@,.*&^%$#!-_+=:;?';

    protected bool $hasAlphabet = true;

    protected bool $hasNumbers = true;

    protected bool $hasSpecialCharacters = true;

    /** The number of the password characters. */
    protected int $numberCharacters = 4;

    /** The minimum number of characters the password can have. */
    protected int $minNumChars = 4;

    /** The maximum number of characters the password can have. */
    protected int $maxNumChars = 20;

    public function setHasAlphabet(bool $hasAlphabet): static{
        $this->hasAlphabet = $hasAlphabet;
        return $this;
    }

    public function setHasNumbers(bool $hasNumbers): static{
        $this->hasNumbers = $hasNumbers;
        return $this;
    }

    public function setHasSpecialChars(bool $hasSpecialChars): static{
        $this->hasSpecialCharacters = $hasSpecialChars;
        return $this;
    }

    public function setNumChars(int $numChars): bool{
        if($numChars >= $this->minNumChars && $numChars <= $this->maxNumChars){
            $this->numberCharacters = $numChars;
            return true;
        } else {
            return false;
        }
    }

    public function setMinNumChars(int $min){
        $this->minNumChars = $min;
        return $this;
    }

    public function setMaxNumChars(int $max){
        if($this->minNumChars > $max)
            throw new InvalidArgumentException("The minimum value({$this->minNumChars}) cannot be greater than the maximum value({$max}).");
        $this->maxNumChars = $max;
        return $this;
    }

    public function generate(): string{
        $this->setAcceptedCharacters();
        return substr(str_shuffle($this->acceptedChars), 0, $this->numberCharacters);
    }

    protected function setAcceptedCharacters(){
        $this->acceptedChars = '';

        if($this->hasAlphabet)
            $this->acceptedChars .= $this->alphabet;

        if($this->hasNumbers)
            $this->acceptedChars .= $this->numbers;

        if($this->hasSpecialCharacters)
            $this->acceptedChars .= $this->specialChars;

        if($this->acceptedChars === '')
            $this->acceptedChars = $this->alphabet . $this->numbers . $this->specialChars;
    }
}