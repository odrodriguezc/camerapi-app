<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class PhotoEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extention;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exposure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AWB;

    /**
     * @ORM\Column(type="integer")
     */
    private $resolutionX;

    /**
     * @ORM\Column(type="integer")
     */
    private $resolutionY;

    /**
     * @ORM\Column(type="integer")
     */
    private $brightness;

    /**
     * @ORM\Column(type="integer")
     */
    private $contrast;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effect;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getExtention(): ?string
    {
        return $this->extention;
    }

    public function setExtention(string $extention): self
    {
        $this->extention = $extention;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getExposure(): ?string
    {
        return $this->exposure;
    }

    public function setExposure(string $exposure): self
    {
        $this->exposure = $exposure;

        return $this;
    }

    public function getAWB(): ?string
    {
        return $this->AWB;
    }

    public function setAWB(string $AWB): self
    {
        $this->AWB = $AWB;

        return $this;
    }

    public function getResolutionX(): ?int
    {
        return $this->resolutionX;
    }

    public function setResolutionX(int $resolutionX): self
    {
        $this->resolutionX = $resolutionX;

        return $this;
    }

    public function getResolutionY(): ?int
    {
        return $this->resolutionY;
    }

    public function setResolutionY(int $resolutionY): self
    {
        $this->resolutionY = $resolutionY;

        return $this;
    }

    public function getBrightness(): ?int
    {
        return $this->brightness;
    }

    public function setBrightness(int $brightness): self
    {
        $this->brightness = $brightness;

        return $this;
    }

    public function getContrast(): ?int
    {
        return $this->contrast;
    }

    public function setContrast(int $contrast): self
    {
        $this->contrast = $contrast;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(string $effect): self
    {
        $this->effect = $effect;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): self
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

}
