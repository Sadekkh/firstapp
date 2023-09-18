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
                <form class="form-sample" method="post" action="{{ route('admin.category.store') }}">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_ar') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_ar" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_en') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_en" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('parent_category') }}</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" class="form-control">
                                        @if (App::isLocale('ar'))
                                            @foreach ($cat as $c)
                                                <option value="{{ $c->id }}">{{ $c->name_ar }}

                                                </option>
                                            @endforeach
                                        @elseif (App::isLocale('en'))
                                            @foreach ($cat as $c)
                                                <option value="{{ $c->id }}">{{ $c->name_en }}

                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('trending') }}</label>
                                <div class="col-sm-9">
                                    <select name="trending" class="form-control">

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
                                    <select name="status" class="form-control">

                                        <option value="0"> {{ __('active') }}
                                        </option>
                                        <option value="1"> {{ __('paused') }}
                                        </option>


                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
