<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblclass;
use App\Tblstudent;


class ClassController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tblclassdata = Tblclass::where('cls_status', 'A')->get();
        return response()->json($tblclassdata);
    }

    public function create() {
        
    }

    public function store(Request $request) {
        $myclass = new Tblclass();
        $myclass->cls_code = request('cls_code');
        $myclass->cls_name = request('cls_name');
        $myclass->cls_description = request('cls_description');
        $myclass->cls_status = "A";
        $myclass->save();
        return response()->json("working", 200);
    }

    public function update(Request $request) {
        $myclass = new Tblclass();
        $myclass->exists = true;
        $myclass->class_ID = request('class_ID');
        $myclass->cls_code = request('cls_code');
        $myclass->cls_name = request('cls_name');
        $myclass->cls_description = request('cls_description');
        $myclass->cls_status = "A";
        $myclass->save();
        return response()->json("working", 200);
    }

    public function destroy(Request $request) {
        $myclass = new Tblclass();
        $myclass->exists = true;
        $myclass->class_ID = request('class_ID');
        $myclass->cls_code = request('cls_code');
        $myclass->cls_name = request('cls_name');
        $myclass->cls_description = request('cls_description');
        $myclass->cls_status = "D";
        $myclass->save();
        return response()->json("working", 200);
    }
    
      public function getclassstd($clasID){
        $studentlist = Tblstudent::where('std_clasID', '=' ,$clasID)->where('std_status', '=', 'A')->get();        
        return response()->json($studentlist, 200);
    
    }

}
