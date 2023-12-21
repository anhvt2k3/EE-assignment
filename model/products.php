<?php
class Products
{
    private $id;
    private $name;
    private $price;
    private $currency;

    public function __construct()
    {
        $this->id = '';
        $this->name = '';
        $this->price = '';
        $this->currency = '';
    }
}
?>