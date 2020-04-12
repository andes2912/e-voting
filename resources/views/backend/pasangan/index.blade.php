@extends('layouts.backend')
@section('title','Pasangan')
@section('content')
<div class="row match-height">
    @foreach ($pasangan as $item)
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="{{asset('backend/images/pages/content-img-1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="text-center">{{$item->ketua_nama}} & {{$item->wakil_nama}}</h5>
                        
                        <div class="card-btns d-flex justify-content-between mt-2">
                            {{-- <a href="#" class="btn gradient-light-primary text-white">Download</a> --}}
                            @if ($item->a == null || $item->b == null)
                            <a href="#" class="btn btn-outline-primary" id="btn_view" data-id="{{$item->id}}" data-toggle="modal" data-backdrop="false" data-target="#backdrop">Visi & Misi Belum Diisi</a>
                            {{-- @else
                                 --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- Modal -->
<div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Visi & Misi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form>
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea name="isi_visi" id="isi_visi" class="form-control" rows="4" required></textarea>
                        <input type="hidden" id="pasangan_id" name="pasangan_id">
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea name="isi_visi" id="isi_misi" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn_visi" class="btn btn-primary">Input</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        // View
        $(document).on('click', '#btn_view', function() {
            var calon_id = $(this).attr('data-id');
            $("#pasangan_id").val(calon_id)
            $.ajax({
                method : 'get',
                url : 'getcalonId/'+calon_id,
                success: function(data){
                    $('#calon_ids').html(data.id);
                    $('#calon_ketua_nama').html(data.ketua_nama);
                }
            });
        });

        // Proses Visi
        $(document).on('click','#btn_visi', function(){
            var id_visi = $("#id_visi").val();
            var isi_visi = $("#isi_visi").val();
            var pasangan_id = $("#pasangan_id").val();

            var id_misi = $("#id_misi").val();
            var isi_misi = $("#isi_misi").val();
            var pasangan_id = $("#pasangan_id").val();

            $.get('visi-store',{'_token': $('meta[name=csrf-token]').attr('content'),id_visi:id_visi,isi_visi:isi_visi,pasangan_id:pasangan_id,id_misi:id_misi,isi_misi:isi_misi,pasangan_id:pasangan_id}, function(resp){
                    swal({
                    html :  "Visi Berhasil di Input",
                    showConfirmButton :  false,
                    type: "success",
                    timer: 5000 
                    });
                $("#id_visi").val(''); 
                $("#isi_visi").val(''); 
                $("#pasangan_id").val('');  

                $("#id_misi").val(''); 
                $("#isi_misi").val(''); 
                $("#pasangan_id").val('');   
                location.reload();
            });
        });
    });
</script>
@endsection