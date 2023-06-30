<x-admin-header />

<body>
   <div id="app">

      <x-admin-navbar />
      <div class="container-fluid ">
         <div class="row">
            <x-adminsidebar />
            <div class="col-lg-10  justify-content-start">
               <button type="button" class="btn btn-primary mt-5 ms-4" data-bs-toggle="modal"
                  data-bs-target="#CModal">Create</button>
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
                        @foreach ($data as $user)
                        <tr>

                           <td>{{ $user->id}}</td>
                           <td>{{ $user->Firstname}}</td>
                           <td>{{ $user->Lastname}}</td>
                           <td>{{ $user->Section}}</td>
                           <td>{{ $user->email}}</td>
                           <td>{{ $user->Role}}</td>
                           <td>
                              <button type="button" class="btn btn-warning" @click="editstudents({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#UModal">update</button>
                              <button type="button" class="btn btn-info ms-2" @click="editstudents({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#viewModal">view</button>
                              <button type="button" class="btn btn-danger ms-2"
                                 @click="deletestudent({{ $user->id}})">Delete</button>
                              <button type="button" class="btn btn-success ms-2"
                                 @click="promotestudent({{ $user->id}})">Promote</button>
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
      <x-admin-cmodal />
      <!-- end  -->
      <!-- update modal -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <x-admin-umodal />
      <!-- end -->
      <!-- view modal -->
      <x-admin-vmodal />
      <!-- end -->

   </div>

   <x-footer />