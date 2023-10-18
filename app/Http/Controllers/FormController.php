<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //Form Controller
    function form()
    {
        return view("form");
    }
    function store_data(Request $request)
    {

        $data = new Form();
        $data->name = $request->input("name");
        $data->gender = $request->input("gender");
        $data->country = $request->input("country");

        // chekbox data
        $checkboxdata = $request->input("skill");
        $data->skill = implode(", ", $checkboxdata);
        // save Image
        if ($request->hasFile("image")) {

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move("storages/images", $imageName);
            $data->image = $imageName;
        }



        // save Multiple Image

        $this->validate($request, [
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        if ($request->hasFile("images")) {
            $imageNames = [];

            foreach ($request->file("images") as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = time() . "-" . uniqid() . "." . $ext; // Use uniqid to ensure unique filenames
                $image->move("storages/images", $imageName); // Use 'storage' instead of 'storages'

                $imageNames[] = $imageName; // Store each image name in an array
            }

            // If you want to store the image names as a comma-separated string in the database, you can use implode.
            $data->images = implode(",", $imageNames);
        }


        $data->save();
        return back();
    }

    function show()
    {
        $data = Form::all();
        return view("show", compact("data"));
    }

    function delete($id)
    {
        $form = Form::find($id);

        if ($form) {
            // Check if there is an associated image file
            if (!empty($form->image)) {
                $imagePath = public_path('storages/images/' . $form->image);

                // Check if the image file exists and then delete it
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete the record from the database
            $form->delete();
        }
        return back();


    }

    function edit($id){
        $data = Form::find($id);
        return view("edit_form", compact("data"));
    }


    function update_data(Request $request, $id){
        $data = Form::find($id);

        $data->name = $request->input("name");
        $data->gender = $request->input("gender");
        $data->country = $request->input("country");

        // chekbox data
        $checkboxdata = $request->input("skill");
        $data->skill = implode(",", $checkboxdata);
        // save Image
        if ($request->hasFile("image")) {

            $image = $request->file("image");
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move("storages/images", $imageName);
            $data->image = $imageName;
        }
        $data->save();
        return redirect("show");
    }
}