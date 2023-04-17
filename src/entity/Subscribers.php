<?php

namespace App\Entity;

use DateTime;

class Subscribers
{

    private int $id;
    private DateTime $created_on;
    private string $email;
    private string $firtname;
    private string $lastname;
    private int $origine_id;

    public function __construct(int $id, Datetime $created_on, string $email, string $firtname, string $lastname, int $origine_id)
    {
        $this->id = $id;
        $this->created_on = $created_on;
        $this->email = $email;
        $this->firtname = $firtname;
        $this->lastname = $lastname;
        $this->origine_id = $origine_id;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of created_on
     */
    public function getCreatedOn(): DateTime
    {
        return $this->created_on;
    }

    /**
     * Set the value of created_on
     */
    public function setCreatedOn(DateTime $created_on): self
    {
        $this->created_on = $created_on;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of firtname
     */
    public function getFirtname(): string
    {
        return $this->firtname;
    }

    /**
     * Set the value of firtname
     */
    public function setFirtname(string $firtname): self
    {
        $this->firtname = $firtname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of origine_id
     */
    public function getOrigineId(): int
    {
        return $this->origine_id;
    }

    /**
     * Set the value of origine_id
     */
    public function setOrigineId(int $origine_id): self
    {
        $this->origine_id = $origine_id;

        return $this;
    }
}
