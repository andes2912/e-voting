@extends('layouts.backend')
@section('title','Pemilih Aktif')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Pemilih Aktif</h4>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            ?>
                            @foreach ($pemilih as $item)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            ?>
                            @endforeach
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection