<?php

namespace App\Entity;

use App\Entity\Traits\SortablePositionTrait;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    use TimestampableTrait;
    use SortablePositionTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Text;

    /**
     * @ORM\Column(type="integer")
     */
    private $UpVote;

    /**
     * @ORM\Column(type="integer")
     */
    private $DownVote;

    /**
     * @ORM\Column(type="integer")
     */
    private $Scores;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getUpVote(): ?int
    {
        return $this->UpVote;
    }

    public function setUpVote(int $UpVote): self
    {
        $this->UpVote = $UpVote;

        return $this;
    }

    public function getDownVote(): ?int
    {
        return $this->DownVote;
    }

    public function setDownVote(int $DownVote): self
    {
        $this->DownVote = $DownVote;

        return $this;
    }

    public function getScores(): ?int
    {
        return $this->Scores;
    }

    public function setScores(int $Scores): self
    {
        $this->Scores = $Scores;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
