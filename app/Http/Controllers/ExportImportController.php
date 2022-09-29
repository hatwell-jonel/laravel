<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use PDF;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

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
    public function importExcel(){
        return view('files.importfile');
    }

    public function importFile(Request $request){

        try{
            $import = new StudentImport;
            $file = $request->file('file');
    
            Excel::import($import, $file);
    
            // $import->import($request->file('file')->store('import'));
    
            return redirect()->route('application')->with('success', 'Import Successully.');
        }catch(\Exception $e){
            dd($e);
        }

    }
}
