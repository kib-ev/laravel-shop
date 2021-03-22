<div class="catalog__accordeon">
    <div class="catalog__item d-flex justify-content-between align-items-center">
        <div class="catalog__txt">Category</div>
        <div class="catalog__icon">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="accordeon__hidden active">
        @foreach(\App\Models\ProductCategory::all() as $category)
            <a class="accordeon__link" href="{{ route('products.categories.show', $category->id) }}"><br>
                {{ ($category->name) }}
            </a>
        @endforeach
    </div>
    <div class="catalog__item d-flex justify-content-between align-items-center">
        <div class="catalog__txt">Brand</div>
        <div class="catalog__icon">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="accordeon__hidden">
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Case New <br/>Holland</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Komatsu</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Agco</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Caterpillar</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">John Deere</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Jcb</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Bobcat</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Claas</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Volvo Ce</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt" class="selectInput">
                    <label class="labelCheck" for="selectIt">Mtu Detroit Diesel</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
    </div>
    <div class="catalog__item d-flex justify-content-between align-items-center">
        <div class="catalog__txt">Manufacturer</div>
        <div class="catalog__icon">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="accordeon__hidden">
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt33" class="selectInput">
                    <label class="labelCheck" for="selectIt33">Genuine</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
    </div>
    <div class="catalog__item d-flex justify-content-between align-items-center">
        <div class="catalog__txt">Condition</div>
        <div class="catalog__icon">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
    </div>
    <div class="accordeon__hidden">
        <div class="d-flex justify-content-between align-items-start">
            <div class="accordeonLeft accordeon__link">
                <span>
                    <input type="checkbox" id="selectIt34" class="selectInput">
                    <label class="labelCheck" for="selectIt34">New</label>
                </span>
            </div>
            <div class="accordeonRight accordeon__link">
                1000+
            </div>
        </div>
    </div>
</div>
