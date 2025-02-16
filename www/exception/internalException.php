<?php
class InternalException extends Exception {
    public function __construct($message = "Internal Server Error") {
        parent::__construct($message);
    }
}
?>