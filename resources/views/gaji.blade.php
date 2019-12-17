@extends('layout/template')

 <!-- Modal -->
 <div class="modal fade" id="addGajiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add_gaji" url="{{url('/gaji/add')}}">
      <div class="modal-body">
       @csrf
       <input type="hidden" name="id"  id="id" >
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" >
          </div>
          <div class="form-group">
            <label for="gapok">Gaji Pokok</label>
            <input type="text" name="gapok" class="form-control" id="gapok">
          </div>
          <div class="form-group">
            <label for="telat">Telat</label>
            <input type="text" name="telat" class="form-control" id="telat">
          </div>
          <div class="form-group">
            <label for="absen">Absen</label>
            <input type="text"  name="absen" class="form-control" id="absen">
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


          
              <div class="col-md-12">
                  <!-- DATA TABLE-->
                  <div class="table-responsive m-b-40">
                    <button type="button" class="btn btn-primary " onclick="add_data();">
                      Add Data
                    </button>
                    <br/>
                    <br/>
                      <table id="the_table" class="table table-borderless table-data3">
                          <thead>
                              <tr>
                                  <th >Nama</th>
                                  <th >Gaji Pokok</th>
                                  <th >Jamsostek</th>
                                  <th >Telat</th>
                                  <th >PPH 21</th>
                                  <th >Tidak Hadir</th>
                                  <th >Iuran Pensiun</th>
                                  <th >Bpjs Kesehatan</th>
                                  <th >Action</th>
                              </tr>
                          </thead>
                          <tbody id="isi">
                             
                                
                              
                            </tbody>
                      </table>
                  </div>
                  <!-- END DATA TABLE-->
              </div>
          
          
      
 @endsection
