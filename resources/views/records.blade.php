<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=Raleway:wght@100&display=swap"
      rel="stylesheet">
   <script src="https://kit.fontawesome.com/2b6214662f.js" crossorigin="anonymous"></script>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../css/style.css">

   <title>Hekaru</title>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
   <script
      src="https://www.paypal.com/sdk/js?client-id=Ab7ECwDT5rHSN_Y2s0QOgK9TRxg9j5EHyr2TYOe22tSxHIqlDYT84g6Uz3JgxAo4pAyakmfBkt2b7hSq">
   </script>
</head>

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

                  <a class="text-light " href=""
                     style="text-decoration: none;  position: absolute; top: 12%; left: 6%;">Records</a>

               </div>
               <div class="container-fluid  text-light" style="height: 10vh;">

                  <a class="text-light " href="/announcepage"
                     style="text-decoration: none;  position: absolute; top: 20%; left: 5%;">Announcement</a>

               </div>

            </div>
            <div class="col-lg-10  justify-content-start">

               <div class="container  mt-5">

                  <table class="table">

                     <thead>
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Firstname</th>
                           <th scope="col">Lastname</th>
                           <th scope="col">Section</th>
                           <th scope="col">Status</th>
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
                           <td>{{ $user->status}}</td>

                           <td>


                              <button type="button" class="btn btn-info ms-2" @click="editstudents({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#viewModal">view</button>

                              <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                                 data-bs-target="#paypalModal">Paynow</button>
                              <button type="button" class="btn btn-primary ms-2" @click="testingMode({{ $user->id}})"
                                 data-bs-toggle="modal" data-bs-target="#testingModal">Testing </button>
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
      <!-- testing mode -->
      <!-- Button trigger modal -->


      <!-- Modal -->
      <div class="modal fade" id="testingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Testing Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form @submit.prevent="payTest">
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Amount</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                     </div>

                     <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
      <!-- sample -->
      <div class="modal fade" id="reserve-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reservation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <form>
                     <div class="mb-3">
                        <input type="text" class="form-control" id="apart" aria-describedby="emailHelp"
                           v-model="apartment" readonly>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                     </div>
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price</label>
                        <input type="text" class="form-control" id="prc" v-model="price" readonly>
                     </div>

                     <div class="mb-3">

                        <input type="date" class="form-control" id="exampleInputPassword1">

                     </div>
                     <button type="submit" class="btn btn-primary"
                        @click="doReserve($event,fname,price,apartment)">Submit</button>

                  </form>
                  <div class="container  float-start mt-5" style="width: 50px;">
                     <div id="paypal-button-container"></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
      <!-- end -->
      <!-- payment modal -->
      <div class="modal fade" id="paypalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> Choose online Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <button type="submit" class="btn btn-primary" @click="originalpaid($event)">Submit</button>

                  <div class="container  float-start mt-5" style="width: 50px;">
                     <div id="paypal-button-container"></div>
                  </div>

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