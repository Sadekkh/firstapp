@extends('admin.main')
@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/select2/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <style>
        .img-fluid {
            height: 25rem !important;
        }
    </style>
@endsection
@section('adminContent')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <form class="form-sample" method="POST" action="{{ route('admin.product.update', $product[0]->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <p class="card-description"> </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_ar" value="{{ $product[0]->name_ar }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_en') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_en" value="{{ $product[0]->name_en }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('state') }}</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">
                                        <option value="active" @if ($product[0]->status == 'active') selected @endif>
                                            {{ __('active') }}
                                        </option>
                                        <option value="pending" @if ($product[0]->status == 'pending') selected @endif>
                                            {{ __('pending') }}
                                        </option>
                                        <option value="pause" @if ($product[0]->status == 'pause') selected @endif>
                                            {{ __('paused') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('offer') }}</label>
                                <div class="col-sm-9">
                                    <select name="offer_id" id="offerSelect" class="form-control">
                                        <option value="">{{ __('no_offer') }} </option>
                                        @if (App::isLocale('ar'))
                                            @foreach ($offer as $o)
                                                <option value="{{ $o->id }}" data-discount="{{ $o->discount }}"
                                                    @if ($o->id == $product[0]->offer_id) selected @endif>{{ $o->name_ar }}
                                                </option>
                                            @endforeach
                                        @elseif (App::isLocale('en'))
                                            @foreach ($offer as $o)
                                                <option value="{{ $o->id }}" data-discount="{{ $o->discount }}"
                                                    @if ($o->id == $product[0]->offer_id) selected @endif>{{ $o->name_en }}
                                                </option>
                                            @endforeach
                                        @endif


                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('brand') }}</label>
                                <div class="col-sm-9">
                                    <select name="brand_id" class="form-control">
                                        <option value="">{{ __('nobrand') }} </option>
                                        @if (App::isLocale('ar'))
                                            @foreach ($brand as $o)
                                                <option value="{{ $o->id }}"
                                                    @if ($o->id == $product[0]->brand_id) selected @endif>
                                                    {{ $o->name_ar }}
                                                </option>
                                            @endforeach
                                        @elseif (App::isLocale('en'))
                                            @foreach ($brand as $o)
                                                <option value="{{ $o->id }}"
                                                    @if ($o->id == $product[0]->brand_id) selected @endif>
                                                    {{ $o->name_en }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('category') }}</label>
                                <div class="col-sm-9">
                                    <select name="category_id" class="form-control">
                                        <option value="">{{ __('no_category') }}</option>
                                        @if (App::isLocale('ar'))
                                            @foreach ($category as $o)
                                                <option value="{{ $o->id }}"
                                                    @if ($o->id == $product[0]->category_id) selected @endif>
                                                    {{ $o->name_ar }}
                                                </option>
                                            @endforeach
                                        @elseif (App::isLocale('en'))
                                            @foreach ($category as $o)
                                                <option value="{{ $o->id }}"
                                                    @if ($o->id == $product[0]->category_id) selected @endif>
                                                    {{ $o->name_en }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('buying_price') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ $product[0]->primary_price }}" name="primary_price"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('selling_price') }} </label>
                                <div class="col-sm-9">
                                    <input type="number" id="price" value="{{ $product[0]->price }}" name="price"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('discount') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" id="discount" value="{{ $product[0]->discount }}"
                                        name="discount" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('price_after_discount') }} </label>
                                <div class="col-sm-9">
                                    <input type="number" step="0.01" id="price_disc"
                                        value="{{ $product[0]->price_disc }}" name="price_disc" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('date_end_discount') }} </label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{ $product[0]->date_end_disc }}" name="date_end_disc"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('quantity') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ $product[0]->quantity }}" name="quantity"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('quantity_left') }} </label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ $product[0]->quantity_left }}" name="quantity_left"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('video') }} </label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $product[0]->video_url }}" name="video_url"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">SEO tags</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $product[0]->seo_meta_tag }}" name="seo_meta_tag"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('disc_ar') }} </label>
                                <div class="col-sm-9">
                                    <div id="discription_ar">{!! $product[0]->description_ar !!}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('disc_en') }} </label>
                                <div class="col-sm-9">
                                    <div id="discription_en">{!! $product[0]->description_en !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (App::isLocale('ar'))
                        <div class="row">
                            @foreach ($att as $a)
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">{{ $a->name_ar }}</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple" multiple="multiple"
                                                style="width:100%">
                                                @foreach ($a->variation as $v)
                                                    @php
                                                        $select = false;
                                                    @endphp
                                                    @foreach ($product[0]->variation as $vs)
                                                        @if ($vs->id == $v->id)
                                                            @php
                                                                $select = true;
                                                                break; // Exit the inner loop once a match is found
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ $v->id }}"
                                                        @if ($select) selected @endif>
                                                        {{ $v->name_ar }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif (App::isLocale('en'))
                        <div class="row">
                            @foreach ($att as $a)
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">{{ $a->name_en }}</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-multiple" multiple="multiple"
                                                style="width:100%">
                                                @foreach ($a->variation as $v)
                                                    @php
                                                        $select = false;
                                                    @endphp
                                                    @foreach ($product[0]->variation as $vs)
                                                        @if ($vs->id == $v->id)
                                                            @php
                                                                $select = true;
                                                                break; // Exit the inner loop once a match is found
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <option value="{{ $v->id }}"
                                                        @if ($select) selected @endif>
                                                        {{ $v->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="images[]"
                        value="{{ old('photo') }}" multiple>
                    <button type="submit" class="btn btn-success">{{ __('edit') }}</button>
                    <div class="portfolio-item row">

                        <div class="item selfie col-lg-3 col-md-4 col-6 col-sm"
                            style="border: 5px solid;border-color:green">
                            <a href="{{ asset('storage/products/' . $product[0]->media_id) }}"
                                class="fancylight popup-btn" data-fancybox-group="light">
                                <img class="img-fluid" src="{{ asset('storage/products/' . $product[0]->media_id) }}"
                                    alt="">
                            </a>

                        </div>

                        @foreach ($product[0]->image as $i)
                            <div class="item selfie col-lg-3 col-md-4 col-6 col-sm">
                                <a href="{{ asset('storage/products/' . $i->name) }}" class="fancylight popup-btn"
                                    data-fancybox-group="light">
                                    <img class="img-fluid" src="{{ asset('storage/products/' . $i->name) }}"
                                        alt="">
                                </a>
                                <div style="display: flex">
                                    <form action="{{ route('admin.image.delete', $i->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">{{ __('delete') }}</button>
                                    </form>
                                    <form action="{{ route('admin.image.set', [$product[0]->id, $i->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button class="btn btn-ingo" type="submit">{{ __('set_default') }}</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </form>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('admin/select2/select2.min.js') }}"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
        var quill = new Quill('#discription_ar', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        var quill = new Quill('#discription_en', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const offerSelect = document.getElementById('offerSelect');
            const selectedDiscountInput = document.getElementById('discount');
            const priceInput = document.getElementById('price');
            const priceDiscInput = document.getElementById('price_disc');

            // Function to calculate and update price_disc
            function updatePriceDisc() {
                const selectedOption = offerSelect.options[offerSelect.selectedIndex];
                const discount = parseFloat(selectedOption.getAttribute('data-discount'));
                const originalPrice = parseFloat(priceInput.value);

                if (!isNaN(discount) && !isNaN(originalPrice)) {
                    const discountedPrice = originalPrice - (originalPrice * discount / 100);
                    priceDiscInput.value = parseFloat(discountedPrice.toFixed(2));
                    console.log(priceDiscInput);
                } else {
                    priceDiscInput.value = '';
                }
            }

            // Initial calculation on page load
            updatePriceDisc();

            // Listen for changes in the offer select
            offerSelect.addEventListener('change', function() {
                updatePriceDisc();
                const selectedOption = offerSelect.options[offerSelect.selectedIndex];
                const selectedDiscount = selectedOption.getAttribute('data-discount');
                selectedDiscountInput.value = selectedDiscount || '';
            });

            // Listen for changes in the discount input field
            selectedDiscountInput.addEventListener('input', function() {
                const customDiscount = parseFloat(this.value);
                const originalPrice = parseFloat(priceInput.value);

                if (!isNaN(customDiscount) && !isNaN(originalPrice)) {
                    const discountedPrice = originalPrice - (originalPrice * customDiscount / 100);
                    priceDiscInput.value = discountedPrice.toFixed(
                        2); // Adjust the decimal places as needed
                } else {
                    priceDiscInput.value = '';
                }
            });
        });

        $(".js-example-basic-multiple").select2();
    </script>
@endsection
@endsection
