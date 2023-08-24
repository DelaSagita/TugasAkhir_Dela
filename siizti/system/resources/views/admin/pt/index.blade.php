@extends('template.base')
@section('title')
DETAIL PEGAWAI PIMPINAN
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row">
    <div class="col-md-12">

      <div class="card mb-4">
        <h5 class="card-header">Profile Pengadilan Tinggi</h5>
        <!-- Modal Backdrop -->
        <div class="mt-3">
          <!-- Button trigger modal -->
          <div class="container">
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
              <form action="{{url('admin/pengaturan-pt',$pt->id)}}/update" method="post">
                @csrf
             
              <div class="row">
                <div class="col-md-6 mt-3">
                  <span>NIP Pengadilan Tinggi</span>

                  <input type="text" class="form-control" value="{{ucwords($pt->pt_nip)}}" name="pt_nip" required ></input>
                </div>
                <div class="col-md-6 mt-3">
                  <span>Nama Pengadilan Tinggi</span>
                  <input type="text" class="form-control" value="{{ucwords($pt->pt_nama)}}" name="pt_nama" required ></input>
                </div>
              </div>

              <div class="col-md-12">
                <button class="btn btn-primary mt-3 mb-3 float-right" style="float:right;">Update</button>
              </div>
               </form>
            </div>
          </div>


        </div>
      </div>
    </div>

    @endsection