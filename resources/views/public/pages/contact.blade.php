@extends('public.layouts.common')

@section('sidebar')
    @include('public.layouts.includes.sidebar')
@endsection

@section('content')
    <section id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between contact__container">
                        <div class="contact__input">
                            <form id="contact__form" action="">
                                <h1 class="contacts__title">{{ __('ui.contacts') }}</h1>
                                <input required type="text" oninvalid="setCustomValidity('Fill in all the fields')" placeholder="{{ __('ui.name') }}" class="search__input" value="">
                                <input required type="email" oninvalid="setCustomValidity('Fill in all the fields')" placeholder="{{ __('ui.email') }}" class="search__input" value="">
                                <input required type="tel" oninvalid="setCustomValidity('Fill in all the fields')" placeholder="{{ __('ui.phone') }}" class="search__input" value="">
                                <textarea required name="" oninvalid="setCustomValidity('Fill in all the fields')" placeholder="{{ __('ui.message') }}" id="" class="search__input contactTextarea" cols="30"></textarea>
                                <button class="sendFormBtn">{{ __('ui.submit') }}</button>
                            </form>
                        </div>
                        <div class="contact__address">
                            <div class="contact__links">
                                <div href="#" class="d-flex contact__link contact__link2 contact__link3">
                                        <span>
                                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="environment"
                                                 width="1em" height="1em" aria-hidden="true">
                                                <path
                                                    d="M512 327c-29.9 0-58 11.6-79.2 32.8A111.6 111.6 0 0 0 400 439c0 29.9 11.7 58 32.8 79.2A111.6 111.6 0 0 0 512 551c29.9 0 58-11.7 79.2-32.8C612.4 497 624 468.9 624 439c0-29.9-11.6-58-32.8-79.2S541.9 327 512 327zm342.6-37.9a362.49 362.49 0 0 0-79.9-115.7 370.83 370.83 0 0 0-118.2-77.8C610.7 76.6 562.1 67 512 67c-50.1 0-98.7 9.6-144.5 28.5-44.3 18.3-84 44.5-118.2 77.8A363.6 363.6 0 0 0 169.4 289c-19.5 45-29.4 92.8-29.4 142 0 70.6 16.9 140.9 50.1 208.7 26.7 54.5 64 107.6 111 158.1 80.3 86.2 164.5 138.9 188.4 153a43.9 43.9 0 0 0 22.4 6.1c7.8 0 15.5-2 22.4-6.1 23.9-14.1 108.1-66.8 188.4-153 47-50.4 84.3-103.6 111-158.1C867.1 572 884 501.8 884 431.1c0-49.2-9.9-97-29.4-142zM512 615c-97.2 0-176-78.8-176-176s78.8-176 176-176 176 78.8 176 176-78.8 176-176 176z">
                                                </path>
                                            </svg>
                                        </span>
                                    <div>
                                        <div class="contactBold">ООО "Евродеталь"</div>
                                        РФ, г. Смоленск, <br />ул. НовоМосковская, 2/8, офис 218/1

                                    </div>
                                </div><br/>
                                <div class="d-flex contact__link contact__link2">
                                        <span>
                                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="mail" width="1em"
                                                 height="1em" aria-hidden="true">
                                                <path
                                                    d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-80.8 108.9L531.7 514.4c-7.8 6.1-18.7 6.1-26.5 0L189.6 268.9A7.2 7.2 0 0 1 194 256h648.8a7.2 7.2 0 0 1 4.4 12.9z">
                                                </path>
                                            </svg>
                                        </span>
                                    info@agrofilter.ru
                                </div>
                                <div class="d-flex contact__link contact__link2">
                                        <span>
                                            <svg viewBox="64 64 896 896" focusable="false" class=""
                                                 style="-ms-transform:rotate(90deg);transform:rotate(90deg)" data-icon="phone"
                                                 width="1em" height="1em" aria-hidden="true">
                                                <path
                                                    d="M885.6 230.2L779.1 123.8a80.83 80.83 0 0 0-57.3-23.8c-21.7 0-42.1 8.5-57.4 23.8L549.8 238.4a80.83 80.83 0 0 0-23.8 57.3c0 21.7 8.5 42.1 23.8 57.4l83.8 83.8A393.82 393.82 0 0 1 553.1 553 395.34 395.34 0 0 1 437 633.8L353.2 550a80.83 80.83 0 0 0-57.3-23.8c-21.7 0-42.1 8.5-57.4 23.8L123.8 664.5a80.89 80.89 0 0 0-23.8 57.4c0 21.7 8.5 42.1 23.8 57.4l106.3 106.3c24.4 24.5 58.1 38.4 92.7 38.4 7.3 0 14.3-.6 21.2-1.8 134.8-22.2 268.5-93.9 376.4-201.7C828.2 612.8 899.8 479.2 922.3 344c6.8-41.3-6.9-83.8-36.7-113.8z">
                                                </path>
                                            </svg>
                                        </span>
                                    +7 (499) 490-79-56
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4600.396246138353!2d32.055115095384586!3d54.794061397635396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46cef7f3cf9f4f95%3A0xcbe3b8aba215d8fe!2z0J3QvtCy0L4t0JzQvtGB0LrQvtCy0YHQutCw0Y8g0YPQuy4sIDIvOCwg0L7RhNC40YEgMjE4LzEsINCh0LzQvtC70LXQvdGB0LosINCh0LzQvtC70LXQvdGB0LrQsNGPINC-0LHQuy4sINCg0L7RgdGB0LjRjywgMjE0MDAw!5e0!3m2!1sru!2sby!4v1615813080395!5m2!1sru!2sby" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
