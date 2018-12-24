<?php

namespace App;


class Cart
{
  public $items = null;
  public $totalQty = 0;
  public $totalPrice = 0;

  public function __construct($oldCart) {
    if($oldCart) {
      $this->items = $oldCart->items;
      $this->totalQty = $oldCart->totalQty;
      $this->totalPrice = $oldCart->totalPrice;
    }
  }

  public function add($item, $id) {
    $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    if($this->items) {
      if(array_key_exists($id, $this->items)) {
        $storedItem = $this->items[$id];
      }
    }
    $storedItem['qty']++;
    $storedItem['price'] = $item->price * $storedItem['qty'];
    $this->items[$id] = $storedItem;
    $this->totalQty++;
    $this->totalPrice += $item->price;
  }

  public function isEmpty() {
    return $this->items == null || empty($this->items);
  }

  public function removeProduct($item, $id, $quantity) {
    if($this->items && array_key_exists($id, $this->items)) {
      $itemToRemove = $this->items[$id];
      if($itemToRemove['qty'] <= $quantity) {
        $this->totalPrice -= $itemToRemove['price'];
        $this->totalQty -= $itemToRemove['qty'];
        unset($this->items[$id]);
      } else {
        $this->totalPrice -= $item->price * $quantity;
        $this->totalQty -= $quantity;
        $itemToRemove['qty'] -= $quantity;
        $itemToRemove['price'] -= $item->price * $quantity;
        $this->items[$id] = $itemToRemove;
      }
    }
  }

}
