<?

interface iPrint
{
    public function printSmth();
}
interface iTest
{
    public function getTest();
}
class User implements iPrint, iTest
{
    private $test = 123;

    public function printSmth()
    {
        echo 123 . "<br>";
    }
    public function getTest()
    {

    }
    public function __get($name)
    {
        // TODO: Implement __get() method.
        echo "Нельзя обратиться к свойству с именем $name <br>";
    }
    public function __set($name, $value)
{
    echo "Вы не можете присвоить значение $value несуществующему свойству $name <br>";
}

    public function __call($name, $arguments)
{
    echo "Метода с именем $name не существует <br>";
}
    public function __toString()
    {
        return "Это объект класс User c приватным свойством test и значением {$this->test} <br>";
    }
}

$abc = new User();
echo $abc->test;
$abc->smth = 555;
$abc->getSmth();
echo $abc;
$abc->printSmth();