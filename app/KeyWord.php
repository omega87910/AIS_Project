<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class KeyWord extends Model{
    protected $table='recent_keywords';//指定資料庫
    protected $fillable=['keywords'];//允許修改的欄位
}
?>