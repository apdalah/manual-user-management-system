@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{ $user->name }}</div>

                <div class="card-body">

                    <form action="{{route('admin.users.update', $user->id)}}" method="POST">

                      @csrf
                      @method('PUT')
                      
                      <div class="form-group row">

                          <div class="col-md-12">
                              <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">

                          <div class="col-md-12">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autofocus>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="form-group row">
                        
                        <div class="col-md-12">
                          @foreach($roles as $role)
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                            {{($user->roles->pluck('id')->contains($role->id)) ? 'checked' : ''}}>
                            <label for="roles">{{ $role->name }}</label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
