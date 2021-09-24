@if ($errors->any())
    <div {!! $attributes->merge(['class' => 'alert alert-danger text-sm p-2']) !!} role="alert">
        <div class="font-weight-bold">{{ __('Invalid Email or Password') }}</div>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
