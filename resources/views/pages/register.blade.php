@extends('layouts.app')
@section('content')
  <!-- Main content -->
    <!-- Page content -->
    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                  <form action="{{ route('regist.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-alternative" placeholder="Username">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="email" id="email"name="email" class="form-control form-control-alternative" placeholder="Email">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label" for="address">Address</label>
                            <input id="address" name="address" class="form-control form-control-alternative" placeholder="Home Address"  type="text" >
                          </div>
                      </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                          <label class="form-control-label" for="id_position">Position</label>
                          <select class="form-control" id="id_position" name="id_position">
                          @foreach($poss as $poss)
                          <option value=" {{$poss->id}}" >{{$poss->name_position}}</option>
                          @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Password</label>
                            <input type="password" id="password" name="password"class="form-control form-control-alternative" placeholder="New Password" value="">
                          </div>
                        </div>
                      </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
  @stop