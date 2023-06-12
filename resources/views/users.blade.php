<title>Users - Personal Task Manager </title>

@include('header')
<div id="main-content"> 
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header" style=" color:black">   
                     <h4>Users                                      
                    <!-- <button type="button" style="float:right" class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">
                        +Add
                    </button> -->
                  </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th class="text-center">Email</th>
                                <!-- <th class="text-center">Description</th> -->
                                <!-- <th class="text-center">Status</th> -->
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($usersdata as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td class="text-center">{{$value->email}}</td>
                                <!-- <td class="text-center">
                                    <button type="button" onclick="getDatafromDB('{{$value->id}}')" data-id="{{$value->id}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                                      Edit
                                    </button>
                                    <button type="button" onclick="DeleteDatafromDB('{{$value->id}}')" data-id="{{$value->id}}" class="btn btn-danger">
                                        Delete</button>
                                    <a href="/works/{{$value->id}}"><button class="btn btn-info">Details</button></a>
                                </td> -->
                            </tr>
                         @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

     {{-- Add Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Work</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/add/data" method="POST" >
                @csrf
                <label for="title">Work Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" required>  
                <label for="desc">Description</label>
                <input type="text" id="desc" name="desc" class="form-control" required>
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                    <option value="2">Slow Down</option>
                </select>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="added">Save</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    {{-- Edit Modal --}}
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Works</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="/edit/data" method="POST">
                @csrf
                <input type="hidden" name="id_work" id="getid">
                <label for="title">Title</label>
                <input type="text" id="gettitle" name="title" class="form-control" required>
                <label for="subject">Subject</label>
                <input type="text" id="getsubject" name="subject" class="form-control" required>  
                <label for="desc">Description</label>
                <input type="text" id="getdesc" name="desc" class="form-control" required>
                <label for="status">Status</label>
                <select id="getstatus" name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="2">Slow Down</option>
                    <option value="0">Deactive</option>
                </select>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updated">Update</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

@include('footer') 

<script>
  $('#added').click(function()
    {swal({
             title:'Saved',
             icon:'success',
             text:'New Work Added...!',
            });
    }
  )
        // Get for edit.
        function getDatafromDB(value){
         const xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            let res = JSON.parse(this.responseText);
            console.log(this.responseText);
            console.log(res);
            res = res[0];
            document.getElementById('getid').value = res.id_work;
            document.getElementById('gettitle').value = res.title;
            document.getElementById('getsubject').value = res.subject;
            document.getElementById('getdesc').value = res.desc;
            document.getElementById('getstatus').value = res.status;
            }
        };
        xhttp.open("GET","/api/getdata/"+value);
        xhttp.send();
    }
    $('#updated').click(function(){
      swal({
             title:'Updated',
             icon:'success',
             text:'Your Works Updated...!',
            });      
    })
  
    // Delete Data
    function DeleteDatafromDB(value)
        {swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover !",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    let res = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    console.log(res);
                    if(res == 1){
                      //-----------
                      swal("Your Data has been deleted!", {
                      title:'Deleted',
                      icon: "success",
                      timer:1000
                    }).then(()=> {
                      window.location.reload();
                    })
                    }
                    else if (res == 0)
                   {
                    swal({
                          title:'Oops',
                          icon:'info',
                          text:'This work is on pending',
                        });
                   }
                   //-------------
              }
            };
            xhttp.open("GET","/api/Deletedata/"+value);
            xhttp.send();
          }
        });
      }
        

</script>