<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
		
		$student->fill($request->all());
        $result = $student->save();

		if($request->hasfile('image')){
			if($file = $request->file('image')){
				$extension = $file->getClientOriginalExtension();
				$filename = 'emp'. '_' .time().random_int(0, 1000). '.' .$extension; // Make a file name
				$folder = public_path('uploads/'); // Define folder path
				$file->move($folder, $filename); // Upload image
				
				// Insert Data to Notice Attachment Table
				$student->image = $filename; // Set file path in database to filePath
				$student->save();
			}

        }
		
		if($result){
			return redirect()->route('students.index');
		}else{
			return redirect()->route('students.create');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Student::find($id);
        return view('student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$student = Student::find($id);
		$student->fill($request->all());
		
		if($request->hasfile('image')){
			// Delete Image from Folder
			$imageFile = Student::where('id', $id)->first();
			$folder = public_path('uploads/');
			@unlink($folder.$imageFile->image);
			
			if($file = $request->file('image')){
				$extension = $file->getClientOriginalExtension();
				$filename = 'emp'. '_' .time().random_int(0, 1000). '.' .$extension; // Make a file name
				$folder = public_path('uploads/'); // Define folder path
				$file->move($folder, $filename); // Upload image
				
				// Insert Data to Notice Attachment Table
				$student->image = $filename; // Set file path in database to filePath
				$student->save();
			}

        }
		$result = $student->update();
		if($result){
			return redirect()->route('students.index');
		}else{
			return redirect()->route('students.create');
		}
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
		// Delete Image from Folder
		$imageFile = Student::where('id', $id)->first();
		$folder = public_path('uploads/');
		@unlink($folder.$imageFile->image);
		
        $result = $student->delete();
		if($result){
			return redirect()->route('students.index');
		}else{
			return redirect()->route('students.create');
		}
    }
}
