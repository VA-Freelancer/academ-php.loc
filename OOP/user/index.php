<?php
// abstract - нельзя использовать но можно наследовать
abstract class User
{
	protected $name;
	protected $surname;
	protected $age;



	public function __construct($name, $surname, $age)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->age = $age;
	}

	public function printInfo()
	{
		echo "$this->name $this->surname с возростом $this->age лет <br>";
	}
}
class GoodUser extends User
{
	public $karma;
	public function __construct($name, $surname, $age, $karma)
{
	$this->karma = $karma;
	parent::__construct($name, $surname, $age);

}
	public function printInfo()
	{
		echo "$this->name $this->surname с возростом $this->age лет, карма $this->karma <br>";
	}
}
// нельзя наследовать финальный класс
final class BadUser extends User
{
	public $badPosts;

	const TEST = 123;

	public static $testStatic = 'test static';
	public static function getStaticAndConst()
	{
//		 ::self ссылаеться на себя, дает доступ к Константам и Статическим свойствам
		echo self::TEST . "<br>";
		echo self::$testStatic . "<br>";
		echo BadUser::TEST . "<br>";
		echo BadUser::$testStatic . "<br>";
	}
	public function __construct($name, $surname, $age, $badPosts)
	{
		$this->badPosts = $badPosts;
		parent::__construct($name, $surname, $age);
	}
	public function printInfo()
	{
		echo "$this->name $this->surname с возростом $this->age лет, плохих постов $this->badPosts <br>";
	}
}
$human = new GoodUser('Артем', 'Петров', 40, 1000);

$human->printInfo();

$humanBad = new BadUser('Иван', 'Иванов', 30, 77);
$humanBad->printInfo();
echo BadUser::TEST . "<br>";
echo BadUser::$testStatic . "<br>";
//$humanBad->getStaticAndConst();
//BadUser::getStaticAndConst();