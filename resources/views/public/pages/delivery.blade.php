@extends('public.layouts.default')

@section('sidebar')
    {!! page_element('sidebar') !!}
@endsection

@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="/">{{ __('ui.'.'home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ __('ui.'.'delivery') }}</li>
        </ul>
        <h3>{{ __('ui.'.'delivery') }}</h3>
        <hr class="soft"/>
        <div class="justify">
            <h5>Условия доставки</h5><br/>
            <p>
                Доставка товаров осуществляется в короткие сроки. Стоимость доставки зависит от расстояния до точки
                выгрузки. Стоимость доставки, разгрузки и подъёма на этаж оговариваются индивидуально. По городу Минску
                доставка 30 рублей до 2-х тонн. Доставка за пределы МКАД оговаривается в индивидуальном порядке.
            </p>
        </div>
    </div>
@endsection
