<?php
//look into APPPATH.'bootrstrap.php'
namespace KB\Strategy;

use KB\Book;
use KB\Strategy\Retail;
use KB\Strategy\Individual;
use KB\Strategy\Metro;

class myStrategy extends \Controller {

	private $strategy;

	public function __construct($type = 'individual') {
		switch ($type)
		{
			case 'retail':
				$this->strategy = new Retail();
			break;

			case 'metro':
				$this->strategy = new Metro();
			break;

			case 'individual':
			default:
				$this->strategy = new Individual();
			break;
		}
	}

	public function setDetails(Book $book) {
    	return $this->strategy->setPrice($book);
    }

}