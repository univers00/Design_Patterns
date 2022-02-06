<?php

namespace App\Style;

use App\FurnitureDesign;
use App\FurnitureStyleDesign;
use App\Victorian\Chair;
use App\Victorian\CoffeTable;
use App\Victorian\Sofa;


class Victorian implements FurnitureStyleDesign
{


    public function creatSofa(): FurnitureDesign
    {
       return new Sofa();
    }

    public function creatChair(): FurnitureDesign
    {
      return new Chair();
    }

    public function creatCoffeTable(): FurnitureDesign
    {
        return new CoffeTable();
    }
}