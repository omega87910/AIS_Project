<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataList;
use App\KeyWord;
use App\Charts\SampleChart;
class DataListController extends Controller{
    public static function toDataListSearch(){
        $datalists = DataListController::globalKeyword();
        return view('dataListSearch',compact('datalists'));
    }
    public static function toDataHandle(){
        DataListController::update();
        DataListController::delete();
        $datalists = DataListController::globalKeyword();
        return view('dataHandle',compact('datalists')); 
    }
    public static function toDataAdd(){
        DataListController::update();
        DataListController::delete();
        $datalists = DataListController::globalKeyword();
        $datalists_edit = DataListController::select();
        return view('dataAdd',compact('datalists'),compact('datalists_edit'));
    }
    public static function toDataManage(){
        DataListController::update();
        DataListController::delete();
        $datalists = DataListController::globalKeyword();
        return view('dataManage',compact('datalists')); 
    }
    public static function toDataPriceSearch(){
        $datalists = DataListController::globalKeyword();
        return view('dataPriceSearch',compact('datalists')); 
    }
    public static function toBigDataAnalysis(){
        return view('bigDataAnalysis'); 
    }
    public static function toDataAnalysisChart(){
        $chart = new SampleChart;
        $datalists = DataListController::globalKeyword();
        return view('dataAnalysisChart',compact('datalists'),compact('chart')); 
    }
    public static function update(){
        if (isset($_GET['modify'])){
            $modify = $_GET['modify'];
            $new_main_keyword = $_GET['edit_main_keyword'];
            $new_second_keyword = $_GET['edit_second_keyword'];
            $new_product_description = $_GET['edit_product_description'];
            $new_price = $_GET['edit_price'];
            $new_color = $_GET['edit_color'];
            $new_part = $_GET['edit_part'];
            $new_thickness = $_GET['edit_thickness'];
            $new_size = $_GET['edit_size'];
            $new_instruction_for_use = $_GET['edit_instruction_for_use'];
            $new_instruction_for_others = $_GET['edit_instruction_for_others'];
            DB::table('data_list')->where(['id'=>$modify])->update(['main_keyword'=>$new_main_keyword,'second_keyword'=>$new_second_keyword,'product_description'=>$new_product_description,'price'=>$new_price,'color'=>$new_color,'part'=>$new_part,'thickness'=>$new_thickness,'size'=>$new_size,'instruction_for_use'=>$new_instruction_for_use,'instruction_for_others'=>$new_instruction_for_others]);            
        }else if (isset($_GET['save'])){
            $title = $_GET['new_title'];
            DB::table('title')->where('id','=','1')->update(['title'=>$title]);
        }else if (isset($_GET['add_shop'])){
            $add_shop = $_GET['shop_name'];
            DB::table('shop_list')->insert(['shop'=>$add_shop]);
        }
        else if (isset($_GET['remove_shop'])){
            $remove_shop = $_GET['shop_name'];
            DB::delete("delete from shop_list  where shop = ?",[$remove_shop]);
        }
    }
    public static function select(){
        if(isset($_GET['edit'])){
            $editID=$_GET['edit'];
            $datalists_edit = DB::table('data_list')->where('id','=',$editID)->get();
            return $datalists_edit;
        }else{
            return DB::table('data_list')->get();
        }
    }
    public static function delete(){
        if(isset($_GET['delete'])){
            $delete = $_GET['delete'];
            DB::delete("delete from data_list where id = ?",[$delete]);
        }
    }
    public static function globalKeyword(){
        session_start();
        if (isset($_GET['search_bool']) && isset($_SESSION['keyword_array'])){
            if ($_GET['search_bool']!=""){
                $str = implode('|',$_SESSION['keyword_array']);
                $datalists = DataList::where('main_keyword','regexp',"$str")->sortable()->get();
                return $datalists;
            }else{
                echo 'keyword is empty';
            }
        }else if (isset($_GET['keyword_input'])){
            if (isset($_SESSION['keyword_array'])){
                $_SESSION['keyword_array'][] = $_GET['keyword_input'];
            }else{
                $_SESSION['keyword_array'] = array($_GET['keyword_input']);
            }
            if($_GET['keyword_input'] == "1"){
                unset($_SESSION['keyword_array']);
            }
        }else if (isset($_GET['remove_keyword'])){
            $_SESSION['keyword_array'] = array_diff($_SESSION['keyword_array'],array($_GET['remove_keyword']));
            if(count($_SESSION['keyword_array'])==0){
                unset($_SESSION['keyword_array']);
            }
        }
        return DataList::sortable()->paginate(20);    
    }
}
?>