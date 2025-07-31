@extends('layouts.app') <!-- Change this to your actual layout file name -->

@section('content')
    <div class="container">
        <h1 class="text-center mb-4 text-info">User Profile</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-info">
                    <div class="card-header bg-info text-white">Profile Information</div>
                    <div class="card-body">
                        <form action="{{ route('user.update', Auth::user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="pic" class="form-label text-info">Profile Picture</label>
                                <input type="file" class="form-control @error('img') is-invalid @enderror" id="pic"
                                    name="img">
                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label text-info">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ Auth::user()->name }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-info">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ Auth::user()->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label text-info">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="country" class="form-label text-info">{{ __('Country') }}</label>
                                <select name="country" id="country"
                                    class="form-select @error('country') is-invalid @enderror">
                                    <option value="">{{ __('Select Country') }}</option>
                                    <option value="United States"
                                        {{ Auth::user()->country === 'United States' ? 'selected' : '' }}>
                                        {{ __('United States') }}</option>
                                    <option value="Canada" {{ Auth::user()->country === 'Canada' ? 'selected' : '' }}>
                                        {{ __('Canada') }}</option>
                                    <option value="United Kingdom"
                                        {{ Auth::user()->country === 'United Kingdom' ? 'selected' : '' }}>
                                        {{ __('United Kingdom') }}</option>
                                    <option value="France" {{ Auth::user()->country === 'France' ? 'selected' : '' }}>
                                        {{ __('France') }}</option>
                                    <option value="Germany" {{ Auth::user()->country === 'Germany' ? 'selected' : '' }}>
                                        {{ __('Germany') }}</option>
                                    <option value="Italy" {{ Auth::user()->country === 'Italy' ? 'selected' : '' }}>
                                        {{ __('Italy') }}</option>
                                    <option value="Spain" {{ Auth::user()->country === 'Spain' ? 'selected' : '' }}>
                                        {{ __('Spain') }}</option>
                                    <option value="Australia"
                                        {{ Auth::user()->country === 'Australia' ? 'selected' : '' }}>
                                        {{ __('Australia') }}</option>
                                    <option value="India" {{ Auth::user()->country === 'India' ? 'selected' : '' }}>
                                        {{ __('India') }}</option>
                                    <option value="Japan" {{ Auth::user()->country === 'Japan' ? 'selected' : '' }}>
                                        {{ __('Japan') }}</option>
                                    <option value="Brazil" {{ Auth::user()->country === 'Brazil' ? 'selected' : '' }}>
                                        {{ __('Brazil') }}</option>
                                    <option value="Mexico" {{ Auth::user()->country === 'Mexico' ? 'selected' : '' }}>
                                        {{ __('Mexico') }}</option>
                                    <option value="China" {{ Auth::user()->country === 'China' ? 'selected' : '' }}>
                                        {{ __('China') }}</option>
                                    <option value="South Africa"
                                        {{ Auth::user()->country === 'South Africa' ? 'selected' : '' }}>
                                        {{ __('South Africa') }}</option>
                                    <option value="Russia" {{ Auth::user()->country === 'Russia' ? 'selected' : '' }}>
                                        {{ __('Russia') }}</option>
                                </select>


                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-info">Update Profile</button>
                            <a href="{{ route('user.profile', Auth::user()->id) }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
