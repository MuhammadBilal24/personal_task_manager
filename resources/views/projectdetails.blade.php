<title>Project Details - Personal Task Manager </title>

@include('header')
<div id="main-content"> 
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header" style=" color:black">   
                     <h4>{{$projectdata[0]->title_proj}}, {{$projectdata[0]->language_proj}} Project                                    
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
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($projectdetailsdata as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="text-center">{{$value->tasks_detproj}}</td>
                                <td class="text-center">
                                    @if ($value->status_detproj == '1')
                                        <span class="badge bg-success">Active</span>
                                        @elseif($value->status_detproj == '2')
                                        <span class="badge bg-info">Slow Down</span> 
                                        @elseif($value->status_detproj == '3')
                                        <span class="badge bg-info">Complete</span>                                 
                                    @else
                                        <span class="badge bg-danger">Deactive</span>                                
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="getDatafromDB('{{$value->id_detproj}}')" data-id="{{$value->id_detproj}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                                      Edit
                                    </button>
                                </td>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Project Tasks</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/add/projectdetailsdata" method="POST" >
                @csrf
                <input type="hidden" id="id_proj" name="id_proj" class="form-control" value="{{$projectdata[0]->id_proj}}" required>
                <label for="tasks_detproj">Project Tasks</label>
                <input type="text" id="tasks_detproj" name="tasks_detproj" class="form-control" required>
                <label for="status_detproj">Status</label>
                <select id="status_detproj" name="status_detproj" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                    <option value="2">Slow Down</option>
                    <!-- <option value="3">Complete</option>   -->
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Projects</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="/edit/projectdetailsdata" method="POST">
                @csrf
                <input type="hidden" name="id_detproj" id="getid_detproj">
                <input type="hidden" name="id_proj" id="getid_proj">
                <label for="tasks_detproj">Project Tasks</label>
                <input type="text" id="gettasks_detproj" name="tasks_detproj" class="form-control" required>
                <label for="status_detproj">Status</label>
                <select id="getstatus_detproj" name="status_detproj" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="2">Slow Down</option>
                    <option value="0">Deactive</option>
                    <option value="3">Complete</option>
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
             text:'New Project Tasks Added...!',
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
            document.getElementById('getid_proj').value = res.id_proj;
            document.getElementById('getid_detproj').value = res.id_detproj;
            document.getElementById('gettasks_detproj').value = res.tasks_detproj;
            document.getElementById('getstatus_detproj').value = res.status_detproj;
            }
        };
        xhttp.open("GET","/api/projectdetailsgetdata/"+value);
        xhttp.send();
    }
    $('#updated').click(function(){
      swal({
             title:'Updated',
             icon:'success',
             text:'Your Projects Tasks Updated...!',
            });      
    })
  
    // Delete Data
    // function DeleteDatafromDB(value)
    //     {swal({
    //           title: "Are you sure?",
    //           text: "Once deleted, you will not be able to recover !",
    //           icon: "warning",
    //           buttons: true,
    //           dangerMode: true,
    //         }).then((willDelete) => {
    //           if (willDelete) {
    //             const xhttp = new XMLHttpRequest();
    //             xhttp.onreadystatechange = function() {
    //               if (this.readyState == 4 && this.status == 200) {
    //                 let res = JSON.parse(this.responseText);
    //                 console.log(this.responseText);
    //                 console.log(res);
    //                 if(res == 1){
    //                   //-----------
    //                   swal("Your Data has been deleted!", {
    //                   title:'Deleted',
    //                   icon: "success",
    //                   timer:1000
    //                 }).then(()=> {
    //                   window.location.reload();
    //                 })
    //                 }
    //                 else if (res == 0)
    //                {
    //                 swal({
    //                       title:'Oops',
    //                       icon:'info',
    //                       text:'This Project is on pending',
    //                     });
    //                }
    //                //-------------
    //           }
    //         };
    //         xhttp.open("GET","/api/PorjectDeletedata/"+value);
    //         xhttp.send();
    //       }
    //     });
    //   }
        

</script>