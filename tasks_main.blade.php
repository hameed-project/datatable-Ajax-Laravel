<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO-DO List</title>
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<section style="padding-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card-header">
                 To-do Lists
                 <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</a>
            </div>
            </div>
            <div class="card-body">
                <table class="table" id="taskTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->description}}</td>
                            <td>{{$data->category}}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item editNote" href="#" data-id="{{$data->id}}">Edit</a>
                                    <a class="dropdown-item deleteNote" href="#" data-id="{{$data->id}}">Delete</a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>        
</section>

<!-- Start Add To-Do Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add To-DO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      
        <form name ="" method="post" id="addTodo">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="description">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="category">
                </div>
            </div> 
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!-- End Add To-Do Modal -->


<!-- Start Edit To-Do Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit To-DO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      
        <form name ="" method="post" id="editTodo">
            @csrf
            <!-- {{ method_field('PUT') }} -->
            <input type="hidden" class="form-control" id="id" name="id">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="category" name="category">
                </div>
            </div> 
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<!-- End Edit To-Do Modal -->

</body>

<!-- Jquery Link -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Optional Links PopUp -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

//Insert ajax 
$('#addTodo').on('submit',function(event){
    event.preventDefault();
    // Get Alll Text Box Id's
    // name = $('#name').val();
    // description = $('#description').val();
    // category = $('#category').val();
    
    $.ajax({
      url: "/add-tasks",
      type:"POST",
      data:$('#addTodo').serialize(),
      // {
      //     "_token": "{{ csrf_token() }}",
      //     name:name,
      //     description:description,
      //     category:category,
      // },
      //Display Response Success Message
      success: function(data){
          //console.log('end');
          $('#addModal').modal('hide');
          location.reload(); 
      },
      error:function(error)
      {
        console.log(error);
      }
    });
console.log("It failed");

});
//End Insert ajax 



//Delete industry threat
$(".deleteNote").click(function(){
var id = $(this).attr('data-id');
 //console.log(id);
 
 $.ajax({
      url: '/delete-tasks/'+ id,
      type: 'get',
      dataType:"JSON",
      data:{
         id:id
      },
      success:function(data)
      {
        //console.log('deletd');
        location.reload(); 
        }
      
   });
});
//End delete industry threat



//Edit ajax 
$(".editNote").click(function(){
var id = $(this).attr('data-id');
  
  //console.log(id);
  $('#editModal').modal('show');

  $tr = $(this).closest('tr');
  var data = $tr.children('td').map(function(){
  return $(this).text();

    }).get();
    console.log(data);
    $('#id').val(data[0]);
    $('#name').val(data[1]);
    $('#description').val(data[2]);
    $('#category').val(data[3]);
  });


$('#editTodo').on('submit',function(event){
    event.preventDefault();
    
    var id = $('#id').val();

    $.ajax({
      url: '/edit-tasks/'+ id,
      type:"post",
      data:$('#editTodo').serialize(),

      //Display Response Success Message
      success: function(data){
          //console.log('end');
          $('#editModal').modal('hide');
          location.reload(); 
      },
      error:function(error)
      {
        console.log(error);
      }
    });
});
});
</script>
</html>

