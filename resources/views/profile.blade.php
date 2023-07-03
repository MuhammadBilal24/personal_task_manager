@include('header')
    <div id="main-content" >
        <div class="page-heading">
        <section id="content-types">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="assets/images/samples/origami.jpg"
                                        alt="Card image cap" style="height: 20rem" />
                                    <!-- <div class="card-body">
                                        <h4 class="card-title">Name</h4>
                                        <p class="card-text">
                                            Details
                                        </p>
                                        <p class="card-text">
                                        Description
                                        </p>
                                        <button class="btn btn-primary block">Update now</button>
                                    </div> -->
                                    <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="assets/images/faces/2.jpg" alt="Face 1">
                                </div>
                                 <div class="name">
                                 <h4 class=" mb-0">&nbsp;&nbsp; Personal Task Maneger</h4>
                                 <h6 class="text-muted mb-0">&nbsp;&nbsp; @Bilael Develops</h6>
                                    <!-- <h6 class="" style=""><img src="assets/images/stamp.png" alt="Face 1" style="width:250px; height:70px;margin-top:0px" ></h6> -->
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xl-12 col-md-6 col-sm-12">
                        
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Profile</h4>
                                        <p class="card-text">
                                            Details
                                        </p>
                                        <form class="form" method="post">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="feedback1" class="sr-only">Name</label>
                                                    <input type="text" id="feedback1" class="form-control"
                                                        placeholder="Name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="feedback4" class="sr-only">Last Game</label>
                                                    <input type="text" id="feedback4" class="form-control"
                                                        placeholder="Last Name" name="LastName">
                                                </div>
                                                <div class="form-group">
                                                    <label for="feedback2" class="sr-only">Email</label>
                                                    <input type="email" id="feedback2" class="form-control"
                                                        placeholder="Email" name="email">
                                                </div>
                                                <div class="form-group form-label-group">
                                                    <textarea class="form-control" id="label-textarea" rows="3"
                                                        placeholder="Suggestion"></textarea>
                                                    <label for="label-textarea"></label>
                                                </div>
                                            </div>
                                            <div class="form-actions d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
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