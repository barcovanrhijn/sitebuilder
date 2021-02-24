<?php

$json = file_get_contents('http://bdmdatafeeds.dev1/api/get_article_pages.php?passkey=36ab2ecc3b0d4ec3a3ec321989cfcc12&site_id=1');
$arr = json_decode($json, true);

// foreach ($arr as $r){
//     echo "<p>ID:".$r['pr_product_id']."</p>";
//     echo "<p>Active:".$r['pr_active']."</p>";
//     echo "<p>Header:".$r['pr_header']."</p>";
// }
// $pr = "ar_"
// print_r($arr[0][{$pr.'verify'}]);
//var_dump($obj);
//echo $obj[0]->'ar_verify';

// Create an Iterator
class MyIterator implements Iterator {
    private $items = [];
    private $pointer = 0;
  
    public function __construct(&$array1) {
      // array_values() makes sure that the keys are numbers
      $this->items = $array1;
    }
  
    public function current() {
      return $this->items[$this->pointer];
    }
  
    public function key() {
      return $this->pointer;
    }
  
    public function next() {
      $this->pointer++;
    }
  
    public function rewind() {
      $this->pointer = 0;
    }
  
    public function valid() {
      // count() indicates how many items are in the list
      return $this->pointer < count($this->items);
    }
  }
  
  // A function that uses iterables
  function printIterable(iterable $myIterable) {
    foreach($myIterable as $item) {
      echo $item;
    }
  }
  
  // Use the iterator as an iterable
  $iterator = new MyIterator($arr);
  printIterable($iterator);
  ?>
  
