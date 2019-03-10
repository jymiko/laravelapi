@extends('layouts.default_user')
@section('content')
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Item Tables</h3>
              <br>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Stock item</th>

                  </tr>
                </thead>
                <tbody>
                @foreach($items as $index => $item)
                    <tr>
                        <td scope="col">{{$index +1}}</td>
                        <td scope="col">{{$item->name_item}}</td>
                        <td scope="col">{{$item->stock_item}}</td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
              {{$items->links()}}

        </div>
      </div>
@stop