<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FilterTrait
{
    /**
     * Фильтр
     * @param Request $request
     * @return array
     */
    public static function getFilterSort(Request $request){
        $result = [];

        if($request->has('box_count')){
            $result['sort']['box_count'] = trim($request->input('box_count'));
        }
        if($request->has('receipt_date')){
            $result['sort']['receipt_date'] = trim($request->input('receipt_date'));
        }

        return [
            'sort' => $result['sort'] ?? [],
        ];
    }


}
