<?php

namespace App\Entity;

class Interests
{
    private int $id;
    private string $interestsLabel;

    public function __construct($data = [])
    {
        foreach ($data as $propertyName => $value) {
            $setter = 'set' . ucfirst($propertyName);

            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
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
        return $this->interestsLabel;
    }

    /**
     * Set the value of interests_label
     */
    public function setInterestsLabel(string $interestsLabel): self
    {
        $this->interestsLabel = $interestsLabel;

        return $this;
    }
}
