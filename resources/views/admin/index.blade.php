@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Меню</div>

                    <div class="card-body">


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
    </div>

@endsection
