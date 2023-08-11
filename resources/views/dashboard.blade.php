@include('header')
    <div id="main-content" >
        <div class="page-heading">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">New Works</h6>
                                            <h6 class="font-extrabold mb-0">{{$myworkdata->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Remaining</h6>
                                            <h6 class="font-extrabold mb-0">{{$remainworkdata->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Users</h6>
                                            <h6 class="font-extrabold mb-0">80.000</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Saved Post</h6>
                                            <h6 class="font-extrabold mb-0">112</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Working Tasks</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <!-- {{-- <div class="col-12 col-xl-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Profile Visit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <h5 class="mb-0 ms-3">Europe</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">862</h5>
                                        </div>
                                        <div class="col-12">
                                            <div id="chart-europe"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-success" width="32" height="32" fill="blue"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <h5 class="mb-0 ms-3">America</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">375</h5>
                                        </div>
                                        <div class="col-12">
                                            <div id="chart-america"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                    style="width:10px">
                                                    <use
                                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                </svg>
                                                <h5 class="mb-0 ms-3">Indonesia</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0">1025</h5>
                                        </div>
                                        <div class="col-12">
                                            <div id="chart-indonesia"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}} -->
                        <!-- <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Notepad
                                        <a href="/notepad"><button class="btn btn-primary" style="float:right">More</button></a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($mynotepaddata as $value)
                                                <tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <p class="font-bold mb-0">{{$value->title_note}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><textarea readonly rows="1" cols="70">{{$value->details_note}}</textarea></p>
                                                    </td>
                                                </tr>
                                                    @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Notice Board
                                    <div class="spinner-border text-success" id="updated" style=" float:right" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>  
                                    <!-- <button class="btn btn-success" id="updated" style=" float:right">Updated</button> -->
                                    </h4>
                                </div>
                                <form action="/edit/notepaddata" method="POST" id="notice">
                                @csrf
                                <div class="card-body">
                                @foreach($noticeboard as $value)
                                    <div class="" style="margin-top:-30px">
                                    <input type="hidden" name="id_note" id="id_note" value="{{$value->id_note}}" >
                                    <input type="hidden" name="title_note" id="title_note" value="{{$value->title_note}}" >
                                    <input type="hidden" name="status_note" id="status_note" value="{{$value->status_note}}" >
                                    <textarea class="form-control" style="color:black" id="details_note" name="details_note" class="form-control" value="" rows="6">{{$value->details_note}}</textarea>
                                            <!-- <input type="text"  id="details_note" name="details_note" class="form-control" value="{{$value->details_note}}"> -->
                                    </div>
                                @endforeach
                                    <br>
                                    <button class="btn btn-primary" type="submit" id="updatebtn" style="float:right">Update</button>
                                    <br>
                                </div>
                               </form>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Active Projects
                                        <a href="/projects"><button class="btn btn-primary" style="float:right">More</button></a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th class="text-center">Language</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($activeprojects as $value)
                                                    <tr>
                                                    <td class="col-4">
                                                        <div class="d-flex align-items-center">
                                                            <p class="font-bold  mb-0">{{$value->title_proj}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto text-center">{{$value->language_proj}} Project</td>
                                                    </tr>
                                                    @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>My Works
                                        <a href="/works"><button class="btn btn-primary" style="float:right">More</button></a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($myworkdata as $value)
                                                    <tr>
                                                    <td class="col-4">
                                                        <div class="d-flex align-items-center">
                                                            <p class="font-bold mb-0">{{$value->title}}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0 text-center">@if ($value->status == '1')
                                                                <span class="badge bg-success">Active</span>                                
                                                            @else
                                                                <span class="badge bg-danger">Deactive</span>                                
                                                            @endif</p>
                                                    </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex align-items-center">
                                <!-- <div class="avatar avatar-xl">
                                    <img src="assets/images/fvcon.png" alt="Face 1">
                                </div>  -->
                                 <div class="name">
                                 <!-- <h5 class="font-bold">{{$data->name}}</h5> -->
                                    <!-- <h6 class="text-muted mb-0">@Bilael Develops</h6> -->
                                    <h6 class="" style=""><img src="assets/images/stamp.png" alt="Face 1" style="width:250px; height:70px;margin-top:0px" ></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Working Tasks</h4>
                        </div>
                        <div class="card-content pb-4">
                            @foreach($workingtasks as $value)
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img src="assets/images/faces/4.jpg"> -->
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">{{$value->task}}</h5>
                                    <h6 class="text-muted mb-0">@ {{$value->title}}</h6>
                                </div>
                            </div>
                            @endforeach
                            <div class="px-4">
                                <a href="/works"><button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>My Works</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Active Accounts</h4>
                            <!-- <button style="background-color:#ff7976;border:none">Social Accounts</button> -->
                        </div>
                        <div class="card-content pb-4">
                            @foreach($onaccounts as $value)
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img src="assets/images/faces/4.jpg"> -->
                                </div>
                                <div class="name" style="width:90%">
                                    <a href="{{$value->link_sac}}" target="_blank"><span style="color:black">{{$loop->iteration}}- </span>  {{$value->title_sac}}</a>
                                    <!-- <h5 class="mb-1">{{$value->link_sac}}</h5> -->
                                    <!-- <h6 class="text-muted mb-0" style=""></h6> -->
                                </div>
                            </div>
                            @endforeach
                            <div class="px-4">
                                <!-- <a href="/accounts"><button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Accounts</button></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Updated Accounts</h4>
                            <!-- <button style="background-color:#ff7976;border:none">Social Accounts</button> -->
                        </div>
                        <div class="card-content pb-4">
                            @foreach($activeaccounts as $value)
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <!-- <img src="assets/images/faces/4.jpg"> -->
                                </div>
                                <div class="name" style="width:90%">
                                    <a href="{{$value->link_sac}}" target="_blank"><span style="color:black">{{$loop->iteration}}- </span>  {{$value->title_sac}}</a>
                                    <!-- <h5 class="mb-1">{{$value->link_sac}}</h5> -->
                                    <!-- <h6 class="text-muted mb-0" style=""></h6> -->
                                </div>
                            </div>
                            @endforeach
                            <div class="px-4">
                                <!-- <a href="/accounts"><button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Accounts</button></a> -->
                            </div>
                        </div>
                    </div>
                    <!-- {{-- <div class="card">
                        <div class="card-header">
                            <h4>Visitors Profile</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div> --}} -->
                </div>
            </section>
        </div>
@include('footer')
<script>
    $(document).ready(function () { 
        $("#updated").hide();
        $("#updatbtn").show();

    });
    $('#notice').submit(function()
    {
        $("#updated").show();
        $("#updatebtn").hide();
        
    }
    )
</script>