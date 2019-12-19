<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class DataList extends Model{
    use Sortable;
    protected $table='data_list';//指定資料庫
    protected $fillable=['id','main_keyword','second_keyword','product_description','price','color','part','thickness','size','instruction_for_use','instruction_for_others'];//允許修改的欄位
    public $sortable = ['id','main_keyword','second_keyword','product_description','price','color','part','thickness','size','instruction_for_use','instruction_for_others'];
}
?>