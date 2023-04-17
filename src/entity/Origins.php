<?php

namespace App\Entity;

class Origins
{
    private int $id;
    private string $origin_label;

    public function __construct(int $id, string $origin_label)
    {
        $this->id = $id;
        $this->origin_label = $origin_label;
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
     * Get the value of origin_label
     */
    public function getOriginLabel(): string
    {
        return $this->origin_label;
    }

    /**
     * Set the value of origin_label
     */
    public function setOriginLabel(string $origin_label): self
    {
        $this->origin_label = $origin_label;

        return $this;
    }
}
