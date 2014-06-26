<?php
//look into APPPATH.'bootrstrap.php'
namespace KB;

class Book extends \Controller  {
	public $title;
	public $author;
	public $price;

	public function __construct($title = 'unknown', $author = 'unknown', $price = 0) {
		$this->title  = $title;
		$this->author = $author;
		$this->price  = $price;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getDetails() {
		return "'".$this->title. "' has been wroted by ". $this->author . " and costs you " . $this->price ." Eur.<br/>";
	}

	public function setPrice($newPrice) {
		$this->price = $newPrice;
	}

}