<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
use App\Charts\SampleChart;
class DataListController extends Controller{
    public static function getIndex(){
        $chart = new SampleChart;
        $datalists =DataList::paginate(5);
        return view('dataList',['datalists'=>DataList::paginate(5),'hot_keywords'=>KeyWord::paginate(15)],compact('chart'),compact('datalists'));
    }
}
?>