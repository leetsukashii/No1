<?php
namespace Lee\Bundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass = "userRepository")
 * @ORM\Table(name = "user")
 */
class user{
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type = "string")
     */
    protected $username;
    /**
     * @ORM\Column(type = "string")
     */
    protected $password;

    /**
     * @ORM\Column(type = "string")
     */
    protected $email;

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
     * Set username
     *
     * @param string $username
     * @return user
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @OneToMany(targetEntity = "blog", mappedBy = "user")
     */
    private $blogs;

    public function  __construct(){
        $this->blogs = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * Add blogs
     *
     * @param \Lee\Bundle\Entity\blog $blogs
     * @return user
     */
    public function addBlog(\Lee\Bundle\Entity\blog $blogs)
    {
        $this->blogs[] = $blogs;

        return $this;
    }

    /**
     * Remove blogs
     *
     * @param \Lee\Bundle\Entity\blog $blogs
     */
    public function removeBlog(\Lee\Bundle\Entity\blog $blogs)
    {
        $this->blogs->removeElement($blogs);
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * @OneToMany(targetEntity="comment",mappedBy="user")
     */
    private $comments;

    /**
     * Add comments
     *
     * @param \Lee\Bundle\Entity\comment $comments
     * @return user
     */
    public function addComment(\Lee\Bundle\Entity\comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Lee\Bundle\Entity\comment $comments
     */
    public function removeComment(\Lee\Bundle\Entity\comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
