@extends('layouts.backend')
@section('title','Add Pasangan')
@section('content')
<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Pasangan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{route('pasangan.store')}}" method="POST" class="form form-vertical">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama Ketua</label>
                                        <select name="ketua_id" id="id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($ketua as $item)
                                                <option value="{{$item->id}}">{{$item->nama_calon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span id="select-ketua"></span>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Nama Wakil</label>
                                        <select name="wakil_id" class="form-control id">
                                            <option value="">Pilih</option>
                                            @foreach ($wakil as $item)
                                                <option value="{{$item->id}}">{{$item->nama_calon}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span id="select-wakil"></span>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>.</label>
                                       <button type="submit" class="btn btn-primary form-control" value="Submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        // SELECT KETUA 
        $(document).ready(function() {
            var id = $("#id").val();
                $.get('{{ Url("select-ketua") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select-ketua").html(resp);
                });
            });

            $(document).on('change', '#id', function (e) { 
            var id = $(this).val();
                $.get('{{ Url("select-ketua") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select-ketua").html(resp);
            });
        });

        // SELECT WAKIL
        $(document).ready(function() {
            var id = $(".id").val();
                $.get('{{ Url("select-wakil") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select-wakil").html(resp);
                });
            });

            $(document).on('change', '.id', function (e) { 
            var id = $(this).val();
                $.get('{{ Url("select-wakil") }}',{'_token': $('meta[name=csrf-token]').attr('content'),id:id}, function(resp){  
                $("#select-wakil").html(resp);
            });
        });
    </script>
@endsection