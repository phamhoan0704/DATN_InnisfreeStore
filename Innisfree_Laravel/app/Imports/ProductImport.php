<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'Y-m-d H:i:s')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
    public function model(array $row)
    {
        return new Product([
            'product_name'=>$row[0],
            'product_year'	=>$this->transformDate($row[1]),
            'product_price'	=>$row[2],
            'product_price_pre'=>$row[3],
            'product_image'	=>$row[4],
            'product_detail'=>$row[5],
            'product_manual'=>$row[6],		
            'product_quantity'=>$row[7],
            'active'	=>$row[8],
            'category_id' =>$row[9],
            'supplier_id' =>$row[10],
            'product_capacity'=>$row[11],
            'product_ingredient'=>$row[12],
            'product_useNote'=>$row[13],
            'product_expiry'=>$this->transformDate($row[14]),
        ]);
    }
}
