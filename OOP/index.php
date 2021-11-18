<?php

class Article
{
    protected $title;
    protected $titleFontSize;
    protected $articleBody;
    protected $articleBodyFontSize;
    protected $border;
    protected $bg;

    public function __construct(string $title,  string $articleBody,  string $border, string $bg, int $articleBodyFontSize=14, int $titleFontSize=20)
    {
        $this->title = $title;
        $this->titleFontSize = $titleFontSize;
        $this->articleBody = $articleBody;
        $this->articleBodyFontSize = $articleBodyFontSize;
        $this->border = $border;
        $this->bg = $bg;
    }

    public function printArticle()
    {
        echo "<div style='border: {$this->border}; background: {$this->bg}; font-size: {$this->articleBodyFontSize}px'>
                <h2 style='font-size: {$this->titleFontSize}px;'>{$this->title}</h2>
                <span>{$this->articleBody}</span>
              </div>";
    }
}


class SportArticle extends Article
{
    protected $image;
    public function __construct(string $title,  string $articleBody,  string $border, string $bg,string $image, int $articleBodyFontSize=14, int $titleFontSize=20){
        $this->image = $image;
        parent::__construct($title, $articleBody, $border, $bg, $articleBodyFontSize, $titleFontSize);
    }
    public function printArticle(){
        echo "<div style='border: {$this->border}; background: {$this->bg}; font-size: {$this->articleBodyFontSize}px'>
                <h2 style='font-size: {$this->titleFontSize}px;'>{$this->title}</h2>
                <span>{$this->articleBody}</span>
                <img style='max-width: 200px' src='{$this->image}' alt='картинка'>
              </div>";
    }
}
class WeatherArticle extends Article
{
    public function __construct(string $title,  string $articleBody,  string $border, string $bg, int $articleBodyFontSize=14, int $titleFontSize=20){

        parent::__construct($title, $articleBody, $border, $bg, $articleBodyFontSize, $titleFontSize);
    }
    public function printArticle(){
        echo "<div style='border: {$this->border}; background: {$this->bg}; font-size: {$this->articleBodyFontSize}px'>
                <h2 style='font-size: {$this->titleFontSize}px;'>{$this->title}</h2>
                <span>{$this->articleBody}</span>
               <span>{$this->getTemperature()}</span>
              </div>";
    }
    private  function getTemperature(){
        return '20';
    }
}
// полиморфизм
class PoliticsArticle extends Article
{
    protected $link;
    public function __construct(string $title,  string $articleBody,  string $border, string $bg,string $link, int $articleBodyFontSize=14, int $titleFontSize=20){
        $this->link= $link;
        parent::__construct($title, $articleBody, $border, $bg, $articleBodyFontSize, $titleFontSize);
    }
    public function printArticle(){
        echo "<div style='border: {$this->border}; background: {$this->bg}; font-size: {$this->articleBodyFontSize}px'>
                <h2 style='font-size: {$this->titleFontSize}px;'>{$this->title}</h2>
                <span>{$this->articleBody}</span>
               <a href='{$this->link}'>Ссылка</a>
              </div>";
    }
}
$sportsNews = new SportArticle('Заголовок статьи про спорт', 'lorem lorem lorem', '2px solid red', '#eee', '1.jpg');

$sportsNews->printArticle();

$weatherNews = new WeatherArticle('Заголовок статьи про Погоду', 'lorem lorem lorem', '2px solid green', '#fff');
$weatherNews->printArticle();
$politicNews = new PoliticsArticle('Заголовок статьи про Политику', 'lorem lorem lorem', '2px solid blue', '#fff', 'https://google.com');
$politicNews->printArticle();