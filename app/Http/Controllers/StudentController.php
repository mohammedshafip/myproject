<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblstudent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class StudentController extends Controller {

    public function index() {
        $mystudent = DB::select("SELECT tblclasses.*,`std_ID`,  `std_firstname`,  `std_lastname`,  `std_clasID`,  DATE_FORMAT(`std_dateofbirth`, '%d/%m/%Y') as std_dateofbirth,  `std_status` FROM `tblstudents` LEFT JOIN `tblclasses` ON `tblstudents`.`std_clasID`=`tblclasses`.`class_ID` WHERE `tblclasses`.`cls_status`=? AND `tblstudents`.`std_status`=?",['A','A']);
        return response()->json($mystudent);
    }

    public function store(Request $request) {
        
        $storedate=Carbon::createFromFormat('d/m/Y', $request->std_dateofbirth)->format('Y-m-d');
        $mystudent = new Tblstudent();
        $mystudent->std_firstname = request('std_firstname');
        $mystudent->std_lastname = request('std_lastname');
        $mystudent->std_clasID = request('std_clasID');
        $mystudent->std_dateofbirth = $storedate;
        $mystudent->std_status = "A";
        $mystudent->save();
        return response()->json("working", 200);
    }

    public function update(Request $request) {        
        $storedate=Carbon::createFromFormat('d/m/Y', $request->std_dateofbirth)->format('Y-m-d');
        $mystudent = new Tblstudent();
        $mystudent->exists = true;
        $mystudent->std_ID = request('std_ID');
        $mystudent->std_firstname = request('std_firstname');
        $mystudent->std_lastname = request('std_lastname');
        $mystudent->std_clasID = request('std_clasID');
        $mystudent->std_dateofbirth = $storedate;
        $mystudent->std_status = "A";
        $mystudent->save();
        return response()->json("working", 200);
    }

    public function destroy(Request $request) {
        $storedate=Carbon::createFromFormat('d/m/Y', $request->std_dateofbirth)->format('Y-m-d');
        $mystudent = new Tblstudent();
        $mystudent->exists = true;
        $mystudent->std_ID = request('std_ID');
        $mystudent->std_firstname = request('std_firstname');
        $mystudent->std_lastname = request('std_lastname');
        $mystudent->std_clasID = request('std_clasID');
        $mystudent->std_dateofbirth = $storedate;
        $mystudent->std_status = "D";
        $mystudent->save();
        return response()->json("working", 200);
    }
    
    public function getdatacount($std_clasID){
        $studentlist = Tblstudent::where('std_clasID', '=' ,$std_clasID)->where('std_status', '=', 'A')->get();
        $studentCount = $studentlist->count();
        return response()->json($studentCount, 200);
    
    }

}
