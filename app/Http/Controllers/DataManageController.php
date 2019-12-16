<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
use App\Charts\SampleChart;
class DataManageController extends Controller{
    public static function getIndex(){
        $chart = new SampleChart;
        $datalists =DataList::paginate(5);
        return view('dataManage',['datalists'=>DataList::paginate(5),'hot_keywords'=>KeyWord::paginate(15)],compact('chart'),compact('datalists'));
    }
}
?>