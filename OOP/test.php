<?php
// для нашей задачи есть статья https://code.tutsplus.com/ru/tutorials/basics-of-object-oriented-programming-in-php--cms-31910

// У нас есть массив товаров
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
// Далее нужно создать класс Product для обработки наших товаров, в классе должны быть методы 

class Product  {
    // для начала работы с классами понять чем отличается private public static protected методы

    // в классе будут методы (пример):
    // __construct - для передачи нашего товара
    // prictToUSD - для конвертации цены товара в USD можно просто взять фикс курс 75р
    // quantityToText - для конвертации остатков в много, мало, достаточно (мало меньше 5, достаточно меньше 15, много больше 15)
    
    // Наш класс Product должен вернуть нам наш товар уже в обьекте.
}

// Далее мы переопределим наш класс Product создадим новый NewProduct и добавим новый формат валюты в китайской йена

// пример работы
$renderProduct = [];

foreach($products as $product) {
    $renderProduct[] = new Product($product);
}

var_dump($renderProduct); // наш список товаров с обьектами.




