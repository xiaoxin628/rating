@extends('layouts.app')

@section('content')

<div class="card uper">
  <div class="card-header">
    Add Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('store.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Store Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="address">Store Address</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="phone_number">Store Phone Number:</label>
              <input type="text" class="form-control" name="phone_number"/>
          </div>
          <div class="form-group">
              <label for="rate">Rating:</label>
              <input type="text" class="form-control" name="rate"/>
          </div>
          <div class="form-group">
              <label for="website">Website:</label>
              <input type="text" class="form-control" name="website"/>
          </div>

          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection

