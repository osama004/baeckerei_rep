<?php

namespace App;

class Cart
{
    public $items; // array of products
    public $totalQuantity ;
    public $totalPrice ;

    public function __construct($previousCart)
    {
        $previousCart != null ? $this->items = $previousCart->items : $this->items = [];

        $this->totalQuantity = $previousCart->totalQuantity ?? 0;
        $this->totalPrice = $previousCart->totalPrice ?? 0;
    }

    public function addItem($product_id, $product) {

        // the price is string "30 €". it should be converted back to int
        $price = (int) str_replace("€", '',$product->price);

        // check if product exists in items (cart)
        if (array_key_exists($product_id, $this->items)) {
            $productToAdd = $this->items[$product_id];
            $productToAdd['quantity']++;
        }
        else
        {
            $productToAdd = ['quantity' => 1, 'price'=> $price , 'data' =>$product];
        }

        $this->items[$product_id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;
    }
}
