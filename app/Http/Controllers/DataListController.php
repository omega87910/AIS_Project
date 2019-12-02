<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
class DataListController extends Controller{
    public static function getIndex(){
        return view('dataList',['datalists'=>DataList::paginate(5),'hot_keywords'=>KeyWord::paginate(15)]);
    }
}
?>