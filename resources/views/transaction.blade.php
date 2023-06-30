<x-admin-header />

<body>
   <div id="app">

      <x-admin-navbar />
      <div class="container-fluid ">
         <div class="row">
            <x-adminsidebar />
            <div class="col-lg-10  justify-content-start">
               <button type="button" class="btn btn-primary mt-5 ms-4" data-bs-toggle="modal"
                  data-bs-target="#paymentModal">Create</button>
               <div class="container  mt-5">
                  <table class="table">

                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Section</th>
                           <th scope="col">Message</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Sender</th>
                           <th scope="col">status</th>
                           <th scope="col">Date</th>
                           <th scope="col">action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $user)
                        <tr>

                           <td>{{ $user->id}}</td>
                           <td>{{ $user->section}}</td>
                           <td>{{ $user->message}}</td>
                           <td>{{ $user->amount}}</td>
                           <td>{{ $user->sender}}</td>
                           <td>{{ $user->status}}</td>
                           <td>{{ $user->Date}}</td>
                           <td>
                              <button type="button" class="btn btn-warning" @click="editannounce({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#UModal">update</button>
                              <button type="button" class="btn btn-info ms-2" @click="editannounce({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#VModal">view</button>
                              <button type="button" class="btn btn-danger ms-2"
                                 @click="deleteannounce({{ $user->id}})">Delete</button>

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
      <x-payment-modal />
      <!-- end  -->
      <!-- update modal -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="UModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Announcement</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="updateannounce">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="fname">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="amount">

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Message</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="message" style="height: 20vh; outline: 0;">

                     </div>


                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>

            </div>
         </div>
      </div>
      <!-- end -->
      <!-- view modal -->
      <div class="modal fade" id="VModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Announcement</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="updateannounce">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">From</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="fname" readonly>

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="amount" readonly>

                     </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Message</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           v-model="message" style="height: 20vh; outline: 0;" readonly>

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