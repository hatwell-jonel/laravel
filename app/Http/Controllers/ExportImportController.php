<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use PDF;
use App\Exports\StudentExport;
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
}
