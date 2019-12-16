<?php


class ChybaFormular extends Exception {
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
        $this->message = "<p class='alert alert-danger'>". $message . "</p>" ;
    }
}
