@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>
    <div class="h-divider"></div>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>Form Publikasi Event</b>
                </div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif

                      <form method="POST" enctype="multipart/form-data" action="{{ route('store') }}">
                        @csrf
                        
                        <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                          
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Nama Event</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Nama Event" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Tempat</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="place" placeholder="ex : Koridor Coworking Space" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" placeholder="Alamat Tempat" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Kota</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" placeholder="Kota" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Tanggal</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="date" placeholder="tanggal" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Jam Mulai</label>
                          <div class="col-sm-10">
                            <input type="time" class="form-control" name="starting_hour" placeholder="" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Jam Berakhir</label>
                          <div class="col-sm-10">
                            <input type="time" class="form-control" name="end_hour" placeholder="" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Link Registrasi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="registration_link" placeholder="https://example.com" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Contact Person</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" name="contact_person" placeholder="08xxxxxxxxxx" required>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Deskripsi Event</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="description" placeholder="" required></textarea>
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Foto / Poster</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" required>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
