<?php
include_once './exception/validationException.php';

Class Utils {
    public static function message($content, $status, int $statusCode = 200) {
        http_response_code($statusCode);
        header("Content-Type: application/json");
	    return json_encode(['message' => $content, 'error' => $status]);
    }
    
    public static function validInput($data) {
	    $data = strip_tags($data);
	    $data = htmlspecialchars($data);
	    $data = stripslashes($data);
	    $data = trim($data);
	    return $data;
	}

    public static function validateIntFromGet($param, $min = null, $max = null) {
        // Check if the parameter is set and is numeric
        if (isset($_GET[$param]) && is_numeric($_GET[$param])) {
            $value = (int) $_GET[$param];  // Cast the value to an integer
    
            if($value < 0) {
                throw new ValidationException("The value should be a postive number.");
            }

            // Optionally check if the integer is within a range
            if ((is_null($min) || $value >= $min) && (is_null($max) || $value <= $max)) {
                return $value;  // Return the validated integer
            } else {
                // Return false if it is out of the allowed range
                throw new ValidationException("The value should be in range ($min to $max).");
            }

            
        }
    }
}
?>