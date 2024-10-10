@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center my-4 display-4 font-weight-bold text-primary">Welcome to LibraryEase</h2>
                <div class="card border border-info-subtle">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body border border-info-subtle">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="male" value="male"
                                            {{ old('gender') === 'male' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="male">{{ __('Male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                            name="gender" id="female" value="female"
                                            {{ old('gender') === 'female' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="female">{{ __('Female') }}</label>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="img"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Profile Picture') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control @error('img') is-invalid @enderror"
                                        id="img" name="img">
                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                <div class="col-md-6">
                                    <select name="country" id="country"
                                        class="form-select @error('country') is-invalid @enderror">
                                        <option value="">{{ __('Select Country') }}</option>
                                        <option value="United States"
                                            {{ old('country') === 'United States' ? 'selected' : '' }}>
                                            {{ __('United States') }}</option>
                                        <option value="Canada" {{ old('country') === 'Canada' ? 'selected' : '' }}>
                                            {{ __('Canada') }}</option>
                                        <option value="United Kingdom"
                                            {{ old('country') === 'United Kingdom' ? 'selected' : '' }}>
                                            {{ __('United Kingdom') }}</option>
                                        <option value="France" {{ old('country') === 'France' ? 'selected' : '' }}>
                                            {{ __('France') }}</option>
                                        <option value="Germany" {{ old('country') === 'Germany' ? 'selected' : '' }}>
                                            {{ __('Germany') }}</option>
                                        <option value="Italy" {{ old('country') === 'Italy' ? 'selected' : '' }}>
                                            {{ __('Italy') }}</option>
                                        <option value="Spain" {{ old('country') === 'Spain' ? 'selected' : '' }}>
                                            {{ __('Spain') }}</option>
                                        <option value="Australia" {{ old('country') === 'Australia' ? 'selected' : '' }}>
                                            {{ __('Australia') }}</option>
                                        <option value="India" {{ old('country') === 'India' ? 'selected' : '' }}>
                                            {{ __('India') }}</option>
                                        <option value="Japan" {{ old('country') === 'Japan' ? 'selected' : '' }}>
                                            {{ __('Japan') }}</option>
                                        <option value="Brazil" {{ old('country') === 'Brazil' ? 'selected' : '' }}>
                                            {{ __('Brazil') }}</option>
                                        <option value="Mexico" {{ old('country') === 'Mexico' ? 'selected' : '' }}>
                                            {{ __('Mexico') }}</option>
                                        <option value="China" {{ old('country') === 'China' ? 'selected' : '' }}>
                                            {{ __('China') }}</option>
                                        <option value="South Africa"
                                            {{ old('country') === 'South Africa' ? 'selected' : '' }}>
                                            {{ __('South Africa') }}</option>
                                        <option value="Russia" {{ old('country') === 'Russia' ? 'selected' : '' }}>
                                            {{ __('Russia') }}</option>
                                    </select>


                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
