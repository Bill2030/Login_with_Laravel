@extends('components.layout')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-8">
                <h3>Please Login</h3>
                @if ($errors->any())
                @foreach ($errors->all() as $error )
                <div class="alert alert-danger">{{ $error }}</div>
                    
                @endforeach
                @endif
                @if (session('status'))
                    <div>{{ session('status') }}</div>
                @endif
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
</div>
@endsection
