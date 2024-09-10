<?php
declare(strict_types = 1);

require 'PasswordGenerator.php';

try{
    $isAlphabetChecked = convertStringToBool($_GET['alphabet']);
    $isNumbersChecked = convertStringToBool($_GET['numbers']);
    $isSpecialCharsChecked = convertStringToBool($_GET['special-chars']);
    $numberPasswordChars = convertToInt($_GET['num-chars']);

    if(!isNumberInRange($numberPasswordChars))
        throw new OutOfRangeException("The number should be between 4 and 20 characters.");

    $passGen = new PasswordGenerator();
    $passGen->setHasAlphabet($isAlphabetChecked)
            ->setHasNumbers($isNumbersChecked)
            ->setHasSpecialChars($isSpecialCharsChecked)
            ->setNumChars($numberPasswordChars);
    $pass = $passGen->generate();
    echo $pass;
} catch(InvalidArgumentException $e) {
    echo "Invalid Input.";
} catch(OutOfRangeException $e){
    echo $e->getMessage();
}

function convertStringToBool(string $strBoolVal): bool{
    switch($strBoolVal){
        case 'true':
            return true;
            break;
        case 'false':
            return false;
            break;
        default:
            throw new InvalidArgumentException("The value should be either 'true' or 'false'.");
    }
}

function convertToInt(string $strNumber): int{
    $number = +$strNumber;
    if(is_int($number))
        return $number;
    else
        throw new InvalidArgumentException("The value cannot be converted to an int."); 
}

function isNumberInRange(int $num): bool{
    if($num >= 4 && $num <= 20)
        return true;
    else
        return false;
}