<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

interface iButton{
    public function showButton();
}
interface iCounters{
    public function showCounter();
}
interface iMagnifier{
    public function showMagnifier();
}
abstract class Products implements iButton, iCounters, iMagnifier
{
    protected $title;
    protected $price;
    protected $weight;
    protected $weightType;
    public static $companyName = 'Шоколадное подворье';
// константа
    const YEAR_START = 2019;
//    статитический метод
    public static function showCompanyInfo()
    {
        echo self::YEAR_START . "<br>";
        echo self::$companyName . "<br>";
    }

    //подсчитвает количество созданых классов общее
    public static $counter = 0;


    public function __construct(string $title,int $price,int $weight,string $weightType)
        {
            $this->title = $title;
            $this->price = $price;
            $this->weight =$weight;
            $this->weightType = $weightType;
            //подсчитвает количество созданых классов общее
            ++self::$counter;
        }
//       абстрактный метод только наследуеться получает данные $this->image
    abstract function showImage($image);
    public function printProduct()
        {
        echo "
            <div class=''>
                <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #000; background:transparent; font-size: 16px; min-width: 280px; max-width: 280px; padding: 5px'>
               <!-- получаем карти -->
                    <div style='background: center / cover url({$this->showImage($this->image)}) no-repeat; max-width: 292px; height: 212px;'></div>
                     
                    <div>Наименовние: {$this->title} </div>
                    <div >Вес: {$this->weight} {$this->weightType}</div>
                    <div >Цена: {$this->price} ₽ за {$this->weight} {$this->weightType}.</div>
                   
                    <div>С НДC</div>
                    
                </div>
            </div>
            ";
        }
        public function showPriceNotTaxable()
        {
            $this->price = round($this->price - (($this->price /120)*20), 2);
            echo "
                <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #fff; background: #000; font-size: 16px; min-width: 280px; padding: 5px'>
                     <div >Цена: {$this->price} ₽ за {$this->weightType}.</div>
                      <div>Без НДC</div>
                </div>
        
            ";


        }


}
class Chocolate extends Products
{
    protected $calories;
    protected $image;
    public function __construct($title,  $price,  $weight, $weightType, string $image, int $calories = 0){
        $this->calories=$calories;
        $this->image=$image;
        parent::__construct($title, $price, $weight, $weightType);
    }

    public function __set($name, $value)
    {
        echo "Вы не можете присвоить значение $value несуществующему свойству $name <br>";
    }
    public function printProduct()
    {
        echo "
            <div class=''>
                <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #000; background:transparent; font-size: 16px; min-width: 280px; max-width: 280px; padding: 5px'>
               <!-- получаем карти -->
                    <div style='background: center / cover url({$this->showImage($this->image)}) no-repeat; max-width: 292px; height: 212px;'>
                    {$this->showMagnifier()}
                    </div>
                     
                    <div>Наименовние: {$this->title} </div>
                    <div >Вес: {$this->weight} {$this->weightType}</div>
                    <div >Цена: {$this->price} ₽ за {$this->weight} {$this->weightType}.</div>
                   
                    <div>С НДC</div>
                    <form action=''>
                       <div>{$this->showCounter()}</div>
                       <div>{$this->showButton()}</div>
                    </form>
                </div>
            </div>
            ";
    }
//    возвращаем картинку
    public function showImage($image)
    {
        return $image;
    }
//    кнопка заказать
    public function showButton(): string
    {
        return "<button type='submit'>Заказать</button> ";
    }
//    счетчик
    public function showCounter(): string
    {
        return "<button class='plus'>+</button>
                   <input type='number' class='count' name='count'>
                <button class='minus'>-</button>
                ";
    }
    public function showMagnifier(): string
    {
        return "<button class='magnifier'>+</button>";
    }
}
class Candy extends Products
{
    protected $image;
    public function __construct($title,  $price,  $weight, $weightType,string $image){
        $this->image=$image;
        parent::__construct($title, $price, $weight, $weightType);
    }
    public function printProduct()
    {
        echo "
            <div class=''>
                <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #000; background:transparent; font-size: 16px; min-width: 280px; max-width: 280px; padding: 5px'>
               <!-- получаем карти -->
                    <div style='background: center / cover url({$this->showImage($this->image)}) no-repeat; max-width: 292px; height: 212px;'>
                    {$this->showMagnifier()}
                    </div>
                     
                    <div>Наименовние: {$this->title} </div>
                    <div >Вес: {$this->weight} {$this->weightType}</div>
                    <div >Цена: {$this->price} ₽ за {$this->weight} {$this->weightType}.</div>
                   
                    <div>С НДC</div>
                    <form action=''>
                       <div>{$this->showCounter()}</div>
                       <div>{$this->showButton()}</div>
                    </form>
                </div>
            </div>
            ";
    }
    public function showImage($image)
    {
        return $image;
    }
//    кнопка заказать
    public function showButton(): string
    {
        return "<button type='submit'>Заказать</button> ";
    }
//    счетчик
    public function showCounter(): string
    {
        return "<button class='plus'>+</button>
                   <input type='number' class='count' name='count'>
                <button class='minus'>-</button>
                ";
    }
    public function showMagnifier(): string
    {
        return "<button class='magnifier'>+</button>";
    }
    public function __get($name)
    {
        // TODO: Implement __get() method.
        echo "Нельзя обратиться к свойству с именем $name <br>";
    }
}

echo "<h1>Название компании: " . Candy::$companyName . "</h1>";
echo "<p style='font: small-caps bold 24px/1 sans-serif;'>Основана в " . Candy::YEAR_START . "году.</p>";
echo "<div style='display: flex; align-items: center;'>";
$candyOne = new Candy('Конфеты', 200, 500, 'гр', 'candy.jpg');
$chocolateOne = new Chocolate('Шоколад', 150, 250, 'гр', 'chocolate.jpg');
$candyOne->printProduct();
$chocolateOne->printProduct();
//$chocolateOne->showPriceNotTaxable();
$chocolateTwo = new Chocolate('Шоколад с Арахисом', 500, 1000, 'гр', 'chocolateTwo.png');
$chocolateTwo->printProduct();
echo "</div>";
echo "<div>Всего товаров:" . Candy::$counter . "</div>";

?>

</body>
</html>

