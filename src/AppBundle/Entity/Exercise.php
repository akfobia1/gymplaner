<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exercise
 *
 * @ORM\Table(name="exercise")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExerciseRepository")
 */
class Exercise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="weight", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="sets", type="smallint", nullable=true)
     */
    private $sets;

    /**
     * @var int
     *
     * @ORM\Column(name="reps", type="smallint", nullable=true)
     */
    private $reps;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="breaktime", type="time", nullable=true)
     */
    private $breaktime;

    /**
     * @ORM\ManyToOne(targetEntity="Training")
     * @ORM\JoinColumn(name="training_id", referencedColumnName="id")
     */
    private $trainings;
    public function __construct()
    {
        $this->trainings = new ArrayCollection();
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Exercise
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set weight
     *
     * @param string $weight
     *
     * @return Exercise
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set sets
     *
     * @param integer $sets
     *
     * @return Exercise
     */
    public function setSets($sets)
    {
        $this->sets = $sets;

        return $this;
    }

    /**
     * Get sets
     *
     * @return int
     */
    public function getSets()
    {
        return $this->sets;
    }

    /**
     * Set reps
     *
     * @param integer $reps
     *
     * @return Exercise
     */
    public function setReps($reps)
    {
        $this->reps = $reps;

        return $this;
    }

    /**
     * Get reps
     *
     * @return int
     */
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * Set breaktime
     *
     * @param \DateTime $breaktime
     *
     * @return Exercise
     */
    public function setBreaktime($breaktime)
    {
        $this->breaktime = $breaktime;

        return $this;
    }

    /**
     * Get breaktime
     *
     * @return \DateTime
     */
    public function getBreaktime()
    {
        return $this->breaktime;
    }

    /**
     * Add training.html.twig
     *
     * @param \AppBundle\Entity\Training $training
     *
     * @return Exercise
     */
    public function addTraining(\AppBundle\Entity\Training $training)
    {
        $this->trainings[] = $training;

        return $this;
    }

    /**
     * Remove training.html.twig
     *
     * @param \AppBundle\Entity\Training $training
     */
    public function removeTraining(\AppBundle\Entity\Training $training)
    {
        $this->trainings->removeElement($training);
    }

    /**
     * Get trainings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTrainings()
    {
        return $this->trainings;
    }

    /**
     * Set trainings
     *
     * @param \AppBundle\Entity\Training $trainings
     *
     * @return Exercise
     */
    public function setTrainings(\AppBundle\Entity\Training $trainings = null)
    {
        $this->trainings = $trainings;

        return $this;
    }
}
