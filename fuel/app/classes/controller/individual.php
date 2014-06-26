<?php
//look into APPPATH.'bootrstrap.php'
namespace KB\Strategy;

use KB\Strategy\mainInterface;
use KB\Book;

class Individual extends \Controller  {

	public function __construct() {}

	public function setPrice(Book $book) {
		$book->setPrice($book->price + 5);
	}
}