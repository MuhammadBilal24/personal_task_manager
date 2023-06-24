<title>Task Details - Personal Task Manager </title>

@include('header')
<div id="main-content"> 
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header" style=" color:black">   
                     <h4> {{$workdata[0]->title}}                                         
                    <button type="button" style="float:right" class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">
                        +Add
                    </button></h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th class="text-center">Tasks</th>
                                <th class="text-center">Reasons</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                           @foreach($remainworkdata as $value)
                             
                           <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="text-center">{{$value->task}}</td>
                                <td class="text-center">{{$value->reason}}</td>
                                <td class="text-center">
                                    @if ($value->status_remain == '1')
                                        <span class="badge bg-success">Working</span>
                                        @elseif($value->status_remain == '2')
                                        <span class="badge bg-info">Complete</span>                                
                                        @elseif($value->status_remain == '3')
                                        <span class="badge bg-info">Slow Down</span>                                
                                        @elseif($value->status_remain == '4')
                                        <span class="badge bg-info">Learning</span>                                
                                        @elseif($value->status_remain == '5')
                                        <span class="badge bg-info">Practicing</span>                                
                                    @else
                                        <span class="badge bg-danger">Not Working</span>                                
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="getDatafromDB('{{$value->id_remain}}')" data-id="{{$value->id_remain}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                                      Edit
                                    </button>
                                    <button type="button" onclick="DeleteDatafromDB('{{$value->id_remain}}')" data-id="{{$value->id_remain}}" class="btn btn-danger">
                                        Delete</button>
                                    <!-- <a href="/works/{{$value->id_remain}}"> -->
                                      <!-- <button class="btn btn-info">Details</button></a> -->
                                </td>
                            </tr>
                         @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

     <!-- {{-- Add Modal --}} -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Tasks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/addtask/data" method="POST" >
                @csrf
                <!-- <label for="title">Id Work </label> -->
                <input type="hidden" id="id_work" name="id_work" class="form-control" value="{{$workdata[0]->id_work}}"  required>
                <label for="task">Task</label>
                <input type="text" id="task" name="task" class="form-control" required>  
                <label for="reason">Reasons</label> 
                <input type="text" id="reason" name="reason" class="form-control" required>
                <label for="status_remain">Status</label>
                <select id="status_remain" name="status_remain" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Working</option>
                    <option value="0">Not Working</option>
                    <option value="2">Complete</option>
                    <option value="3">Slow Down</option>
                    <option value="4">Learning</option>
                    <option value="5">Practicing</option>
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
    <!-- Edit Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tasks</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="/edittask/data" method="POST">
                @csrf
                <input type="hidden" name="id_work" id="getid_work">
                <input type="hidden" name="id_remain" id="getid_remain">
                <label for="task">Task</label>
                <input type="text" id="gettask" name="task" class="form-control" required>
                <label for="reason">Reason</label>
                <input type="text" id="getreason" name="reason" class="form-control" required>  
                <label for="status_remain">Status</label>
                <select id="getstatus_remain" name="status_remain" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Working</option>
                    <option value="0">Not Working</option>
                    <option value="2">Complete</option>
                    <option value="3">Slow Down</option>
                    <option value="4">Learning</option>
                    <option value="5">Practicing</option>
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
             text:'New Task Added...!',
            }).then(()=> {
                      window.location.reload();
                    })
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
            document.getElementById('getid_work').value = res.id_work;
            document.getElementById('getid_remain').value = res.id_remain;
            document.getElementById('gettask').value = res.task;
            document.getElementById('getreason').value = res.reason;
            document.getElementById('getstatus_remain').value = res.status_remain;
            }
        };
        xhttp.open("GET","/api/taskgetdata/"+value);
        xhttp.send();
    }
    $('#updated').click(function(){
      swal({
             title:'Updated',
             icon:'success',
             text:'Your Task Updated...!',
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
                          text:'This task is working',
                        });
                   }
                   //-------------
              }
            };
            xhttp.open("GET","/api/taskDeletedata/"+value);
            xhttp.send();
          }
        });
      }
        

</script>