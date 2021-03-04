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
                <h1 class="quote__title">Quote Request</h1>
                <input id="choose__file" type="file" style="display: none;">
                <label for="choose__file">
                    <div class="upload__block">
                        <div class="ubload__file text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="file-add" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M854.6 288.6L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM790.2 326H602V137.8L790.2 326zm1.8 562H232V136h302v216a42 42 0 0 0 42 42h216v494zM544 472c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v108H372c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h108v108c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V644h108c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V472z"></path>
                                </svg>
                                <strong>Click or drag file to this area to upload</strong>
                            </div>
                            <span>Supported formats: CSV, TSV, TXT</span>
                        </div>
                        <a href="javascript:void(0)" class="file__format">
                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="info-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path><path d="M464 336a48 48 0 1 0 96 0 48 48 0 1 0-96 0zm72 112h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V456c0-4.4-3.6-8-8-8z"></path>
                            </svg>
                            <span>File format</span>
                        </a>
                    </div>
                </label>
                <div class="select__all d-flex justify-content-start align-items-center">
                    <input type="checkbox" id="selectAll" class="selectInput">
                    <label class="labelCheck" for="selectAll">Select all</label>
                </div>
                <div>
                    <ul class="add__product">
                        @foreach(cart()->products as $product)
                        <li class="product__field d-flex justify-content-start align-items-center">
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <input type="checkbox" id="selectAll2" class="selectInput">
                                <label class="labelCheck" for="selectAll2"></label>
                                <img src="img/placeholder_category.webp" class="img-fluid product__field__img" alt="">
                                <input type="text" placeholder="Part number" class="productInput" value="{{ $product->name }} {{ @$product->brand->name }}" disabled>
                                <span class="quote__x">&times;</span>
                                <input type="number" placeholder="1" class="productInput productInput__num" min="1" value="{{ $product->pivot->count }}">
                            </div>
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <select class="productInput productInput_select" name="" id="">
                                    <option class="productInput" value="">ANY</option>
                                    <option class="productInput" value="">GENUINE / OEM</option>
                                </select>
                                <select class="productInput productInput_select" name="" id="">
                                    <option value="">Select Brand</option>
                                    <option value="">AGCO</option>
                                    <option value="">AJAX</option>
                                    <option value="">ALLIANT POWER</option>
                                    <option value="">ALLISON</option>
                                    <option value="">ARROW ENGINE</option>
                                    <option value="">BENDIX</option>
                                    <option value="">BOART LONGYEAR</option>
                                    <option value="">BOBCAT</option>
                                    <option value="">BOSCH</option>
                                    <option value="">BOSCH PEXROTH</option>
                                    <option value="">BRODERSON BMC</option>
                                </select>
                                <span class="delete__product">
                                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path>
                                        </svg>
                                    </span>
                            </div>
                        </li>
                        @endforeach

                        <li class="product__field d-flex justify-content-start align-items-center">
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <input type="checkbox" id="selectAll3" class="selectInput">
                                <label class="labelCheck" for="selectAll3"></label>
                                <img src="img/placeholder_category.webp" class="img-fluid product__field__img" alt="">
                                <input type="text" placeholder="Part number" class="productInput">
                                <span class="quote__x">&times;</span>
                                <input type="number" placeholder="1" class="productInput productInput__num">
                            </div>
                            <div class="product__field__item d-flex justify-content-start align-items-center">
                                <select class="productInput productInput_select" name="" id="">
                                    <option value="">ANY</option>
                                    <option value="">GENUINE / OEM</option>
                                </select>
                                <select class="productInput productInput_select" name="" id="">
                                    <option value="">Select Brand</option>
                                    <option value="">AGCO</option>
                                    <option value="">AJAX</option>
                                    <option value="">ALLIANT POWER</option>
                                    <option value="">ALLISON</option>
                                    <option value="">ARROW ENGINE</option>
                                    <option value="">BENDIX</option>
                                    <option value="">BOART LONGYEAR</option>
                                    <option value="">BOBCAT</option>
                                    <option value="">BOSCH</option>
                                    <option value="">BOSCH PEXROTH</option>
                                    <option value="">BRODERSON BMC</option>
                                </select>
                                <span class="delete__product">
                                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path>
                                        </svg>
                                    </span>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="addProduct__btn text-right m-right">+ Add Product</div>
                    </div>
                </div>
                <form action="" class="quote__form">
                    <div class="d-flex justify-content-between align-items-center quoteForm__container">
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Name:
                            </div>
                            <input type="text" placeholder="Full name" class="quoteInput">
                        </div>
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Email:
                            </div>
                            <input type="email" placeholder="Email address" class="quoteInput">
                        </div>
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Phone:
                            </div>
                            <input type="tel" placeholder="Phone number" class="quoteInput">
                        </div>
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Company:
                            </div>
                            <input type="text" placeholder="Company name" class="quoteInput">
                        </div>
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Zip Code:
                            </div>
                            <input type="email" placeholder="Zip Code" class="quoteInput">
                        </div>
                        <div class="col-sm-6 col-6 form__item">
                            <div class="form__item__txt">
                                <span>*</span>Country:
                            </div>
                            <select id="country" class="quoteInput" name="country">
                                <option value=""></option>
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__item">
                        <div class="textarea__item__txt">
                            Notes:
                        </div>
                        <textarea class="quote__textarea" name="" id="" placeholder="Part numbers, additional information..."></textarea>
                    </div>
                    <div class="text-center">
                        <button type="button" class="requestBtn">Request prices</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">@lang('ui.home')</a> <span class="divider"> / </span></li>
            <li class="active">@lang('ui.shopping_cart')</li>
        </ul>

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

        <h3>
            @if(cart()->products->count())
                @lang('ui.shopping_cart')
            @else
                @lang('ui.cart.cart_empty')
            @endif

            [
            <small>@choice('ui.cart.products_count', cart()->products->count(), ['count' => cart()->products->count()])</small>
            ]
            <a href="{{ route('products.index') }}" class="btn btn-large pull-right">
                <i class="icon-arrow-left"></i> @lang('ui.continue_shopping')
            </a>
        </h3>
        <hr class="soft"/>

        @if(!auth()->id() && cart()->isNotEmpty())
            <table class="table table-bordered" style="display: none;">
                <tr>
                    <th>@lang('ui.already_registered')</th>
                </tr>
                <tr>
                    <td>
                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputUsername">{{ __('ui.email') }}</label>
                                <div class="controls">
                                    <input name="email" type="text" id="inputUsername"
                                           placeholder="{{ __('ui.email') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword1">{{ __('ui.password') }}</label>
                                <div class="controls">
                                    <input name="password" type="password" id="inputPassword1"
                                           placeholder="{{ __('ui.password') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">{{ __('ui.sign_in') }}</button>
                                    {{ __('ui.or') }}
                                    <a href="{{ route('register') }}" class="btn">{{ __('ui.register') }}</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <a href="{{ route('password.request') }}"
                                       style="text-decoration:underline">{{ __('ui.forget_password') }}</a>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
        @endif

        @if(cart()->isNotEmpty())

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>@lang('ui.cart.product')</th>
                    <th>@lang('ui.cart.description')</th>
                    <th>@lang('ui.cart.quantity_update')</th>
                    <th>@lang('ui.cart.price')</th>
                    <th>@lang('ui.cart.discount')</th>
                    <th>@lang('ui.cart.tax')</th>
                    <th>@lang('ui.cart.total')</th>
                </tr>
                </thead>
                <tbody>

                @foreach(cart()->products as $product)
                    <tr>
                        <td>
                            <img width="60" src="{{ asset($product->image_path) }}" alt=""/>
                        </td>
                        <td>{{ $product->name }}<br/><!-- Color : black, Material : metal--></td>
                        <td>
                            <div class="input-append">
                                <input value="{{ $product->pivot->count }}"
                                       style="max-width:34px" placeholder="1" class="span1"
                                       id="appendedInputButtons" size="16" type="text">

                                <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <input type="hidden" name="count" value="{{ $product->pivot->count - 1 }}">
                                    <button class="btn" type="submit">
                                        <i class="icon-minus"></i>
                                    </button>
                                </form>

                                <form action="{{ route('api.carts.products.pivot.update', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <input type="hidden" name="count" value="{{ $product->pivot->count + 1 }}">
                                    <button class="btn" type="submit">
                                        <i class="icon-plus"></i>
                                    </button>
                                </form>

                                <form action="{{ route('api.carts.products.pivot.remove', $product->pivot->id) }}"
                                      method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="redirect" value="{{ url()->current() }}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="icon-remove icon-white"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->pivot->summary_price > 0 ? number_format($product->pivot->summary_price, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_discount > 0 ? number_format($product->pivot->summary_discount, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_tax > 0 ? number_format($product->pivot->summary_tax, 2, '.', '') : '--' }}</td>
                        <td>{{ $product->pivot->summary_total > 0 ? number_format($product->pivot->summary_total, 2, '.', '') : '--' }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_price') }}:</td>
                    <td>{{ number_format(cart()->summary_price, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_discount') }}:</td>
                    <td>{{ number_format(cart()->summary_discount, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">{{ __('ui.cart.total_tax') }}:</td>
                    <td>{{ number_format(cart()->summary_tax, 2, '.', '') }}</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right"><strong class="uppercase">{{ __('ui.cart.total') }}
                            ({{ number_format(cart()->summary_price, 2, '.', '') }}
                            - {{ number_format(cart()->summary_discount, 2, '.', '') }}
                            + {{ number_format(cart()->summary_tax, 2, '.', '') }}) =</strong></td>
                    <td class="label label-important" style="display:block">
                        <strong>{{ number_format(cart()->summary_total, 2, '.', '') }}</strong></td>
                </tr>
                </tbody>
            </table>

            <!--
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
                                <div class="controls">
                                    <input type="text" class="input-medium" placeholder="CODE">
                                    <button type="submit" class="btn"> ADD</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
            -->

            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th class="uppercase">@lang('ui.cart.delivery')</th>
                    <th class="uppercase">@lang('ui.cart.payment')</th>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>ЛИЧНЫЕ ДАННЫЕ</th>
                </tr>
                <tr>
                    <td>
                        <form id="orderForm" class="form-horizontal pt-2" action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="inputCountry">{{ __('ui.name') }}</label>
                                <div class="controls">
                                    <input name="name" type="text" id="inputCountry" placeholder="{{ __('ui.name') }}"
                                           value="{{ auth()->id() ? auth()->user()->name : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputCountry">{{ __('ui.last_name') }}</label>
                                <div class="controls">
                                    <input name="last_name" type="text" id="inputCountry"
                                           placeholder="{{ __('ui.last_name') }}"
                                           value="{{ auth()->id() ? auth()->user()->last_name : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.email') }}</label>
                                <div class="controls">
                                    <input name="email" type="text" id="inputPost" placeholder="{{ __('ui.email') }}"
                                           value="{{ auth()->id() ? auth()->user()->email : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.phone') }}</label>
                                <div class="controls">
                                    <input name="phone" type="text" id="inputPost" placeholder="{{ __('ui.phone') }}"
                                           value="{{ auth()->id() ? auth()->user()->phone : '' }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.cart.address') }}</label>
                                <div class="controls">
                                <textarea name="address" type="text" id="inputPost"
                                          placeholder="{{ __('ui.cart.address') }}"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPost">{{ __('ui.cart.comment') }}</label>
                                <div class="controls">
                                <textarea name="comment" type="text" id="inputPost"
                                          placeholder="{{ __('ui.cart.comment') }}"></textarea>
                                </div>
                            </div>

                        </form>
                    </td>
                </tr>
            </table>
        @endif

        <a href="{{ route('products.index') }}" class="btn btn-large">
            <i class="icon-arrow-left"></i> {{ __('ui.continue_shopping') }}
        </a>

        @if(cart()->products->count())
            <a href="#" class="btn btn-success btn-large pull-right"
               onclick="document.getElementById('orderForm').submit();">
                {{ __('ui.cart.checkout') }}
                <i class="icon-arrow-right"></i>
            </a>
        @endif

    </div>
@endsection
