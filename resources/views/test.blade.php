@extends('layout/template')

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" >
      <div class="modal-body">
       @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="nama" class="form-control" id="nama" >
          </div>
          <div class="form-group">
            <label for="gapok">Gaji Pokok</label>
            <input type="text" class="form-control" id="gapok">
          </div>
          <div class="form-group">
            <label for="telat">Telat</label>
            <input type="text" class="form-control" id="telat">
          </div>
          <div class="form-group">
            <label for="absen">Absen</label>
            <input type="text" class="form-control" id="absen">
          </div>
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary postbutton">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

@section('container')
<div class="container">
    <div class="row">
        <div class="col-12">
          <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
          </button>
  
        </div>
        <div class="col-12">
         <!-- Button trigger modal -->
        
       
        <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Gaji Pokok</th>
                <th scope="col">Jamsostek</th>
                <th scope="col">Telat</th>
                <th scope="col">PPH 21</th>
                <th scope="col">Tidak Hadir</th>
                <th scope="col">Iuran Pensiun</th>
                <th scope="col">Bpjs Kesehatan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data_gaji as $gaji)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$gaji->nama}}</td>
                    <td>Rp. {{$gaji->gapok}}</td>
                    <td>Rp. {{$gaji->gapok * 2 / 100}}</td>
                    <td>Rp. {{$gaji->telat * 50000}}</td>
                    <td>Rp. {{$gaji->gapok * 1 / 100}}</td>
                    <td>Rp. {{$gaji->absen * 200000}}</td>
                    <td>Rp. {{$gaji->gapok * 2 / 100}}</td>
                    <td>Rp. {{$gaji->gapok * 2 / 100}}</td>
                    <td>
                        <span  class='badge badge-success'>Edit</span>
                        <span  class='badge badge-danger'>Update</span>
                    </td>
                </tr>
                @endforeach
                
              
            </tbody>
          </table>
          
          
    </div>
    </div>
 </div>
 @endsection
