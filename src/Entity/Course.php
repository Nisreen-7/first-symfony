<?php

namespace App\Entity;


class Course
{



	private string $title;
	private string $subject;
	private string $content;
	private \DateTime $published;
	private ?int $id;

	public function __construct(string $title, string $subject, string $content, \DateTime $published, ?int $id = null)
	{

		$this->title = $title;
		$this->subject = $subject;
		$this->content = $content;
		$this->published = $published;
		$this->id = $id;

	}




	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSubject(): string
	{
		return $this->subject;
	}

	/**
	 * @param string $subject 
	 * @return self
	 */
	public function setSubject(string $subject): self
	{
		$this->subject = $subject;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @param string $content 
	 * @return self
	 */
	public function setContent(string $content): self
	{
		$this->content = $content;
		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getPublished(): \DateTime
	{
		return $this->published;
	}

	/**
	 * @param \DateTime $published 
	 * @return self
	 */
	public function setPublished(\DateTime $published): self
	{
		$this->published = $published;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}
}