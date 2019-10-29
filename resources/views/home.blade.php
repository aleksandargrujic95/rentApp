@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bg Konzole</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm">
                            <a href="/sonies/" class="btn btn-primary" style="width: 120px;">Pregled sonija</a>
                        </div>
                        <div class="col-sm" style="text-align: right;">
                            <a href="/customers/" class="btn btn-danger" style="width: 120px;">Korisnici</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
