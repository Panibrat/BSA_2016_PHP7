<?php declare(strict_types=1);

class MyLogger {
    private $file = 'log.txt';
    private $current; 
    private $date;
    
  public function log($operator, $operands, $result) {
      $this->date = new DateTime();
      $this->date = $this->date->format("y:m:d h:i:s");
      $this->current = file_get_contents($this->file);
      $this->current .= $this->date. "  operator: ". $operator . " operands: " .$operands . " result: ". $result. "\n";
      file_put_contents($this->file, $this->current);
  }
}




class Calc {
    private $result;
    private $operator;
    private $operands;
    
    public function add(int $firstNumber, int $secondNumber) {
        $this->operands = "$firstNumber". " and " . "$secondNumber";
        $logger = new MyLogger();
        $this->result = $firstNumber + $secondNumber;
        $this->operator = "+";
        $logger->log($this->operator, $this->operands, $this->result);
        return $this->result;
    }
    public function sub(int $firstNumber, int $secondNumber): int {
        $this->result =  $firstNumber - $secondNumber;
        return $this->result;
    }
    public function div(int $firstNumber, int $secondNumber): int {
        $this->result = intdiv($firstNumber , $secondNumber);
        return $this->result;
    }
    public function mul(int $firstNumber, int $secondNumber): int {
        $this->result = $firstNumber * $secondNumber;
        return $this->result;
    }
    public function twopow(int $secondNumber): int {
        $this->result = pow(2, $secondNumber);
        return $this->result;
    }
    
}

$calc = new Calc;
echo $calc->add(35, 5);
echo "<hr>";
echo $calc->sub(45, 5);
echo "<hr>";
echo $calc->div(45, 5);
echo "<hr>";
echo $calc->mul(45, 5);
echo "<hr>";
echo $calc->twopow(8);
echo "<hr>";

//$file = 'log.txt';
//$current = file_get_contents($file);
//$date = new DateTime();
//$date = $date->format("y:m:d h:i:s");
//$current .= $date. " Error\n";
//file_put_contents($file, $current);



try {
    echo $calc->div(45, 0); 
    print_r("ok" . "\n");
} catch (\Error $e) {
    echo $e->getMessage();
    print_r(" error" . "\n");
}
echo "<hr>";

try {
    echo $calc->add(4, 0.52); 
    print_r("ok" . "\n");
} catch (\Error $e) {
    echo $e->getMessage();
    print_r(" error" . "\n");
}
echo "<hr>";
?>

