<title>Social Accounts - Personal Task Manager </title>
@include('header')
<div id="main-content"> 
    <div class="page-heading">
        <section class="section">
            <div class="card">
                <div class="card-header" style=" color:black">   
                     <h4>Social Accounts                                       
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Links</th>
                                <th class="text-center">Status</th>
                                <!-- <th class="text-center">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($myaccountsdata as $value)
                            <tr>
                                <td>{{$value->id_sac}}</td>
                                <td>{{$value->title_sac}}</td>
                                <td class="text-center">{{$value->email_sac}}</td>
                                <td class="text-center"><a target="__blank" href="{{$value->link_sac}}">{{$value->link_sac}}</a></td>
                                <td class="text-center">
                                    <button type="button" onclick="getDatafromDB('{{$value->id_sac}}')" data-id="{{$value->id_sac}}" style="background:none;border:none" data-toggle="modal" data-target="#exampleModal2">
                                    @if ($value->status_sac == '1')
                                        <span class="badge bg-primary">Active</span>
                                        @elseif($value->status_sac == '2')
                                        <span class="badge bg-warning">Slow Down</span>                                
                                        @elseif($value->status_sac == '3')
                                        <span class="badge bg-success">Updated</span>                                
                                    @else
                                        <span class="badge bg-danger">Deactive</span>                                
                                    @endif
                                    </button>
                                <!--    <button type="button" onclick="DeleteDatafromDB('{{$value->id_sac}}')" data-id="{{$value->id_sac}}" class="btn btn-danger">
                                        Delete</button> 
                                    <a href="/works/{{$value->id_sac}}"><button class="btn btn-info">Details</button></a>-->
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
            <h5 class="modal-title" id="exampleModalLabel">Add New Social Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="/add/accountsdata" method="POST" >
                @csrf
                <label for="title_sac">Account Title</label>
                <input type="text" id="title_sac" name="title_sac" class="form-control" required>
                <label for="email_sac">Email</label>
                <input type="text" id="email_sac" name="email_sac" class="form-control" required>  
                <label for="password_sac">Password</label>
                <input type="text" id="password_sac" name="password_sac" value="nopasswordshown" class="form-control" required>
                <label for="link_sac">Link</label>
                <input type="text" id="link_sac" name="link_sac" class="form-control" required>
                <label for="status_sac">Status</label>
                <select id="status_sac" name="status_sac" class="form-control" required>
                    <option value=""></option>
                    <option value="1">Active</option>
                    <option value="2">Slow Down</option>
                    <option value="3">Updated</option>
                    <option value="0">Deactive</option>
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
    <!-- {{-- Edit Modal --}} -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="/edit/accountsdata" method="POST">
                @csrf
                <input type="hidden" name="id_sac" id="getid_sac">
                <!-- <label for="title">Title</label> -->
                <input type="hidden" id="gettitle_sac" name="title_sac" class="form-control" required>
                <!-- <label for="email_sac">Email</label> -->
                <input type="hidden" id="getemail_sac" name="email_sac" class="form-control" required>  
                <!-- <label for="password_sac">Password</label> -->
                <input type="hidden" id="getpassword_sac" name="password_sac" class="form-control" required>
                <!-- <label for="link_sac">Link</label> -->
                <input type="hidden" id="getlink_sac" name="link_sac" class="form-control" required>
                <label for="status_sac">Status</label>
                <select id="getstatus_sac" name="status_sac" class="form-control" required>
                    <option value="">Choose</option>
                    <option value="1">Active</option>
                    <option value="2">Slow Down</option>
                    <option value="3">Updated</option>
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
             text:'New Social Account Added...!',
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
            document.getElementById('getid_sac').value = res.id_sac;
            document.getElementById('gettitle_sac').value = res.title_sac;
            document.getElementById('getemail_sac').value = res.email_sac;
            document.getElementById('getpassword_sac').value = res.password_sac;
            document.getElementById('getlink_sac').value = res.link_sac;
            document.getElementById('getstatus_sac').value = res.status_sac;
            }
        };
        xhttp.open("GET","/api/accountgetdata/"+value);
        xhttp.send();
    }
    $('#updated').click(function(){
      swal({
             title:'Updated',
             icon:'success',
             text:'Your Account Status Updated...!',
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
    //                       text:'This work is on pending',
    //                     });
    //                }
    //                //-------------
    //           }
    //         };
    //         xhttp.open("GET","/api/Deletedata/"+value);
    //         xhttp.send();
    //       }
    //     });
    //   }
        

</script>