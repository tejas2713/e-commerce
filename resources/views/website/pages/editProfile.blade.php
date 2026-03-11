@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card shadow border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Edit Profile</h5>
                    </div>

                    <div class="card-body p-4">

                        <form method="post" action="/updateProfile">
                            @csrf

                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fa fa-user"></i>
                                    </span>

                                    <input type="text" class="form-control" name="userName"
                                        value="{{ old('name') ?? Auth::user()->name }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Email Address</label>

                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fa fa-envelope"></i>
                                    </span>

                                    <input type="email" class="form-control" name="userEmail"
                                        value="{{ old('email') ?? Auth::user()->email }}" required>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fa fa-save"></i> Update Profile
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection