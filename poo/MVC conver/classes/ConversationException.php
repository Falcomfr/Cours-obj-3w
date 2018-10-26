<?php
class ConversationException extends Exception {
  public function getM(): string {
    return '[Exception de la conversation] : ' . $this->message;
  }
}