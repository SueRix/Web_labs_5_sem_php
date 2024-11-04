<?php

class Product
{
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description)
    {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function setPrice($price)
    {
        if ($price < 0) {
            throw new Exception("Ціна не може бути негативною.");
        }
        $this->price = $price;
    }

    public function getInfo()
    {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}\n";
    }
}

class DiscountedProduct extends Product
{
    private $discount;

    public function __construct($name, $price, $description, $discount)
    {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice()
    {
        return $this->price * (1 - $this->discount / 100);
    }

    public function getInfo()
    {
        $discountedPrice = $this->getDiscountedPrice();
        return parent::getInfo() . "Знижка: {$this->discount}%\nНова ціна: {$discountedPrice}\n";
    }
}

class Category
{
    public $name;
    public $products = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
    }

    public function getProductsInfo() 
    {
        echo "Категорія: {$this->name}\n";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "\n";
        }
    }
}

try {
    $product1 = new Product("Відьмак", 299, "м'яка палітурка, 432 c., 145х215 мм");
    $product2 = new Product("1984", 410, "жорстка палітурка, 328 c., 140х210 мм");
    $discountedProduct = new DiscountedProduct("Сияние", 630, "жорстка палітурка, 512 c., 150х220 мм", 10);

    $category = new Category("Романи");
    $category->addProduct($product1);
    $category->addProduct($product2);
    $category->addProduct($discountedProduct);

    $category->getProductsInfo();
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}

?>
