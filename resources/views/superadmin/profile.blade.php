@extends('superadmin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        Personal Information
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('superadmin.profiledata') }}">
                        <div class="mb-3">
                            <label for="form-text" class="form-label fs-14 text-dark">Username</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Username" value="{{ $user->name }}" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fs-14 text-dark">Email Address</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}" />
                        </div>
                        <div class="mb-3">
                            @if($user->role == 1)
                                <label class="form-label fs-14 text-dark" for="invalidCheck"> User Role : Super Admin </label>
                            @else
                                <label class="form-label fs-14 text-dark" for="invalidCheck"> User Role : Admin </label>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
