<?php
namespace Lee\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity(repositoryClass = "commentRepository")
 * @ORM\Table(name = "comment")
 */
class comment{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type = "text")
     */
    protected $comment;
    /**
     * @ORM\Column(type = "datetime")
     */
    protected $createAt;

    /**
     * @ManyToOne(targetEntity="user",inversedBy="comments")
     * @JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return comment
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set user
     *
     * @param \Lee\Bundle\Entity\user $user
     * @return comment
     */
    public function setUser(\Lee\Bundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Lee\Bundle\Entity\user 
     */
    public function getUser()
    {
        return $this->user;
    }
}
