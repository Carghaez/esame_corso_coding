<?php

abstract class A
{
  protected $x;

  public function setX(int $x): void
  {
    $this->x = $x / 2;
  }

  public function f(): int
  {
    return pow($this->x, 2);
  }
}

class D
{
  protected $z;

  function __construct()
  {
    $this->z = [];
  }

  public function add(int $z): D
  {
    $this->z[] = $z;
    return $this;
  }

  public function getZ(): int
  {
    $sum = 0;
    for ($i=0; $i < count($this->z); ++$i) {
      $sum += $this->z[$i];
    }
    return $sum;
  }
}

class B
  extends A
{
  protected $y;
  private $d;

  function __construct()
  {
    $this->d = new D();
    $this->d
      ->add(1)
      ->add(2)
      ->add(3);
  }

  public function setY(int $y): void
  {
    $this->y = $y * 2;
  }

  public function f(): int
  {
    $sum = $this->y; // 4
    $sum += parent::f(); // 16
    $sum += $this->d->getZ(); // 6
    return $sum;
  }
}

$x = isset($_GET['x'])? $_GET['x'] : 8;
$y = isset($_GET['y'])? $_GET['y'] : 2;

$b = new B();
$b->setX($x);
$b->setY($y);
echo $b->f();