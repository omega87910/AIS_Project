<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
use App\Charts\SampleChart;
class DataListController extends Controller{
    public static function toDataListSearch(){
        return view('dataListSearch',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)]);
    }
    public static function toDataHandle(){
        return view('dataHandle',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)]); 
    }
    public static function toDataManage(){
        return view('dataManage',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)]); 
    }
    public static function toDataPriceSearch(){
        return view('dataPriceSearch',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)]); 
    }
    public static function toBigDataAnalysis(){
        return view('bigDataAnalysis'); 
    }
    public static function toDataAnalysisChart(){
        $chart = new SampleChart;
        return view('dataAnalysisChart',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)],compact('chart')); 
    }
}
?>