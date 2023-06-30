<x-admin-header />

<body>
   <div id="app">

      <x-admin-navbar />
      <div class="container-fluid ">
         <div class="row">
            <x-adminsidebar />
            <div class="col-lg-10  justify-content-start">
               <button type="button" class="btn btn-primary mt-5 ms-4" data-bs-toggle="modal"
                  data-bs-target="#categoryModal">Create Announcement</button>
               <div class="container  mt-5">
                  <table class="table">

                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Firstname</th>
                           <th scope="col">Lastname</th>
                           <th scope="col">Section</th>
                           <th scope="col">Username</th>
                           <th scope="col">Role</th>
                           <th scope="col">action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        <tr>

                           <td>{{ $user->id}}</td>
                           <td>{{ $user->Firstname}}</td>
                           <td>{{ $user->Lastname}}</td>
                           <td>{{ $user->Section}}</td>
                           <td>{{ $user->email}}</td>
                           <td>{{ $user->Role}}</td>
                           <td>

                              <button type="button" class="btn btn-info ms-2" @click="editstudents({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#viewModal">view</button>

                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                 data-bs-target="#SModal" @click=" makeAssign({{ $user->id}})">Send</button>
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
      <!-- Choose Category  -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Choose Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                     data-bs-target="#CModal">Event</button>
                  <button type="button" class="btn btn-success ms-3" data-bs-toggle="modal"
                     data-bs-target="#paymentModal">Payment</button>
                  <button type="button" class="btn btn-info  ms-3">Meeting</button>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
      <!-- creating  account  -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <x-announce-modal />
      <!-- end  -->
      <!-- payment modal -->
      <x-payment-modal />
      <!-- end -->
      <!-- update modal -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <x-send-modal />
      <!-- end -->
      <!-- view modal -->
      <x-admin-vmodal />
      <!-- end -->

   </div>
   <x-footer />