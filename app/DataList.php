<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class DataList extends Model{
    protected $table='data_list';//指定資料庫
    protected $fillable=['main_keyword','second_keyword','product_description','price','color','part','thickness','size','instruction_for_use','instruction_for_others'];//允許修改的欄位
}
?>