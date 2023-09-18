@extends('adminLayouts.table')

@section('table')
    <table id="myTable" class="display" style="width: 100% !important">
        <thead>
            <tr>
                <th>{{ __('name') }} </th>
                <th>{{ __('discount') }} </th>
                <th>{{ __('badge') }} </th>
                <th>{{ __('state') }} </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($offer as $c)
                @if (App::isLocale('ar'))
                    <tr>
                        <td>{{ $c->name_ar }}</td>
                        <td>{{ $c->discount }}</td>
                        <td>{{ $c->badge }}</td>

                        <td> @switch($c->state)
                                @case(1)
                                    <button type="button" class="btn btn-success">{{ __('active') }}</button>
                                @break

                                @case(0)
                                    <button type="button" class="btn btn-danger">{{ __('paused') }} </button>
                                @break
                            @endswitch

                        </td>

                        <td><a href="{{ route('admin.offer.show', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @elseif (App::isLocale('en'))
                    <tr>
                        <td>{{ $c->name_en }}</td>
                        <td>{{ $c->discount }}</td>
                        <td>{{ $c->badge }}</td>

                        <td> @switch($c->state)
                                @case(1)
                                    <button type="button" class="btn btn-success">{{ __('active') }}</button>
                                @break

                                @case(0)
                                    <button type="button" class="btn btn-danger">{{ __('paused') }} </button>
                                @break
                            @endswitch

                        </td>

                        <td><a href="{{ route('admin.offer.show', $c->id) }}">{{ __('edit') }}</a></td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
@endsection
