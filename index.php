<?php declare(strict_types=1);


class Calc {
    private $result;
    
    public function add(int $firstNumber, int $secondNumber): int {
        return $firstNumber + $secondNumber;
    }
    public function sub(int $firstNumber, int $secondNumber): int {
        return $firstNumber - $secondNumber;
    }
    public function div(int $firstNumber, int $secondNumber): int {
        return intdiv($firstNumber , $secondNumber);
    }
    public function mul(int $firstNumber, int $secondNumber): int {
        return $firstNumber * $secondNumber;
    }
    public function twopow(int $secondNumber): int {
        return pow(2, $secondNumber);
    }
    
}

$calc = new Calc;
//echo $calc->add(45, 5.2);
echo "<hr>";
echo $calc->sub(45, 5);
echo "<hr>";
echo $calc->div(45, 5);
echo "<hr>";
echo $calc->mul(45, 5);
echo "<hr>";
echo $calc->twopow(8);
echo "<hr>";


try {
    echo $calc->div(45, 0); 
    print_r("ok" . "\n");
} catch (\Error $e) {
    echo $e->getMessage();
    print_r("error" . "\n");
}
echo "<hr>";
?>

