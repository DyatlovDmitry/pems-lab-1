<?php

namespace App;

use DateTime;
class Comment
{
    private DateTime $createdAt;

    private User $user;

    private string $message;

    public function __construct(User $user, string $message) {
        $this->user = $user;
        $this->message = $message;
        $this->createdAt = new DateTime();
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }
}