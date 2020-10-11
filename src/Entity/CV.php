<?php

namespace App\Entity;

use App\Repository\CVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CVRepository::class)
 */
class CV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $competences;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $experiences;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $formations;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hobbies;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $social;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subtitle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getCompetences(): ?array
    {
        return isset($this->competences) ? unserialize($this->competences) : null;
    }

    public function setCompetences(?array $competences): self
    {
        $this->competences = serialize($competences);

        return $this;
    }

    public function getExperiences(): ?array
    {
        return isset($this->experiences) ? unserialize($this->experiences) : null;
    }

    public function setExperiences(?array $experiences): self
    {
        $this->experiences = serialize($experiences);

        return $this;
    }

    public function getFormations(): ?array
    {
        return isset($this->formations) ? unserialize($this->formations) : null;
    }

    public function setFormations(?array $formations): self
    {
        $this->formations = serialize($formations);

        return $this;
    }

    public function getHobbies(): ?array
    {
        return isset($this->hobbies) ? unserialize($this->hobbies) : null;
    }

    public function setHobbies(?array $hobbies): self
    {
        $this->hobbies = serialize($hobbies);

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSocial(): ?string
    {
        return unserialize($this->social);
    }

    public function setSocial(?string $social): self
    {
        $this->social = serialize($social);

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function addCompetence(array $competence){
        $competences = unserialize($this->competences) ? unserialize($this->competences) : [];
        array_push($competences, $competence);
        $this->competences = serialize($competences);
        return $this;
    }

    public function addExperience(array $experience){
        $experiences = unserialize($this->experiences) ? unserialize($this->experiences) : [];
        array_push($experiences, $experience);
        $this->experiences = serialize($experiences);
        return $this;
    }

    public function addFormation(array $formation){
        $formations = unserialize($this->formations) ? unserialize($this->formations) : [];
        array_push($formations, $formation);
        $this->formations = serialize($formations);
        return $this;
    }

    public function addHobby(array $hobby){
        $hobbies = unserialize($this->hobbies) ? unserialize($this->hobbies) : [];
        array_push($hobbies, $hobby);
        $this->hobbies = serialize($hobbies);
        return $this;
    }
}
