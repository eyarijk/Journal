<?php
/**
 * Created by PhpStorm.
 * User: mrevrey
 * Date: 25.05.18
 * Time: 15:59
 */

namespace App\Traits;


use App\Journal;

trait JournalTrait
{
    public function getMonth($journals)
    {
        $years  = [];

        foreach ($journals as $journal){
            $years[$journal->year][] = $journal->month;
        }

        $return = [];

        foreach ($years as $key => $year){
            $return[$key] = array_sort(array_unique($year));

        }

        return $return;
    }

    public function getNameOfMonth($number)
    {
        switch ($number) {
            case 1:
                return "Січень";
                break;
            case 2;
                return "Лютий";
                break;
            case 3:
                return "Березень";
                break;
            case 4:
                return "Квітень";
                break;
            case 5;
                return "Травень";
                break;
            case 6:
                return "Червень";
                break;
            case 7:
                return "Липень";
                break;
            case 8;
                return "Серпень";
                break;
            case 9:
                return "Вересень";
                break;
            case 10:
                return "Жовтень";
                break;
            case 11;
                return "Листопад";
                break;
            case 12:
                return "Грудень";
                break;
        }
    }
}