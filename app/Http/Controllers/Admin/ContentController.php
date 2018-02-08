<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Content;
use Illuminate\Http\Request;

class ContentController extends AdminController {
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Http\Response
   * @internal param Request $request
   */
  public function index()
  {
    $contents = Content::all();

    return view('admin.content.index', compact('contents'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $content = Content::findOrFail($id);

    return view('admin.content.edit', compact('content'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $data = [];
    // if is the Home page
    if ($id == 1)
    {
      $data = [
        'content' => $request->image_text,
      ];

      if ($request->file('image'))
      {
        foreach ($request->file('image') as $image)
        {
          $original_name = $image->getClientOriginalName();
          $data['files'][] = $original_name;
          $image->move(public_path('/uploads/home_slider'), $original_name);
        }
      }
      // if is the About page
    } elseif ($id == 2)
    {
      $data = [
        'content' => $request->about,
      ];
    }

    $content = Content::findOrFail($id);
    $content->update($data);

    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

  }

}
