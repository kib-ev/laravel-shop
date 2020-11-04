@extends('public.layouts.default')

@section('content-full')
    <div class="span15">
        <ul class="breadcrumb">
            <li><a href="/">{{ __('ui.'.'home') }}</a><span class="divider"> / </span></li>
            <li class="active">{{ __('ui.error_404') }}</li>
        </ul>
        <h3>{{ __('ui.error_404') }}</h3>
        <hr class="soft"/>
        <div class="justify">
            <h5>{{ __('ui.page_not_found') }}</h5><br/>
            <p>
                К сожалению, запрашиваемая Вами страница не найдена. Вероятно, Вы указали несуществующий адрес, страница
                была удалена, перемещена или сейчас она временно недоступна!
            </p>
            <br class="clr"/>
            <a href="{{ route('products.index') }}" class="btn btn-large pull-right">
                <i class="icon-arrow-left"></i> {{ __('ui.continue_shopping') }}
            </a>
            <br class="clr"/>
            <hr class="soft"/>

        </div>
    </div>
@endsection
