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
                  <a class="nav-link me-4" href="index.html">profile</a>
                  <a class="nav-link me-4" href="index.html">Logout</a>

               </div>
            </div>
         </div>
      </nav>







      <div class="container-fluid ">
         <div class="row">
            <div class="col-lg-2 " style="height:  90vh;  background: #021878;">
               <div class="container-fluid  text-light" style="height: 10vh;">

                  <a class="text-light "
                     style="text-decoration: none;  position: absolute; top: 12%; left: 6%;">Records</a>

               </div>
               <div class="container-fluid  text-light" style="height: 10vh;">

                  <a class="text-light " href="/officers"
                     style="text-decoration: none;  position: absolute; top: 20%; left: 5%;">Announcement</a>

               </div>


            </div>
            <div class="col-lg-10  justify-content-start">
               <h1>Event</h1>
               <div class="container  mt-5">
                  <table class="table">

                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Firstname</th>
                           <th scope="col">Lastname</th>
                           <th scope="col">Section</th>
                           <th scope="col">message</th>
                           <th scope="col">Sender</th>
                           <th scope="col">action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $user)
                        <tr>

                           <td>{{ $user->id}}</td>
                           <td>{{ $user->Firstname}}</td>
                           <td>{{ $user->Lastname}}</td>
                           <td>{{ $user->Section}}</td>
                           <td>{{ $user->message}}</td>
                           <td>{{ $user->sender}}</td>

                           <td>

                              <button type="button" class="btn btn-info ms-2" @click="editstudents({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#viewModal">view</button>



                           </td>
                        </tr>
                        @endforeach

                     </tbody>
                  </table>
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
                  <h5 class="modal-title" id="exampleModalLabel">Create New Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="Cnewpayment">
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
                        <label for="exampleInputPassword1" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" v-model="amount">
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
                  <h5 class="modal-title" id="exampleModalLabel">UPDATE new Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="edtinewpayment">
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
                  <h5 class="modal-title" id="exampleModalLabel"> View new Payment</h5>
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
   <x-footer />