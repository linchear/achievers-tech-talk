<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-20
 * Time: 9:54 PM
 */

namespace Tax\Service;


use Tax\Definitions\Provinces;

class Tax
{
    public function getRate($province)
    {
        if ($province == Provinces::ON) {
            return 0.15;
        } else if (strtoupper($province) == Provinces::QC) {
            return 0.13;
        }

        return 0;
    }
}