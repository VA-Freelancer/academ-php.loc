<?php
abstract class Products
{
    protected string $title;
    protected int $price;
    protected int $weight;
    protected string $weightType;

    public function __construct($title, $price, $weight, $weightType)
        {
            $this->title = $title;
            $this->price = $price;
            $this->weight =$weight;
            $this->weightType = $weightType;
        }
    public function printProduct()
        {
        echo "
            <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #000; background:transparent; font-size: 16px; max-width: 280px; padding: 5px'>
                {$this->showImage()}
                 
                <div>Наименовние: {$this->title} </div>
                <div >Вес: {$this->weight} {$this->weightType}</div>
                <div >Цена: {$this->price} ₽ за {$this->weightType}.</div>
               
                <div>С НДC</div>
                
            </div>
            ";
        }
        public function showPriceNotTaxable()
        {
            $this->price = round($this->price - (($this->price /120)*20), 2);
            echo "
            <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #fff; background: #000; font-size: 16px; max-width: 280px; padding: 5px'>
                 <div >Цена: {$this->price} ₽ за {$this->weightType}.</div>
                  <div>Без НДC</div>
            </div>
        
            ";


        }
        abstract function showImage($image);

}



class Chocolate extends Products
{
    protected int $calories;
    protected string $image;
    public function __construct($title,  $price,  $weight, $weightType, $image, $calories = 0){
        $this->calories=$calories;
        $this->image=$image;
        parent::__construct($title, $price, $weight, $weightType);
    }

    public function showImage($image='chocolate.jpg')
    {
        echo "<div style='background: center / cover url({$this->image}) no-repeat; max-width: 292px; height: 212px;'></div>";
    }
}
class Candy extends Products
{
    protected string $image;
    public function __construct($title,  $price,  $weight, $weightType, $image){
        $this->image=$image;
        parent::__construct($title, $price, $weight, $weightType);
    }
    public function showImage($image='candy.jpg')
    {
        echo "<div style='background: center / cover url({$this->image}) no-repeat; max-width: 292px; height: 212px;'></div>";
    }
}

$candyOne = new Candy('Конфеты', 200, 500, 'гр', 'candy.jpg');
$chocolateOne = new Chocolate('Шоколад', 150, 250, 'гр', 'chocolate.jpg');
$candyOne->printProduct();
$chocolateOne->printProduct();
$chocolateOne->showPriceNotTaxable();
$chocolateTwo = new Chocolate('Шоколад с Арахисом', 500, 1000, 'гр', 'chocolateTwo.png');
$chocolateTwo->printProduct();