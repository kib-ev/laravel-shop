<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'index');
    }

    public function index()
    {
        if (request()->has('sync')) {
            (new ProductController())->syncProducts();
        }

        $count = config('site.products.home_page_count');
        $products = Product::inRandomOrder()->limit($count)->get();
        return view('public.pages.index', compact('products'));
    }

    public function show()
    {
        if(request()->has('edit')) {
            return $this->edit();
        }

        $uri = '/'. request()->path();
        $pageName = str_replace('/','.', $uri);

        $meta = Meta::where('uri', $uri)->first();
        if(!$meta) {
            abort(404);
        }

        if (view()->exists('public.pages'.$pageName)) {
            return view('public.pages'.$pageName);
        } else {
            $page = $this->getPageByMeta($meta);
            return view('public.templates.single', compact('page'));
        }
    }

    public function edit()
    {
        $meta = meta();
        if(!$meta) {
            abort(404);
        }
        $page = $this->getPageByMeta($meta);
        return view('public.templates.single-edit', compact('page'));
    }

    protected function getPageByMeta($meta)
    {
        $page = Page::firstOrCreate([
            'lang' => app()->getLocale(),
            'slug' => $meta->uri,
        ], [
            'name' => $meta->title,
        ]);

        return $page;
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->fill($request->all());
        $page->update();

        return redirect()->route('pages.show', $page->slug);
    }

    public function store() {
        dump(__METHOD__);
    }

    public function productSummaryPage()
    {
        return view('public.pages.product_summary');
    }
}
