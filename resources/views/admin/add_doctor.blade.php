<!DOCTYPE html>
<html lang="en">
<head>
                <style type="text/css">
                            label{
                                display: inline-block;
                                width: 200px;
                            }
                </style>
   
   @include('admin.css')
</head>


<body>
    <div class="container-scroller">
    
                   @include('admin.sidebar')
                   @include('admin.navbar')

                    <!-- Body change kortisi -->
                    <div class="container-fluid page-body-wrapper">
                            <div class="container" align="center" style="padding-top:100px">



                                        @if (session()->has('message'))
                                                <div class="alert success">
                                                            <button type="button" class="close" data-dismiss="alert">
                                                            </button>
                                                            {{session()->get('message')}}
                                                </div>
                                        @endif
                                        <!-- for notificatin message show -->



                                    <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                                    <!-- Name -->
                                                    <div style="padding: 15px;">
                                                        <label>Doctor name</label>
                                                        <input type="text" style="color:black;" name="name" placeholder="write the name" required="">
                                                    </div>

                                        
                                                    <!-- Number -->
                                                    <div style="padding: 15px;">
                                                        <label>Phone</label>
                                                        <input type="number" style="color:black;" name="number" placeholder="write the number" required="">
                                                    </div>


                                                    <!-- Speciality -->
                                                    <div style="padding: 15px;">
                                                        <label>Speciality</label>
                                                            <select name="speciality" style="color:black; width:200px;" required="">
                                                                            <option>----select---</option>
                                                                            <option value="skin">skin</option>
                                                                            <option value="heart">heart</option>
                                                                            <option value="nose">nose</option>
                                                                            <option value="eye">eye</option>
                                                            </select>
                                                    </div>


                                                    <!-- Doctor Room Number -->
                                                    <div style="padding: 15px;">
                                                        <label>Doctor room</label>
                                                        <input type="text" style="color:black;" name="room" placeholder="write the room number" required="">
                                                    </div>


                                                     <!-- Doctor Image -->
                                                    <div style="padding: 15px;">
                                                        <label>Doctor image</label>
                                                        <input type="file" name="file" required="">
                                                    </div>

                                           
                                                    <div style="padding: 15px;">
                                                        <input type="Submit" class="btn btn-success">
                                                    </div>
                           
                                    </form>




                               
                

                    </div>

    </div>
        


      @include('admin.script')

  </body>
</html>