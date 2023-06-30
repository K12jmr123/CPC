<x-admin-header />

<body>
   <div id="app">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2 ">
         <div class="container-fluid">
            <a class="navbar-brand " href="#">
               <img src="../images/cpch.png" alt="" width="50" height="40" class="d-inline-block align-text-top">
               <p class="d-inline-block link mt-1 align-text-top">CPC Payment Monitoring System</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
               aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
               <div class="navbar-nav text-center mt-n4">
                  <a class="nav-link me-4" href="index.html">{{ $user->Firstname }}</a>
                  <a class="nav-link me-4" href="index.html">Logout</a>

               </div>
            </div>
         </div>
      </nav>

      <div class="container-fluid ">
         <div class="row">
            <div class="col-lg-2 " style="height:  90vh;  background: #021878;">
               <div class="container-fluid  text-light" style="height: 10vh;">

                  <a class="text-light " style="text-decoration: none;  position: absolute; top: 12%; left: 6%;"
                     @click="getrecords('{{ $user->Section }}')">Records</a>

               </div>
               <div class="container-fluid  text-light" style="height: 10vh;">

                  <a class="text-light " href="/officers"
                     style="text-decoration: none;  position: absolute; top: 20%; left: 5%;">Announcement</a>

               </div>


            </div>
            <div class="col-lg-10  justify-content-start">

               <div class="container  mt-5">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-4 ">
                           <div class="container bg-danger rounded shadow " style="height: 20vh;">
                              <h4 class="text-light">Event</h4>
                              <button type="button" class="btn btn-success mt-5"
                                 @click="getannounceX('{{ $user->Section }}')">view</button>
                           </div>
                        </div>
                        <div class="col-lg-4 ">
                           <div class="container bg-primary rounded shadow " style="height: 20vh;">
                              <h4 class="text-light">Payment</h4>
                              <button type="button" class="btn btn-success mt-5"
                                 @click="dogetPayment('{{ $user->Section }}')">view</button>
                           </div>
                        </div>
                        <div class="col-lg-4 ">
                           <div class="container bg-info rounded shadow " style="height: 20vh;">
                              <h4 class="text-light">Meeting</h4>
                              <button type="button" class="btn btn-success mt-5">view</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>

            </div>
            <div class="col-lg-3">
            </div>

         </div>
      </div>
      <!-- creating  account  -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="CModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create New Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="register">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="fname">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="lname">
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="section">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="email">
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="pwd">
                     </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>

            </div>
         </div>
      </div>
      <!-- end  -->
      <!-- update modal -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="UModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">UPDATE Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="updateAccount">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="fname">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="lname">
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="section">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="email">
                     </div>


                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>

            </div>
         </div>
      </div>
      <!-- end -->
      <!-- view modal -->
      <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> View Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="fname" readonly>

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="lname" readonly>
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Section</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="section" readonly>

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="email" readonly>
                     </div>


                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>

            </div>
         </div>
      </div>
      <!-- end -->

   </div>

   <script src="../js/vue.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
   </script>
   <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYCqW62982wK_cz3YKMk_0N25OlRVnSVk&callback=initMap&v=weekly"
      defer></script>
   <script src="../js/index.js"></script>


</body>

</html>