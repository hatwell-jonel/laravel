<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use PDF;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Excel;

class ExportImportController extends Controller
{
    public function viewPDF(){
        $students = Student::all();
        $pdf = PDF::loadView('files.pdf', array('students' => $students))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportExcel(){
        return Excel::download(new StudentExport, 'students.xls');
    }
    public function importView(){
        return view('files.importfile');
    }

    public function importFile(Request $request){

        $file = $request->file('file');
        // Excel::import(new StudentImport, $file);

        $import  = new StudentImport;
        $import->import($file);
        // dd($import->failures());

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Import Successfully.');

        // try{
        //     $import = new StudentImport;
        //     $file = $request->file('file');
    
        //     Excel::import($import, $file);
    
        //     // $import->import($request->file('file')->store('import'));
    
        //     return redirect()->route('application')->with('success', 'Import Successully.');
        // }catch(\Exception $e){
        //     dd($e);
        // }

    }
}
