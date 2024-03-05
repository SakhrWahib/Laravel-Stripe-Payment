<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    protected $student;
    public function __construct()
    {
                // إنشاء مثيل جديد من نموذج Student

        $this->student = new Student();
    }
    public function index()
    {
                // استرجاع جميع السجلات من النموذج Student وإرجاعها

        return $this->student->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->student->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->student->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = $this->student->find($id);
        $student->update($request->all());
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $student = $this->student->find($id);
    return $student->delete();
    }
}
