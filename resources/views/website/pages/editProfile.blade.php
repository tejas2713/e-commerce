@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                    
                        <form method="post" action="/updateProfile">
                            @csrf
                            <input type="hidden" id="userId" name="userId" value="{{ Auth::user()->id }}" >
                            <div class="row mb-3">
                                <label for="userName" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="userName" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="userName" value="{{ old('name') ?? Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="userEmail" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                <div class="col-md-6">
                                    <input id="userEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="userEmail" value="{{ old('email') ?? Auth::user()->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Profile
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