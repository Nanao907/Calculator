<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquard+24&display=swap" rel="stylesheet">
    <title>Calculator</title>
</head>
<body>

<h2> Calculator</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="num1" placeholder="Enter first number" required>
    <select name="operator" required>
        <option value="">Select Operator</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="num2" placeholder="Enter second number" required>
    <button type="submit" name="calculate">Calculate</button>
</form>
<div>
<?php
class Calculator {
    private $num1;
    private $num2;

    public function __construct($num1, $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function add() {
        return $this->num1 + $this->num2;
    }

    public function subtract() {
        return $this->num1 - $this->num2;
    }

    public function multiply() {
        return $this->num1 * $this->num2;
    }

    public function divide() {
        if ($this->num2 != 0) {
            return $this->num1 / $this->num2;
        } else {
            return "Cannot divide by zero";
        }
    }
}


// Check if form is submitted
if (isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    // Instantiate Calculator object
    $calculator = new Calculator($num1, $num2);

    // Perform calculation based on operator
    switch ($operator) {
        case '+':
            $result = $calculator->add();
            break;
        case '-':
            $result = $calculator->subtract();
            break;
        case '*':
            $result = $calculator->multiply();
            break;
        case '/':
            $result = $calculator->divide();
            break;
        default:
            $result = "Invalid operator";
    }
}
if (isset($result)) {
    echo "<h3>Result: $result</h3>";}
?>
</div>
<footer>
        <p> &copy Arina Belugina </p>
    </footer>

</body>
</html>
