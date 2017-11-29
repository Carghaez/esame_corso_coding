<?php

function esercizio1(array $A, array $B, array $C)
{
  $D = [];
  for ($i=0; $i < count($A); ++$i) {
    $D[] = min($A[$i], $B[$i], $C[$i]);
  }
  return $D;
}


$a = [
  4,
  9,
  12,
  13,
];


$b = [
  5,
  8,
  10,
  14,
];


$c = [
  6,
  7,
  11,
  15,
];

echo json_encode(esercizio1($a, $b, $c));