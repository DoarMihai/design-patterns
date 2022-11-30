<?php

#1
class Book {
	public function open()
	{
		echo "Deschid cartea de hartie.";
	}

	public function turnPage()
	{
		echo "Intorc pagina din cartea de hartie.";
	}
}

#2
class Person{
	public function read($book)
	{
		$book->open();
		$book->turnPage();
	}
}

#3
(new Person())->read(new Book());
// iar acum o sa vedem pe ecran cele 2 mesaje din clasa Book:
//Deschid cartea de hartie.
//Intorc pagina din cartea de hartie.

#4
interface BookInterface {
	public function open();
	public function turnPage();
}

#5
class Book implements BookInterface {
	public function open()
	{
		echo "Deschid cartea de hartie.";
	}

	public function turnPage()
	{
		echo "Intorc pagina din cartea de hartie.";
	}
}

class Person {
	public function read(BookInterface $book)
	{
		$book->open();
		$book->turnPage();
	}
}

#6
interface eReaderInterface {
	public function turnOn();
	public function pressNextButton();
}

class Kindle implements eReaderInterface {
	public function turnOn()
	{
		echo "Pornesc kindle-ul.";
	}

	public function pressNextButton()
	{
		echo "Apas butonul pentru a schimba pagina.";
	}
}

#7
(new Person())->read(new Kindle());

#8
class KindleAdapter implements BookInterface {

	private $kindle;

	public function __construct(Kindle $kindle)
	{
		$this->kindle = $kindle;
	}

	public function open()
	{
		return $this->kindle->turnOn();
	}

	public function turnPage()
	{
		return $this->kindle->pressNextButton();	
	}
}

#9
(new Person())->read(new KindleAdapter(new Kindle()));
// acum codul functioneaza, iar acestea sunt mesajele care apar pe ecran:
//Pornesc kindle-ul.
//Apas butonul pentru a schimba pagina.