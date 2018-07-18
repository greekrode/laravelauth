<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\Photo;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('pages.job_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('name','id')->toArray();
        
        $data = [
            'category' => $category
        ];
        return view('pages.post_job')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_type_id' => 'required'
        ]);


        if($request->hasFile('photos') )
        {
            $allowedfileExtension = ['jpg', 'png'];
            $files = $request->file('photos');
            
            $jobs = Job::create([
                'title' => $request->title,
                'location' => $request->location,
                'category_id' => $request->category_type_id,
                'user_id' => Auth::user()->id,
                'description' => $request->description,
                'price' => $request->price
            ]);

            foreach ($files as $file){
                $filename = $file->getClientOriginalName();                
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension,$allowedfileExtension);
            }
            
            if ($check){
                foreach ($request->photos as $photo){
                    $filename = $photo->store('photos');
                    $photos = Photo::create([
                        'endorsement_id' => $jobs->id,
                        'image' => $filename,
                    ]);
                }
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
