@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Event</h1>
    <div class="h-divider"></div>
    @foreach ($events as $event)
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">
                        <a class="navbar-brand" href="#" data-toggle="modal" data-target="#detailModal{{ $event->id }}">
                            {{ $event->name }}
                        </a>
                        <p class="text-danger">{{ $event->date }} : {{ $event->starting_hour }}</p>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-2">
                            <img width="72px" src="{{ asset('images/'.$event->photo) }}" alt="">
                            </div>
                            <div class="col-sm">
                                <p>
                                    {{ Str::limit($event->description, 200, ' ...') }}
                                </p>
                            </div>
                        </div>

                        <br>

                        <div class="float-right">
                            <a class="btn btn-warning" href="{{ route('edit', $event->id) }}" role="button">Edit</a>
                            <form action="{{ route('destroy', $event) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="detailModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $event->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $event->photo) }}" class="img-fluid" alt="Responsive image">
                        <div class="row">
                            <div class="col">
                                <br>
                                <br>
                                <h4>Deskripsi Event</h4>
                                <p>{{ $event->description }}</p>
                            </div>
                            <div class="col">
                                <br>
                                <br>
                                <p>
                                    <b>Tempat</b>
                                    <br>
                                    {{ $event->place }}
                                </p>
                                <p>
                                    <b>Tanggal</b>
                                    <br>
                                    {{ $event->date }}
                                </p>
                                <p>
                                    <b>Penyelenggara</b>
                                    <br>
                                    {{ $event->user->agency }}
                                </p>
                                <p>
                                    <b>Contact Person</b>
                                    <br>
                                    {{ $event->contact_person }}
                                </p>
                                <p>
                                    <b>Jam</b>
                                    <br>
                                    {{ $event->starting_hour }} s/d {{ $event->end_hour }}
                                </p>
                                <p>
                                    <b>Link Registrasi</b>
                                    <br>
                                    <a href="{{ $event->registration_link }}" target="{{ $event->registration_link }}">{{ $event->registration_link }}</a>
                                </p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
