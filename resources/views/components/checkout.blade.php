@extends('layouts.main')
@section('styles')
    <style>
        .select {
            position: relative;
            min-width: 200px;
        }

        .select svg {
            position: absolute;
            right: 12px;
            top: calc(50% - 3px);
            width: 10px;
            height: 6px;
            stroke-width: 2px;
            stroke: #9098a9;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
        }

        .select select {
            -webkit-appearance: none;
            padding: 7px 40px 7px 12px;
            width: 100%;
            border: 1px solid #e8eaed;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 1px 3px -2px #9098a9;
            cursor: pointer;
            font-family: inherit;
            font-size: 16px;
            transition: all 150ms ease;
        }

        .select select:required:invalid {
            color: #5a667f;
        }

        .select select option {
            color: #223254;
        }

        .select select option[value=""][disabled] {
            display: none;
        }

        .select select:focus {
            outline: none;
            border-color: #07f;
            box-shadow: 0 0 0 2px rgba(0, 119, 255, 0.2);
        }

        .select select:hover+svg {
            stroke: #07f;
        }

        .sprites {
            position: absolute;
            width: 0;
            height: 0;
            pointer-events: none;
            user-select: none;
        }
    </style>
@endsection
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">{{ __('cart') }}</span>
                    <span class="badge badge-secondary badge-pill">{{ $cart->count() }}</span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    @php
                        $totalSum = 0;
                    @endphp
                    @foreach ($cart as $c)
                        @php
                            $productPrice = $c->product->price;
                            $quantity = $c->quantity;
                            $itemTotal = $productPrice * $quantity;
                            $totalSum += $itemTotal;
                        @endphp
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $c->product->name_en }}</h6>
                                <small class="text-muted">
                                    @if ($c->colors != null)
                                        {{ $c->colors }}
                                    @endif
                                    @if ($c->model != null)
                                        {{ $c->model }}
                                    @endif
                                </small>
                            </div>
                            <span class="text-muted">{{ $quantity }} X{{ $productPrice }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ __('shippments') }}</h6>
                            <small class="text-muted">

                            </small>
                        </div>
                        <span class="text-muted" id="shipment"></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Total') }} </span>
                        <input type="number" hidden id="tota" value="{{ number_format($totalSum, 2) }}">
                        <strong id="total">{{ number_format($totalSum, 2) }}</strong>
                    </li>
                </ul>

            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">{{ __('Billing address') }}</h4>
                <form class="needs-validation" action="{{ route('valid_checkout') }}" method="post">
                    @csrf
                    <input type="text" name="total" id="totalAmount" value="">
                    <input type="text" name="shipping" id="ship" value="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">{{ __('Full_name') }}</label>
                            <input type="text" class="form-control" name="fullname" placeholder="" value=""
                                required="">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">{{ __('mobile_number') }}</label>
                            <input type="text" class="form-control" name="mobile_num" placeholder="" value=""
                                required="">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">{{ __('city') }}</label><br>
                            <label class="select" for="slct">
                                <select id="state" name="state" required="required">
                                    <option value="" disabled="disabled" selected="selected"></option>
                                    @foreach ($state as $s)
                                        <option value="{{ $s->name_en }}">{{ $s->name_en }}</option>
                                    @endforeach


                                </select>
                                <svg>
                                    <use xlink:href="#select-arrow-down"></use>
                                </svg>
                            </label>
                            <!-- SVG Sprites-->
                            <svg class="sprites">
                                <symbol id="select-arrow-down" viewbox="0 0 10 6">
                                    <polyline points="1 1 5 5 9 1"></polyline>
                                </symbol>
                            </svg>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">{{ __('state') }}</label><br>
                            <label class="select" for="slct">
                                <select id="city" name="city" required="required">
                                    <option value="" disabled="disabled" selected="selected"></option>

                                </select>
                                <svg>
                                    <use xlink:href="#select-arrow-down"></use>
                                </svg>
                            </label>
                            <!-- SVG Sprites-->
                            <svg class="sprites">
                                <symbol id="select-arrow-down" viewbox="0 0 10 6">
                                    <polyline points="1 1 5 5 9 1"></polyline>
                                </symbol>
                            </svg>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">{{ __('adress') }}</label>
                            <input type="text" class="form-control" name="adress" placeholder="" value=""
                                required="">

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">{{ __('notes') }}</label>
                            <input type="text" class="form-control" name="notes" placeholder="" value=""
                                required="">

                        </div>
                    </div>


                    <hr class="mb-4">
                    <h4 class="mb-3">{{ __('Payment') }}</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input"
                                checked="" required="" value="cash on deliver">
                            <label class="custom-control-label" for="credit">{{ 'cash_on_delivery' }}</label>
                        </div>

                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">{{ __('checkout') }}</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation')

                // Loop over them and prevent submission
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        }())

        $(document).ready(function() {
            $('#state').on('change', function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        type: 'GET',
                        url: '/getcity/' + countryId,
                        success: function(data) {
                            console.log(data);
                            $('#city').empty();
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.name_en +
                                    '" data-id="' + value.shipping_amount + '">' +
                                    value.name_en + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty();
                }
            });
        });
        $(document).ready(function() {
            $('#city').on('change', function() {
                $('#shipment').empty();
                $('#totalAmount').empty();
                $('#ship').empty();
                var selectedOption = $(this).find('option:selected');

                // Retrieve the value of the data-id attribute and set it to the shipping variable
                var shipping = selectedOption.data('id');

                console.log(shipping);
                $('#shipment').html(shipping);
                let total = $('#tota').val();
                let tot = parseFloat(total)
                tot += shipping;
                console.log(tot);
                $('#total').html(tot)
                $('#totalAmount').val(tot)
                $('#ship').val(tot)
            });
        });
    </script>
@endsection
