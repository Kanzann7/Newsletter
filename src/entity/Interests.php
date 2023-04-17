<?php

namespace App\Entity;

class Interests
{
    private int $id;
    private string $interests_label;

    public function __construct(int $id, string $interests_label)
    {
        $this->id = $id;
        $this->interests_label = $interests_label;
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
     * Get the value of interests_label
     */
    public function getInterestsLabel(): string
    {
        return $this->interests_label;
    }

    /**
     * Set the value of interests_label
     */
    public function setInterestsLabel(string $interests_label): self
    {
        $this->interests_label = $interests_label;

        return $this;
    }
}
