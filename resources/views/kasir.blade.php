@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">


  <div class="card shadow mb-4 py-3 border-bottom-primary">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">KASIR</h6>
    </div>
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <form method="post" action="/kasir">
            @csrf
            <div class="form-group">
              <label for="nama_baranng">Nama Barang</label>
              <input type="text" class="form-control  " id="nama_baranng" placeholder="Nama Barang" name="nama_baranng" required>

            </div>
            <div class="form-group">
              <label for="harga_barang">Harga(Rp)</label>
              <input type="number" class="form-control" id="harga_barang" placeholder="Harga" name="harga_barang">
            </div>
            <div class="form-group">
              <label for="kuantitas">Kuantitas</label>
              <input type="number" class="form-control" id="kuantitas" placeholder="kuantitas" name="kuantitas">
            </div>
            <div class="form-group">
              <label for="sub_total">Sub-Total(Rp)</label>
              <input type="number" class="form-control" id="sub_total" placeholder="Sub-Total" name="sub_total" >
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tambah</button>
          </form>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="formGroupExampleInput2">Total(Rp)</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Total" readonly>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Bayar(Rp)</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Bayar">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Kembali(Rp)</label>
            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Kembali(Rp)" readonly>
          </div>
        </div>
      </div>

      <hr  class="mb-4 py-3 border-primary">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Kuantitas</th>
              <th>Sub-Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kasir as $ksr)
            <tr>
              <td>{{$loop -> iteration}}</td>
              <td>{{$ksr->nama_baranng}}</td>
              <td>{{$ksr->harga_barang}}</td>
              <td>{{$ksr->kuantitas}}</td>
              <td>{{$ksr->sub_total}}</td>
              <td>

                <form class="" action="kasir/{{$ksr->id}}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit"  class="btn btn-danger btn-circle btn-sm" name="button"></button>
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
@endsection
