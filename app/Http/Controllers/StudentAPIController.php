<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentAPIController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService){
        $this->studentService = $studentService;
    }
    
    public function showStudentForm(){
        return view('students');
    }

    public function getStudent(Request $request){
        $id = $request->input('id');
        $student = $this->studentService->getCurrentStudent($id);
        return view('Students', compact('name', 'id'));
    }

    public function indexAPI()
    {
       return Student::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
        ]);

        return Student::create($validatedData);
    }

    public function show($id)
    {
        return Student::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:20',
        ]);

        $student->update($validatedData);

        return $student;
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(null, 204);
    }
}