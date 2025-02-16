<?php
class ValidationException extends Exception {
    public function __construct($message = "Invalid Parameter") {
        parent::__construct($message);
    }
}
?>