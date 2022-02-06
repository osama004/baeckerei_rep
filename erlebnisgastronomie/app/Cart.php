<?php

namespace App;

class Cart
{
    public $items; // array of products ['product_id' => ['quantity' => , 'price', 'data' => [....]]
    public $totalQuantity ;
    public $totalPrice  ;

    public function __construct($previousCart)
    {
        $previousCart != null ? $this->items = $previousCart->items : $this->items = [];

        $this->totalQuantity = $previousCart->totalQuantity ?? 0;
        $this->totalPrice = $previousCart->totalPrice ?? 0;
    }

    public function addItem($product_id, $product) {

        // the price is string "30 €". it should be converted back to int
        $price = (float) str_replace("€", '',$product->price);
        // check if product exists in items (cart)
        if (array_key_exists($product_id, $this->items)) {
            $productToAdd = $this->items[$product_id];
            $productToAdd['quantity']++;
            $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] * $price;
        }
        else
        {
            $productToAdd = ['quantity' => 1, 'totalSinglePrice'=> $price , 'data' =>$product];
        }

        $this->items[$product_id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;



    }

    public function updatePriceAndQuantity()
    {
        $totalPriceLocal = 0;
        $totalQuantityLocal = 0;

        foreach ($this->items as $item) {
            $totalQuantityLocal += $item['quantity']; // $totalQuantityLocal = $totalQuantityLocal + $item['quantity'];
            $totalPriceLocal += $item['totalSinglePrice'];
        }
        $this -> totalPrice = $totalPriceLocal;
        $this -> totalQuantity = $totalQuantityLocal;
    }
}
