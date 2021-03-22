@extends('public.layouts.common')

@section('content')


    <section class="breadcrumb">
        <div class="breadcrumb__body d-flex justify-content-start align-items-center">
            <a href="/" class="product__links">Главная</a>
            <span>/</span>
            <p>Ошибка 404. Страница не найдена</p>
        </div>
    </section>

    <section class="page-not-found page__content">
        <div class="container content__block ">
            <div class="row">

                <h3>{{ __('ui.error_404') }}</h3>
                <hr class="soft"/>
                <div class="justify">
                    <h5>{{ __('ui.page_not_found') }}</h5><br/>
                    <p>
                        К сожалению, запрашиваемая Вами страница не найдена. Вероятно, Вы указали несуществующий адрес, страница
                        была удалена, перемещена или сейчас она временно недоступна!
                    </p>
                    <br class="clr"/>
                    <a href="{{ route('products.index') }}" class="btn btn-danger pull-right">
                        <i class="icon-arrow-left"></i> {{ __('ui.continue_shopping') }}
                    </a>
                    <br class="clr"/>
                    <hr class="soft"/>

                </div>
            </div>
        </div>
    </section>

@endsection
