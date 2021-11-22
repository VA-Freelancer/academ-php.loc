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

abstract class Products
{
    protected $title;
    protected $description;
    protected $price;
    protected $quantity;
    public function __construct(string $title, string $description, int $price,int $quantity)
    {

    }
}

$renderProduct = [];

foreach($products as $product) {
    $renderProduct[] = Product($product);
}

var_dump($renderProduct); // наш список товаров с обьектами.