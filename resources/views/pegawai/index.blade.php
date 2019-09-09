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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Data
</button>

	<table class="table table-border" id="data1">
           <thead>
              <th>No</th>
              <th>Kepada</th>  
              <th>Nomor</th>
              <th>Perihal</th>
              <th>Jenis Surat</th>
              <th>Aksi</th>
           </thead>
           <tbody>
             <?php $no=1; ?>
            @foreach($pegawai as $row)
           
             <tr>
               <td>{{ $no++}}</td>
               <td> {{ $row->name}}</td>
               <td> {{ $row->last_name}}</td>
               <td> {{ $row->address}}</td>
               <td> {{ $row->nohp}}</td>
           
               <td>
                
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{$row->id}}"><i class="fa fa-trash"></i></button>

                    <!--FUNGSI EDIT-->
            <a class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editModal" data-id="{{$row->id}}" data-name="{{$row->name}}" data-last_name="{{$row->last_name}}" data-address="{{$row->address}}" data-nohp="{{$row->nohp}}"><i class="fa fa-edit"></i></a>

                    <!---->

                 
               </td>
             </tr>
             @endforeach
             <?php $no++; ?>
           </tbody>


         </table>



          </div>

<!--Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pegawai.store')}}" method="POST">
      	{{csrf_field()}}
      <div class="modal-body">
        
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid':''}}" name="name" placeholder="Enter Name">
		     <span class="help-block text-danger">{{$errors->first('name')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="last_name">Last Name</label>
		    <input type="text" class="form-control {{$errors->has('last_name') ? 'is-invalid':''}}" name="last_name" placeholder="Enter Last Name">
		    <span class="help-block text-danger">{{$errors->first('last_name')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea name="address" class="form-control {{$errors->has('address') ? 'is-invalid':''}}" rows="5"></textarea>
		    <span class="help-block text-danger">{{$errors->first('address')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="nohp">Phone Number</label>
		    <input type="number" class="form-control {{$errors->has('nohp') ? 'is-invalid':''}}" name="nohp" placeholder="Phone Number">
		    <span class="help-block text-danger">{{$errors->first('nohp')}}</span>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->

<!--Start Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Edit Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pegawai.update','test')}}" method="POST">
		 {{method_field('patch')}}
      	{{csrf_field()}}
      
      <div class="modal-body">
      		<input type="hidden" name="id_pegawai" id="id" value="">
		  <div class="form-group">
		    <label for="name">Name</label>
		    
		    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid':''}}" name="name" id="name">
		     <span class="help-block text-danger">{{$errors->first('name')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="last_name">Last Name</label>
		    <input type="text" class="form-control {{$errors->has('last_name') ? 'is-invalid':''}}" name="last_name" id="last_name">
		    <span class="help-block text-danger">{{$errors->first('last_name')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea name="address" class="form-control {{$errors->has('address') ? 'is-invalid':''}}" rows="5" id="address"></textarea>
		    <span class="help-block text-danger">{{$errors->first('address')}}</span>
		  </div>
		  <div class="form-group">
		    <label for="nohp">Phone Number</label>
		    <input type="number" class="form-control {{$errors->has('nohp') ? 'is-invalid':''}}" name="nohp" id="nohp">
		    <span class="help-block text-danger">{{$errors->first('nohp')}}</span>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->

<!--Start Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('pegawai.destroy','test')}}" method="POST">
		 {{method_field('delete')}}
      	{{csrf_field()}}
      
      <div class="modal-body">
      		<input type="hidden" name="id_pegawai" id="id" value="">
		Yakin ingin menghapus data ini..??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary" name="edit">Iya</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->

	</body>



<script src="{{asset('public/bootstrap/js/jquery-4.3.1.min.js')}}"></script>
<script src="{{asset('public/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready( function () {
    var table =$('#data1').DataTable();

//start edit record
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var i = button.data('id')
  var n = button.data('name')
  var ln = button.data('last_name')
  var a = button.data('address')
  var no = button.data('nohp') 
  var modal = $(this)
  modal.find('.modal-body #id').val(i);
  modal.find('.modal-body #name').val(n);
  modal.find('.modal-body #last_name').val(ln);
  modal.find('.modal-body #address').val(a);
  modal.find('.modal-body #nohp').val(no);
})
//end edit record

//start delete record
$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var i = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id').val(i);
 
})
//end delete record


} );
</script>



</html>