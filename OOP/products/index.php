<?php
class Products
{
    public $title;
    public $price;
    public $weight;
    public $weightType;
    protected $VAD;

public function __construct(string $title = 'Хлеб', int $price= 30, int $weight=500,string $weightType='гр', int $VAD=20)
{
    $this->title = $title;
    $this->price = $price;
    $this->weight =$weight;
    $this->weightType = $weightType;
    $this->VAD = $VAD;
}
public function printProductVAD(){
echo "
    <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #fff; background: #000; font-size: 16px; max-width: 280px; padding: 5px'>
        <div>Наименовние: {$this->title}</div>
        <div >Цена: {$this->price} ₽</div>
        <div >Вес: {$this->weight} {$this->weightType}.</div>
        <span>С НДC</span>
    </div>
    ";}
public function printProductNotVAD(){
    if($this->price && $this->VAD){
        $this->price = round($this->price - (($this->price /120)*$this->VAD), 2);
}

echo "
    <div style='font-family: sans-serif; line-height: 20px; border: 1px solid gray; color: #fff; background: #000; font-size: 16px; max-width: 280px; padding: 5px'>
        <div>Наименовние: {$this->title}</div>
        <div >Цена: {$this->price} ₽</div>
        <div >Вес: {$this->weight} {$this->weightType}.</div>
        <span>Без НДC</span>
    </div>
    ";}
}
$bread = new Products();
$potato = new Products('Картофель', 42, 1000);
$milkNotVAD = new Products('Молоко', 68, 800, 'мл');
$milkVAD = new Products('Молоко', 68, 800, 'мл');
$beer = new Products('Пиво "Жигулевское"', 59, 450, 'мл');
$potato->printProductVAD();
$beer->printProductVAD();
$milkVAD->printProductNotVAD();
$milkNotVAD->printProductVAD();
$bread->printProductVAD();