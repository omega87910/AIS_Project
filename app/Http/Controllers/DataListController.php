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
        DataListController::update();
        DataListController::delete();
        return view('dataHandle',['datalists'=>DataList::sortable()->paginate(20),'hot_keywords'=>KeyWord::paginate(15)]); 
    }
    public static function toDataManage(){
        DataListController::update();
        DataListController::delete();
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
    public static function update(){
        if (isset($_GET['modify'])){
            $modify = $_GET['modify'];
            $new_main_keyword = $_GET['new_main_keyword'];
            $new_second_keyword = $_GET['new_second_keyword'];
            $new_product_description = $_GET['new_product_description'];
            $new_price = $_GET['new_price'];
            $new_color = $_GET['new_color'];
            $new_part = $_GET['new_part'];
            $new_thickness = $_GET['new_thickness'];
            $new_size = $_GET['new_size'];
            $new_instruction_for_use = $_GET['new_instruction_for_use'];
            $new_instruction_for_others = $_GET['new_instruction_for_others'];
            DB::table('data_list')->where(['id'=>$modify])->update(['main_keyword'=>$new_main_keyword,'second_keyword'=>$new_second_keyword,'product_description'=>$new_product_description,'price'=>$new_price,'color'=>$new_color,'part'=>$new_part,'thickness'=>$new_thickness,'size'=>$new_size,'instruction_for_use'=>$new_instruction_for_use,'instruction_for_others'=>$new_instruction_for_others]);
        }else if (isset($_GET['save'])){
            $title = $_GET['new_title'];
            DB::table('title')->where('id','=','1')->update(['title'=>$title]);
        }
    }
    public static function delete(){
        if(isset($_GET['delete'])){
            $delete = $_GET['delete'];
            DB::delete("delete from data_list where id = ?",[$delete]);
        }
    }
}
?>