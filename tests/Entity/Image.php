<?php

namespace MeiliSearch\Bundle\Test\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Image
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * Image constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->id  = $attributes['id'] ?? null;
        $this->url = $attributes['url'] ?? 'https://docs.meilisearch.com/logo.png';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Image
    {
        $this->id = $id;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Image
    {
        $this->url = $url;

        return $this;
    }

    public function isPublic(): bool
    {
        return true;
    }
}
