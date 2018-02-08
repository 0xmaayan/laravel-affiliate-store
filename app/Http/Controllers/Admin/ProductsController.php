<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Base\Controllers\AdminController;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use Sunra\PhpSimple\HtmlDomParser;

class ProductsController extends AdminController {

  /**
   * Display a listing of the resource.
   *
   * @param Request $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $products = Product::orderBy('clicks', 'desc')->with('brands')->select('products.*');
    if ($request->ajax())
    {
      return Datatables::of($products)->editColumn(
          'link',
          function ($product) {
            return '<a href="'.$product->link.'">Product Link</a>';
          }
        )->addColumn(
          'action',
          function ($product) {
            return view('admin.products.actions.action', compact('product'));
          }
        )->rawColumns(['link', 'action'])->make(true);
    }

    return view('admin.products.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories_list = Category::pluck('name', 'id');
    $brands_list = Brand::pluck('name', 'id');

    return view('admin.products.create', compact('categories_list', 'brands_list'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param ProductRequest|Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(ProductRequest $request)
  {

    $data = [
      'name'      => $request->name,
      'price'     => $request->price,
      'brands_id' => $request->brands_id,
    ];

    $product = Product::create($data);

    if ($request->category_id)
    {
      $product->category()->sync($request->category_id);
    }

    $public_dir = $this->createFolder('uploads/products/'.$product->id.'/');

    if (isset($request->affiliate_link))
    {
      $data = $this->createAmazonProduct($request->affiliate_link);
    }

    if ($request->file('main_image'))
    {
      $data = $this->createProductImage($request->file('main_image'), $public_dir, $product->id);
    }

    if (isset($request->link))
    {
      $data = $this->createPersonalProduct($request->link);
    }

    $product->update($data);

    return Redirect::route('admin.products.index');
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
    $categories_list = Category::pluck('name', 'id');
    $brands_list = Brand::pluck('name', 'id');
    $product = Product::findOrFail($id);

    return view('admin.products.edit', compact('product', 'categories_list', 'brands_list'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param ProductRequest|Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(ProductRequest $request, $id)
  {

    $data = [
      'name'      => $request->name,
      'price'     => $request->price,
      'brands_id' => $request->brand_id,
    ];

    $public_dir = $this->createFolder('uploads/products/'.$id.'/');

    if (isset($request->affiliate_link))
    {
      $data = $this->createAmazonProduct($request->affiliate_link);
    }

    if ($request->file('main_image'))
    {
      $data = $this->createProductImage($request->file('main_image'), $public_dir, $id);
    }

    if (isset($request->link))
    {
      $data = $this->createPersonalProduct($request->link);
    }

    $product = Product::findOrFail($id);
    $product->update($data);

    if ($request->category_id)
    {
      $product->category()->sync($request->category_id);
    }


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
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect()->back();
  }

  /**
   * @param $fullLink
   * @return array
   */
  private function returnArrayOfAmazonLinks($fullLink)
  {

    $dom = HtmlDomParser::str_get_html($fullLink);
    $data = [];
    $aElement = $dom->find('a');
    if ($aElement)
    {
      foreach ($aElement as $href)
      {
        if (isset($href->href))
        {
          $data['value'] = $href->href;
        }
      }

      $imgElement = $dom->find('img');
      foreach ($imgElement as $img)
      {
        if (isset($img->src))
        {
          $data['src'][] = $img->src;
        }
      }

      return $data;
    } else
    {
      return $fullLink;
    }
  }

  /**
   * @param $affiliate_link
   * @return array
   */
  private function createAmazonProduct($affiliate_link)
  {
    $data = [];
    $linksArray = $this->returnArrayOfAmazonLinks($affiliate_link);
    if (isset($linksArray['value']))
    {
      $data['link'] = $linksArray['value']; // the href attribute value
      $data['main_image'] = $linksArray['src'][0]; // the img src
      $data['type'] = 'affiliate';
    }

    return $data;
  }

  private function createPersonalProduct($personal_link)
  {
    $data['link'] = $personal_link;
    $data['type'] = 'personal';

    return $data;
  }
}
