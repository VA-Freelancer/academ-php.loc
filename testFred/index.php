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

$products = [
    [
        'title' => 'Product 1',
        'description' => 'Description 1',
        'price' => '1500',
        'quantity' => 11
    ],
    [
        'title' => 'Product 2',
        'description' => 'Description 2',
        'price' => '500',
        'quantity' => 1
    ],
    [
        'title' => 'Product 3',
        'description' => 'Description 3',
        'price' => '2100',
        'quantity' => 20
    ]
];

class Product
{
	protected $title;
	protected $description;
	protected $price;
	protected $quantity;
	protected $quantityText;
	protected $currencyUSD;
    public function __construct($products, $currency)
    {
		$this->title=$products['title'];
		$this->description=$products['description'];
		$this->price=$products['price'];
		$this->quantity=$products['quantity'];
		$this->quantityText=$this->quantityToText($this->quantity);
		$this->currencyUSD=$this->prictToCurrency($currency);
    }
	private function prictToCurrency($currency)
	{
		return round($this->price/$currency, 3);
	}
	private function quantityToText($quantity)
	{
		if($quantity < 5){
			return "мало";
		}
		else if($quantity < 15){
			return "достаточно";
		}
		else if($quantity > 15){
			return "много";
		}
	}
}

class ProductJPY extends Product
{
	private $currencyJPY;
	public function __construct($products, $currency){
		$this->price=$products['price'];
		$this->currencyJPY=$this->prictToCurrency($currency);
		parent::__construct($products, $currency);
	}
	private function prictToCurrency($currency)
	{
		return round($this->price/$currency, 3);
	}
}




$renderProduct = [];
foreach($products as $product) {
	$renderProduct[] = new ProductJPY($product, 1.57);
}









echo "<pre>";
	var_dump($renderProduct);// наш список товаров с обьектами.
echo "</pre>";


//foreach($products as $product) {
//	$renderProduct[] = new NewProduct($product);
//}
//echo "<pre>";
//var_dump($renderProduct); // наш список товаров с обьектами.
//echo "</pre>";


?>

</body>
</html>

