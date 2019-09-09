<html>
    <head>
        <title>Pop Up Modal Bootstrao</title>

<link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/fontawesome/css/all.css')}}">
<link rel="stylesheet" href="{{asset('public/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/datatables/jquery.dataTables.min.css')}}">

    </head>
    <body>
        <div class="container">
        <h1>POP UP MODAL BOOTSTRAP</h1>
    
    @if (Session::has('berhasil'))
    <div class="alert alert-success alert-dismissible">{{Session::get('berhasil')}}</div>
    @endif


    @if (Session::has('edit'))
    <div class="alert alert-primary alert-dismissible">{{Session::get('edit')}}</div>
    @endif

    @if (Session::has('delete'))
    <div class="alert alert-danger alert-dismissible">{{Session::get('delete')}}</div>
    @endif

             <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" name="create_record" id="create_record" data-toggle="modal" data-target="#formModal">
  Tambah Data
</button>

    <table class="table table-border" id="data1">
           <thead>
              <th>No</th>
              <th>Nama Siswa</th>  
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Aksi</th>
           </thead>
           <tbody>
             <?php $no=1; ?>
            @foreach($siswa as $row)
           
             <tr>
               <td>{{ $no++}}</td>
               <td> {{ $row->nama}}</td>
               <td> {{ $row->jenkel}}</td>
               <td> {{ $row->alamat}}</td>
           
               <td>
                
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{$row->id}}"><i class="fa fa-trash"></i></button>

                    <!--FUNGSI EDIT-->
            <a class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="{{$row->id}}" data-nama="{{$row->nama}}" data-jenkel="{{$row->jenkel}}" data-alamat="{{$row->alamat}}"><i class="fa fa-edit"></i></a>

                    <!---->

                 
               </td>
             </tr>
             @endforeach
             <?php $no++; ?>
           </tbody>


         </table>



          </div>

<!--Start Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
        
      </div>
      <span id="form_result"></span>
      <form method="post" id="sample_form">
        {{csrf_field()}}
      <div class="modal-body">  
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="nama" placeholder="Enter Name">
            
          </div>
          <div class="form-group">
            <label for="jenkel">Jenis Kelmain</label>
              <select class="form-control" name="jenkel">
                <option value=""> --Pilih-- </option>
              <option value="Laki-laki"{{old('jenkel') == 'Laki-laki' ? 'selected':''}}>Laki-laki</option>
              <option value="Perempuan" {{old('jenkel') == 'Perempuan' ? 'selected':''}}>Perempuan</option>
              </select>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea name="alamat" class="form-control" rows="5"></textarea>
            
          </div>
      </div>
      <div class="modal-footer">
       <input type="hidden" name="hidden_id" id="hidden_id"/>
       <input type="submit" name="action_button" id="action_button" class="btn btn-primary" data-toggle="modal" data-target="#formModal" value="Add"/>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->

<!--Start Modal -->
<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('siswa.update','test')}}" method="POST">
         {{method_field('patch')}}
        {{csrf_field()}}
      
      <div class="modal-body">
            <input type="hidden" name="id_siswa" id="id" value="">
          <div class="form-group">
            <label for="name">Name</label>
            
            <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid':''}}" name="nama" id="nama">
             <span class="help-block text-danger">{{$errors->first('nama')}}</span>
          </div>
         <div class="form-group">
            <label for="jenkel">Jenis Kelmain</label>
              <select class="form-control" name="jenkel" id="jenkel">
                <option value=""> --Pilih-- </option>
              <option value="Laki-laki"{{old('jenkel') == 'Laki-laki' ? 'selected':''}}>Laki-laki</option>
              <option value="Perempuan" {{old('jenkel') == 'Perempuan' ? 'selected':''}}>Perempuan</option>
              </select>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea name="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid':''}}" rows="5" id="alamat"></textarea>
            <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!--End Modal -->

<!--Start Modal -->
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('siswa.destroy','test')}}" method="POST">
         {{method_field('delete')}}
        {{csrf_field()}}
      
      <div class="modal-body">
            <input type="hidden" name="id_siswa" id="id" value="">
        Yakin ingin menghapus data ini..??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary" name="edit">Iya</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!--End Modal -->

    </body>



<script src="{{asset('public/bootstrap/js/jquery-4.3.1.min.js')}}"></script>
<script src="{{asset('public/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
    var table = $('#data1').DataTable();

//star create record


$('#sample_form').on('submit', function(event) {
  event.preventDefault();
  
  $('#action_button').click(function(event) {
     if ('#action_button').val()=='Add' {
    $.ajax({
      url:"{{route('siswa.store')}}",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      dataType:"json",
      success:function(data)
      {
        var html='';
        if (data.errors) 
        {
          html='<div class="alert alert-danger">';
          for(var count=0; count <data.errors.length; count++)
          {
            html+='<p>'+data.errors[count]+'</p>';
          }
          html +='</div>'
        }
        if (data.success) 
        {
          html='<div class="alert alert-success">'+data.success+'</div>';
          $('#sample_form')[0].reset();
          $('#data1').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
      }
    })
  }
  });


});





//end create record




} );
</script>



</html>