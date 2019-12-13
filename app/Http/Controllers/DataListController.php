<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
use App\Charts\SampleChart;
class DataListController extends Controller{
    public static function getIndex(){
        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);//商品種類陣列
        $chart->dataset('My dataset', 'bar', [1, 2, 3, 4]);//商品價格陣列
        return view('dataList',['datalists'=>DataList::paginate(5),'hot_keywords'=>KeyWord::paginate(15)],compact('chart'));
    }
}
?>