<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PokemonAttackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass=PokemonAttackRepository::class)
 */
class PokemonAttack
{
    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Attack::class, inversedBy="pokemonAttacks")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(1)
     */
    private $attack;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Pokemon::class, inversedBy="pokemonAttacks")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(1)
     */
    private $pokemon;

    public function __construct(Attack $attack, Pokemon $pokemon)
    {
        $this->attack = $attack;
        $this->pokemon = $pokemon;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getAttack(): ?Attack
    {
        return $this->attack;
    }

    public function getPokemon(): ?Pokemon
    {
        return $this->pokemon;
    }
}
