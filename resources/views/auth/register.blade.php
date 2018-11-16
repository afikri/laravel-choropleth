@extends('layouts.auth')

@section('content')
<div class="col col-login mx-auto">
  <div class="text-center mb-6">
    <img src="{{ $logo_url }}" class="h-6" alt="">
  </div>
  {!! Form::open(['method' => 'POST', 'route' => 'register', 'class' => 'card']) !!}
    <div class="card-body p-6">
      <div class="card-title">{{ __('Register') }}</div>
      <div class="form-group">
        {!! Form::label('name', __('Name'), ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Enter Name']) !!}

        @if ($errors->has('name'))
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        @endif
      </div>

      <div class="form-group">
        {!! Form::label('email', __('E-Mail'), ['class' => 'form-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Enter email']) !!}

        @if ($errors->has('email'))
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
        @endif
      </div>

      <div class="form-group">
        {!! Form::label('password', __('Password'), ['class' => 'form-label']) !!}
        {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password ') ? ' is-invalid' : ''), 'placeholder' => 'Password']) !!}

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {!! Form::label('password_confirmation', __('Confirm Password'), ['class' => 'form-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation ') ? ' is-invalid' : ''), 'placeholder' => 'Password Confirmation']) !!}

        @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
      </div>
    </div>
  {!! Form::close() !!}
  <div class="text-center text-muted">
    Already have account? <a href="{{ route('login') }}">Log in</a>
  </div>
</div>
@endsection
