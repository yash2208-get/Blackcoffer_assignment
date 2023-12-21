<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\graphDatabase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GraphImport;
use DB;

class GraphController extends Controller
{
    public function uploadFiles(Request $request) {
        $import = new GraphImport();
        Excel::import($import,$request->file('excel')); 
        return response()->json([
            'status' => 200,
            'return_data' => [],
            'message' => "Records Imported Successfully"
        ],200);  
    }
    public function sqlMy(Request $request) {
        
        $import = graphDatabase::select(DB::raw('sum(intensity) as intensity'),DB::raw('sum(relevance) as relevance'),'sector','pestle')->GroupBy('sector','pestle')->orderBy('intensity','desc')->take(10)->where('sector', '!=' ,null)->where('relevance', '!=' ,null)->where('pestle', '!=' ,null);
        if ($request->has('city_name') && $request->input('city_name') != 'null') {
            return $request->input('city_name');
            $import = $import->where('city',$request->input('city_name'));  
        }
        if($request->has('start_year') && $request->input('start_year') != 'null') {
            $import = $import->where('start_year',$request->input('start_year'));
        }
        if($request->has('end_year') && $request->input('end_year') != 'null') {
            $import = $import->where('end_year',$request->input('end_year'));
        }
        $import = $import->get();
        $newquery = graphDatabase::select('topic',DB::raw('sum(likelihood) as likelihood'))->take(10)->orderBy('likelihood','desc')->GroupBy('topic')->where('topic', '!=' ,null)->get();
        $sector = $intensity = $relevance = $pestle = $topic = $likelihood = [];
        foreach($import as $key=>$val) {
            $sector[] = str_replace(" ","_",$val->sector);
            $intensity[] = $val->intensity;
            $pestle[] = $val->pestle;
            $relevance[] = $val->relevance;
            $likelihood[] = $newquery[$key]->likelihood;
            $topic[] = $newquery[$key]->topic;
        }
        return view('index',compact('intensity','sector','relevance','pestle','topic','likelihood'));
    }
}
