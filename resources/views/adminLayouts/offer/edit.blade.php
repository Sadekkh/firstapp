@extends('admin.main')
@section('styles')
    <style>

    </style>
@endsection
@section('adminContent')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('edit') }}</h4>
                <form class="form-sample" method="post" action="{{ route('admin.offer.update', $offer->id) }}">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_ar" value="{{ $offer->name_ar }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_en') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_en" value="{{ $offer->name_en }}"
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
                                    <input type="number" name="discount" value="{{ $offer->discount }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('badge') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="badge" value="{{ $offer->badge }}"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('trending') }}</label>
                                <div class="col-sm-9">
                                    <select name="trending" value="{{ $offer->trending }}" class="form-control">

                                        <option value="1">{{ __('yes') }}
                                        </option>
                                        <option value="0"> {{ __('no') }}

                                        </option>


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('state') }}</label>
                                <div class="col-sm-9">
                                    <select name="state" class="form-control">

                                        <option value="1"> {{ __('active') }}
                                        </option>
                                        <option value="0"> {{ __('paused') }}
                                        </option>


                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('update') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
