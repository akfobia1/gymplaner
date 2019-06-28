<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrainingRepository")
 */
class Training
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
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="purpose", type="string", length=100)
     */
    private $purpose;


    /**
     * Get id
     *
     * @return int
     */

    /**
     * @ORM\ManyToOne(targetEntity="Plan", inversedBy="trainings")
     * @ORM\JoinColumn(name="plan_id", referencedColumnName="id")
     */
    private $plan;

    private $exercises;

    public function __construct()
    {
        $this->exercises = new ArrayCollection(); }

    public function __toString()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Training
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
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Training
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set purpose
     *
     * @param string $purpose
     *
     * @return Training
     */
    public function setPurpose($purpose)
    {
        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }

    /**
     * Set plan
     *
     * @param \AppBundle\Entity\Plan $plan
     *
     * @return Training
     */
    public function setPlan(\AppBundle\Entity\Plan $plan = null)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return \AppBundle\Entity\Plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Add exercise
     *
     * @param \AppBundle\Entity\Exercise $exercise
     *
     * @return Training
     */
    public function addExercise(\AppBundle\Entity\Exercise $exercise)
    {
        $this->exercises[] = $exercise;

        return $this;
    }

    /**
     * Remove exercise
     *
     * @param \AppBundle\Entity\Exercise $exercise
     */
    public function removeExercise(\AppBundle\Entity\Exercise $exercise)
    {
        $this->exercises->removeElement($exercise);
    }

    /**
     * Get exercises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExercises()
    {
        return $this->exercises;
    }
}
