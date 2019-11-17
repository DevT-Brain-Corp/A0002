@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4 border-bottom-primary">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">KASIR</h6>
    </div>
    @if(session('status'))
    <div class="alert alert-success my-3 mx-3">
      {{session('status')}}
    </div>
    @endif
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <form method="post" action="/kasir">
            @csrf
            <div class="form-group">
              <label for="kuantitas">Kuantitas</label>
              <input type="number" class="form-control" id="kuantitas" placeholder="kuantitas" name="kuantitas">
            </div>
            <div class="form-group">
              <label for="harga">Harga(Rp)</label>
              <input type="number" class="form-control" id="harga" placeholder="Harga" name="harga">
            </div>
            <div class="form-group">
              <label for="total">Total(Rp)</label>
              <input type="number" class="form-control" id="total" name="total" placeholder="Total" readonly>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tambah</button>
          </form>
        </div>
      </div>

      <hr class="mb-4 py-3 border-primary">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Harga</th>
              <th>Kuantitas</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kasir as $ksr)
            <tr>
              <td>{{$ksr->created_at->format('Y-m-d')}}</td>
              <td>Rp {{$ksr->harga}}</td>
              <td>{{$ksr->kuantitas}}</td>
              <td>Rp {{$ksr->total}}</td>
              <td>

                <form class="" action="kasir/{{$ksr->id}}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-circle btn-sm" name="button"></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
      calculateTotal = function(){
          var total = $('#harga').val() * $('#kuantitas').val();
          $('#total').val(total);
      };
      $('#harga').keyup(function(){
          calculateTotal();
      });
      $('#kuantitas').keyup(function(){
          calculateTotal();
      });
});
</script>
@endsection