@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }} Organisation</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="org_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Organisation Name') }}</label>

                                <div class="col-md-6">
                                    <input id="org_name" type="text"
                                           class="form-control @error('org_name') is-invalid @enderror" name="org_name"
                                           value="{{ old('org_name') }}" required autocomplete="org_name" autofocus>

                                    @error('organisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="org_email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Organisation Email') }}</label>

                                <div class="col-md-6">
                                    <input id="org_email" type="text"
                                           class="form-control @error('org_email') is-invalid @enderror"
                                           name="org_email" value="{{ old('org_email') }}" required autocomplete="email"
                                           autofocus>

                                    @error('org_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="org_contact"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Oranisation Contact') }}</label>

                                <div class="col-md-6">
                                    <input id="org_contact" type="tel"
                                           class="form-control @error('org_contact') is-invalid @enderror"
                                           name="org_contact" value="{{ old('org_contact') }}" required
                                           autocomplete="contact" autofocus>

                                    @error('org_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="org_location"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Oranisation Location') }}</label>

                                <div class="col-md-6">
                                    <input id="org_location" type="text"
                                           class="form-control @error('org_location') is-invalid @enderror"
                                           name="org_location" value="{{ old('org_location') }}" required
                                           autocomplete="location" autofocus>

                                    @error('org_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-alt"></i> {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
