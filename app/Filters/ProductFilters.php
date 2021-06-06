<?php


namespace App\Filters;


class ProductFilters extends QueryFilter
{
    public function categories($id)
    {
        return $this->builder->with('category')->whereHas('category',function($query) use ($id){$query->whereIn('id',$this->paramToArray($id));});
    }

}
