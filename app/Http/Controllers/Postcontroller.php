<?php

namespace App\Http\Controllers;

use App\Events\PostPublished;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating the incoming request from the user
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'website_id' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'type' => 'error',
                'message'   => 'Validation errors',
                'data' => $validator->errors()
            ];
        }

        $post = Post::create($request->all());

        if (!empty($post)) {
            // dispatch an event to send the mail to user who has done subscription for the website
            PostPublished::dispatch($post);
            return [
                'type' => 'success',
                'message'   => 'Post published successfully',
                'data' => $post
            ];
        } else {
            return [
                'type' => 'error',
                'message'   => 'Something gets wrong while creating a post'
            ];
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
