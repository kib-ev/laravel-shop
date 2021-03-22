@extends('public.layouts.common')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')

    <div class="quoteModal">
        <div class="quoteContent">
            <svg viewBox="64 64 896 896" focusable="false" class="quoteModalIcon" data-icon="check-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 0 1-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8 157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z"></path>
            </svg>
            <div class="quoteModalTitle">Thank you for your request!</div>
            <p class="quoteModalTxt">
                Your Quote Request will be reviewed shortly and a response made to the email address or phone number given.
            </p>
            <p class="quoteModalTxt">
                <span>Request ID:</span>6033-59A2-E6E9-FE0D-D36F-6CFD
            </p>
            <button class="quoteModalBtn">Close</button>
        </div>
    </div>
    <section id="quote">
        <div class="col-lg-9 m-auto">
            <div class="quote__container">
                <h1 class="quote__title">
                    @if(cart()->products->count())
                        @lang('ui.shopping_cart')
                    @else
                        @lang('ui.cart.cart_empty')
                    @endif
                </h1>

                @if(session('message') ?? '')
                    <div class="alert alert-success">
                        @lang(session('message'))
                    </div>
                @endif

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            @lang($error)
                        </div>
                    @endforeach
                @endif

{{--                <input id="choose__file" type="file" style="display: none;">--}}
{{--                <label for="choose__file" >--}}
{{--                    <div class="upload__block">--}}
{{--                        <div class="ubload__file text-center">--}}
{{--                            <div class="d-flex justify-content-center align-items-center">--}}
{{--                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="file-add" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M854.6 288.6L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM790.2 326H602V137.8L790.2 326zm1.8 562H232V136h302v216a42 42 0 0 0 42 42h216v494zM544 472c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v108H372c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h108v108c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V644h108c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V472z"></path>--}}
{{--                                </svg>--}}
{{--                                <strong>Click or drag file to this area to upload</strong>--}}
{{--                            </div>--}}
{{--                            <span>Supported formats: CSV, TSV, TXT</span>--}}
{{--                        </div>--}}
{{--                        <a href="javascript:void(0)" class="file__format">--}}
{{--                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="info-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path><path d="M464 336a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm72 112h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V456c0-4.4-3.6-8-8-8z"></path>--}}
{{--                            </svg>--}}
{{--                            <span>File format</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </label>--}}
{{--                <div class="select__all d-flex justify-content-start align-items-center">--}}
{{--                    <input type="checkbox" id="selectAll" class="selectInput">--}}
{{--                    <label class="labelCheck" for="selectAll">Select all</label>--}}
{{--                </div>--}}
                <div>
                    <ul class="add__product">
                        @foreach(cart()->products as $product)
                        <li class="product__field d-flex justify-content-start align-items-center">
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <input type="checkbox" id="selectAll2" class="selectInput">
                                <label class="labelCheck" for="selectAll2"></label>
                                <img src="{{ $product->remote->image }}" class="img-fluid product__field__img" alt="" style="max-width: 50px; max-height: 50px;">
                                <input type="text" placeholder="Part number" class="productInput" value="{{ $product->name }} " disabled>
                                <span class="quote__x">&times;</span>
                                <input type="number" placeholder="1" class="productInput productInput__num" min="1" value="{{ $product->pivot->count }}">
                            </div>
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <select class="productInput productInput_select" name="" id="" disabled>
                                    <option class="productInput" value="">{{ @$product->category->name }}</option>
                                </select>
                                <select class="productInput productInput_select" name="" id="" disabled>
                                    <option value="">{{ @$product->brand->name }}</option>
{{--                                    <option value="">AGCO</option>--}}
{{--                                    <option value="">AJAX</option>--}}
{{--                                    <option value="">ALLIANT POWER</option>--}}
{{--                                    <option value="">ALLISON</option>--}}
{{--                                    <option value="">ARROW ENGINE</option>--}}
{{--                                    <option value="">BENDIX</option>--}}
{{--                                    <option value="">BOART LONGYEAR</option>--}}
{{--                                    <option value="">BOBCAT</option>--}}
{{--                                    <option value="">BOSCH</option>--}}
{{--                                    <option value="">BOSCH PEXROTH</option>--}}
{{--                                    <option value="">BRODERSON BMC</option>--}}
                                </select>

                                <form action="{{ route('api.carts.products.pivot.remove', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">

                                    <button class="btn" type="submit">
                                        <span class="delete__product">
                                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>

                            </div>
                        </li>
                        @endforeach

{{--                        <li class="product__field d-flex justify-content-start align-items-center">--}}
{{--                            <div class="product__field__item d-flex justify-content-start align-items-center">--}}
{{--                                <input type="checkbox" id="selectAll3" class="selectInput">--}}
{{--                                <label class="labelCheck" for="selectAll3"></label>--}}
{{--                                <img src="img/placeholder_category.webp" class="img-fluid product__field__img" alt="">--}}
{{--                                <input type="text" placeholder="Part number" class="productInput">--}}
{{--                                <span class="quote__x">&times;</span>--}}
{{--                                <input type="number" placeholder="1" class="productInput productInput__num">--}}
{{--                            </div>--}}
{{--                            <div class="product__field__item d-flex justify-content-start align-items-center">--}}
{{--                                <select class="productInput productInput_select" name="" id="">--}}
{{--                                    <option value="">ANY</option>--}}
{{--                                    <option value="">GENUINE / OEM</option>--}}
{{--                                </select>--}}
{{--                                <select class="productInput productInput_select" name="" id="">--}}
{{--                                    <option value="">Select Brand</option>--}}
{{--                                    <option value="">AGCO</option>--}}
{{--                                    <option value="">AJAX</option>--}}
{{--                                    <option value="">ALLIANT POWER</option>--}}
{{--                                    <option value="">ALLISON</option>--}}
{{--                                    <option value="">ARROW ENGINE</option>--}}
{{--                                    <option value="">BENDIX</option>--}}
{{--                                    <option value="">BOART LONGYEAR</option>--}}
{{--                                    <option value="">BOBCAT</option>--}}
{{--                                    <option value="">BOSCH</option>--}}
{{--                                    <option value="">BOSCH PEXROTH</option>--}}
{{--                                    <option value="">BRODERSON BMC</option>--}}
{{--                                </select>--}}
{{--                                <span class="delete__product">--}}
{{--                                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
{{--                    <div class="d-flex justify-content-end align-items-center">--}}
{{--                        <div class="addProduct__btn text-right m-right">+ Add Product</div>--}}
{{--                    </div>--}}
                </div>

                @if(cart()->isNotEmpty())
                    <form action="/orders" class="quote__form mt-4" method="post">
                        @csrf
                        @method('post')
                        <div class="d-flex justify-content-between align-items-center quoteForm__container">
                            <div class="col-sm-6 col-6 form__item">
                                <div class="form__item__txt">
                                    <span>*</span>{{ __('ui.name') }}:
                                </div>
                                <input name="name" type="text" placeholder="{{ __('ui.name') }}" class="quoteInput">
                            </div>
                            <div class="col-sm-6 col-6 form__item">
                                <div class="form__item__txt">
                                    <span>*</span>{{ __('ui.email') }}:
                                </div>
                                <input name="email" type="email" placeholder="{{ __('ui.email') }}" class="quoteInput">
                            </div>
                            <div class="col-sm-6 col-6 form__item">
                                <div class="form__item__txt">
                                    <span>*</span>{{ __('ui.phone') }}:
                                </div>
                                <input name="phone" type="tel" placeholder="{{ __('ui.phone') }}" class="quoteInput">
                            </div>
                            <div class="col-sm-6 col-6 form__item">
                                <div class="form__item__txt">
                                    {{ __('ui.company') }}:
                                </div>
                                <input type="text" placeholder="{{ __('ui.company') }}" class="quoteInput">
                            </div>

                        </div>
                        <div class="form__item">
                            <div class="textarea__item__txt">
                                {{ __('ui.message') }}:
                            </div>
                            <textarea class="quote__textarea" name="" id="" placeholder="Дополнительная информация ..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="requestBtn">Запросить предложение</button>
                        </div>
                    </form>
                @else
                    <a href="{{ route('products.index') }}" class="btn btn-large btn-danger">
                        <i class="icon-arrow-left"></i> {{ __('ui.continue_shopping') }}
                    </a>
                @endif


            </div>
        </div>
    </section>

@endsection
