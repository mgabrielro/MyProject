<?php
//look into APPPATH.'bootrstrap.php'
use KB\Book;
use KB\Strategy\myStrategy;

class Controller_Test extends \Controller {

	public function action_index() {
		$book = new Book('PHP rocks !', 'Daniel Alto', 12.45);
		echo '<pre>Book details <strong>WITHOUT ANY</strong> strategy:<br/>'; print_r($book->getDetails());

		$strategy = new myStrategy();
		echo $strategy->setDetails($book);

		echo '<pre><strong>INDIVIDUAL</strong> strategy:<br/>'; print_r($book->getDetails());

		$strategy = new myStrategy('retail');
		echo $strategy->setDetails($book);

		echo '<pre><strong>RETAIL</strong> strategy:<br/>'; print_r($book->getDetails());

		$strategy = new myStrategy('metro');
		echo $strategy->setDetails($book);

		echo '<pre><strong>METRO</strong> strategy:<br/>'; print_r($book->getDetails());
	}

}


