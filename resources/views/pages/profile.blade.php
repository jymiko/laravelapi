@extends('layouts.default')
@section('content')
  <!-- Main content -->
    <!-- Page content -->
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            @foreach($users as $user)
              <form action="{{ route('profile.update',$user['id']) }}" method="post">
              <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{$user->name}}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="email" class="form-control form-control-alternative" placeholder="{{$user->email}}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Position</label>
                        <input type="text" id="id_position" class="form-control form-control-alternative" placeholder="Position" value="{{$user->position->name_position}}"disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">New Pasword</label>
                        <input type="password" id="password" name="password"class="form-control form-control-alternative" placeholder="New Password" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="{{$user->address}}" type="text" disabled>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="form-group pull-right">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                  </div>
                </div>
              </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
  @stop