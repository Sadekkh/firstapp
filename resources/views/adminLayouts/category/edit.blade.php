@extends('admin.main')
@section('styles')
@endsection
@section('adminContent')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Horizontal Two column</h4>
                <form class="form-sample" method="post" action="{{ route('admin.category.update', $category->id) }}">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_ar') }} </label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_ar" class="form-control"
                                        value="{{ $category->name_ar }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('name_en') }} </label>
                                <div class="col-sm-9">
                                    <input type="text" name="name_en" class="form-control"
                                        value="{{ $category->name_en }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> {{ __('parent_cat') }}</label>
                                <div class="col-sm-9">
                                    <select name="parent_id" class="form-control">
                                        @if (App::isLocale('ar'))
                                            @foreach ($cat as $c)
                                                <option value="{{ $c->id }}"
                                                    @if ($c->id == $category->id) selected @endif>{{ $c->name_ar }}
                                                </option>
                                            @endforeach
                                        @elseif (App::isLocale('en'))
                                            @foreach ($cat as $c)
                                                <option value="{{ $c->id }}"
                                                    @if ($c->id == $category->id) selected @endif>{{ $c->name_en }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('child_cat') }} </label>
                                <div class="col-sm-9">
                                    @foreach ($category->childCategories as $child)
                                        <button class="btn btn-primary">{{ $child->name_ar }}</button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('trending') }}</label>
                                <div class="col-sm-9">
                                    <select name="trending" class="form-control">

                                        <option value="1" @if ($category->trending == 1) selected @endif>
                                            {{ __('yes') }}
                                        </option>
                                        <option value="0" @if ($category->trending == 0) selected @endif>
                                            {{ __('no') }}

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

                                        <option value="0" @if ($category->status == 0) selected @endif>
                                            {{ __('active') }}
                                        </option>
                                        <option value="1" @if ($category->status == 1) selected @endif>
                                            {{ __('paused') }}
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



@section('script')
@endsection
@endsection
