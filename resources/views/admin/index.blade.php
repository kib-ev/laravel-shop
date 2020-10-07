@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="span4">
                <div class="well">
                    <h3><b>Parser</b></h3>
                    <a class="btn btn-primary" href="{{ url('/admin/parser/parse/categories') }}">Parse Categories</a>
                    <span class="btn">{{ \App\Models\ProductCategory::all()->count() }}</span>
                    <br><br>
                    <a class="btn btn-primary" href="{{ url('/admin/parser/parse/products') }}">Parse Prodcuts</a>
                    <span class="btn">{{ \App\Models\Product::all()->count() }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
