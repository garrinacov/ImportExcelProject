<!DOCTYPE html>
<html>

<head>
     <title>Import Excel to Database with Laravel</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

     <div class="container">
          <center>
               <h4>Import Excel to Database with Laravel</h4>
          </center>

          {{-- notifikasi form validasi --}}
          @if ($errors->has('file'))
          <span class="invalid-feedback" role="alert">
               <strong>{{ $errors->first('file') }}</strong>
          </span>
          @endif

          {{-- notification success --}}
          @if ($success = Session::get('success'))
          <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $success }}</strong>
          </div>
          @endif

          <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
               IMPORT EXCEL
          </button>

          <!-- Import Excel -->
          <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog" role="document">
                    <form method="post" action="/menus/import_excel" enctype="multipart/form-data">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                              </div>
                              <div class="modal-body">

                                   {{ csrf_field() }}

                                   <label>select file excel</label>
                                   <div class="form-group">
                                        <input type="file" name="file" required="required">
                                   </div>

                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Import</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>



          <a href="/menus/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

          <table class='table table-bordered'>
               <thead>
                    <tr>
                         <th>No</th>
                         <th>Name_Menu</th>
                         <th>Type</th>
                         <th>Price</th>
                         <th>Stock</th>
                    </tr>
               </thead>
               <tbody>
                    @php $i=1 @endphp
                    @foreach($menus as $s)
                    <tr>
                         <td>{{ $i++ }}</td>
                         <td>{{$s->name_menu}}</td>
                         <td>{{$s->type}}</td>
                         <td>{{$s->price}}</td>
                         <td>{{$s->stock}}</td>
                    </tr>
                    @endforeach
               </tbody>
          </table>
     </div>


     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
     </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
     </script>

</body>

</html>