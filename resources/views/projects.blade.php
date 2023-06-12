<title>Projects - Personal Task Manager </title>
@include('header')
<div id="main-content"> 
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header" style=" color:black">   
                     <h4>Projects                                      
                    <button type="button" style="float:right" class="btn btn-primary"data-toggle="modal" data-target="#exampleModal">
                        +Add
                    </button></h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Language</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($projectdata as $value)
                            <tr>
                                <td>{{$value->id_proj}}</td>
                                <td>{{$value->title_proj}}</td>
                                <td class="text-center">{{$value->subject_proj}}</td>
                                <td class="text-center">{{$value->language_proj}}</td>
                                <td class="text-center">{{$value->desc_proj}}</td>
                                <td class="text-center">
                                    @if ($value->status_proj == '1')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($value->status_proj == '2')
                                        <span class="badge bg-info">Slow Down</span>                                
                                    @else
                                        <span class="badge bg-danger">Deactive</span>                                
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="getDatafromDB('{{$value->id_proj}}')" data-id="{{$value->id_proj}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
                                      Edit
                                    </button>
                                    <button type="button" onclick="DeleteDatafromDB('{{$value->id_proj}}')" data-id="{{$value->id_proj}}" class="btn btn-danger">
                                        Delete</button>
                                    <a href="/projects/{{$value->id_proj}}"><button class="btn btn-info">Details</button></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/add/projectdata" method="POST" >
                @csrf
                <label for="title_proj">Project Title</label>
                <input type="text" id="title_proj" name="title_proj" class="form-control" required>
                <label for="subject_proj">Subject</label>
                <input type="text" id="subject_proj" name="subject_proj" class="form-control" required>  
                <label for="language_proj">Language</label>
                <select id="language_proj" name="language_proj"" class="form-control" required>
                    <option value="">Choose a Language</option>
                    <option value="laravel">Laravel</option>
                    <option value="codeigniter">CodeIgniter</option>
                    <option value="corephp">Core PHP</option>
                    <option value="react">React</option>
                </select>
                <label for="desc_proj">Description</label>
                <input type="text" id="desc_proj" name="desc_proj" class="form-control" required>
                <label for="status_proj">Status</label>
                <select id="status_proj" name="status_proj" class="form-control" required>
                    <option value="">Status</option>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Projects</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="/edit/projectdata" method="POST">
                @csrf
                <input type="hidden" name="id_proj" id="getid_proj">
                <label for="title_proj">Title</label>
                <input type="text" id="gettitle_proj" name="title_proj" class="form-control" required>
                <label for="subject_proj">Subject</label>
                <input type="text" id="getsubject_proj" name="subject_proj" class="form-control" required> 
                <label for="language_proj">Language</label>
                <input type="text" id="getlanguage_proj" name="language_proj" class="form-control" required>  
                <label for="desc_proj">Description</label>
                <input type="text" id="getdesc_proj" name="desc_proj" class="form-control" required>
                <label for="status_proj">Status</label>
                <select id="getstatus_proj" name="status_proj" class="form-control" required>
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
             text:'New Project Added...!',
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
            document.getElementById('gettitle_proj').value = res.title_proj;
            document.getElementById('getsubject_proj').value = res.subject_proj;
            document.getElementById('getlanguage_proj').value = res.language_proj;
            document.getElementById('getdesc_proj').value = res.desc_proj;
            document.getElementById('getstatus_proj').value = res.status_proj;
            }
        };
        xhttp.open("GET","/api/projectgetdata/"+value);
        xhttp.send();
    }
    $('#updated').click(function(){
      swal({
             title:'Updated',
             icon:'success',
             text:'Your Projects Updated...!',
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
                          text:'This Project is on pending',
                        });
                   }
                   //-------------
              }
            };
            xhttp.open("GET","/api/PorjectDeletedata/"+value);
            xhttp.send();
          }
        });
      }
        

</script>