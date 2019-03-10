@extends('layouts.default_user')
@section('content')
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Card</h3>
              <br>
              <button class="btn btn-primary" data-toggle="modal" data-target="#addCard">Add New Card</button>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">By</th>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
               
                @foreach($cards as $index => $card )
  
                    <tr>
                        <td scope="col">{{$index +1}}</td>
                        <td scope="col">{{$card->date}}</td>
                        <td scope="col">{{$card->user->name}}</td>                       
                        <td scope="col">{{$card->item->name_item}}</td>
                        <td scope="col">{{$card->qty_item}}</td>
                        <td scope="col">{{$card->description}}</td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
              <div class="modal fade" id="addCard">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">New Card</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <div class="modal-body">
                            <form action="{{ route('carduser.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <input name="date" id="date" class="form-control" value="{{date('Y-m-d')}}" readonly>
                            </div>
                                    <div class="form-group">
                                        <select class="form-control" id="id_item" name="id_item">
                                        @foreach($items as $itemlist)
                                        <option value=" {{$itemlist->id}}" >{{$itemlist->name_item}} | {{$itemlist->stock_item}} |</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="qty_item" class="form-control" id="qty_item" placeholder="Quantity">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="des" class="form-control" id="des" placeholder="Description">
                                    </div>              
                                    <div class="modal-footer">
                                        <div class="form-group pull-right">
                                            <button type="submit" class="btn btn-primary">Add New Card</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
      </div>
@stop