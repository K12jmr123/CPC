<div class=" container-fluid  ">
   <div class="row">
      <div class="col-lg-5  ">
         <div class="container-fluid  mt-5  ">


            <div class="container d-flex justify-content-start shadow p-3 mb-5  ms-5 rounded  "
               style="width: 30vw; height:  65vh;">

               <div class="container-fluid ">
                  <div class="row">
                     <div class="col-lg-12 ">
                        <div class="container-fluid bg-dark" style="height: 9vh;   width:  6vw; border-radius:  50%;">
                           <img src="../images/cpch.png" alt="" width="40" height="80"
                              class="d-inline-block align-text-top"
                              style="height: 11vh; width: 7vw; margin-left: -30px;">

                        </div>
                     </div>
                     <div class="col-lg-12 ">
                        <h4 class="text-center mt-3 text-secondary">CPC Login</h4>
                     </div>
                     <div class="col-lg-12 ">
                        <form @submit.prevent="dologin">
                           {!! csrf_field() !!}
                           <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="text" class="form-control" name="eamil" id="email"
                                 aria-describedby="emailHelp" v-model="email">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                              </div>
                           </div>
                           <div class="mb-3">
                              <label for="exampleInputPassword1" name="password" class="form-label">Password</label>
                              <input type="text" class="form-control" v-model="pwd">
                           </div>

                           <button type="submit" class="btn btn-primary">submit</button>

                        </form>
                        <div class="container-fluid  d-inline mt-2">
                           <a class="float-start mt-3" href="#" style="text-decoration: none;" data-bs-toggle="modal"
                              data-bs-target="#exampleModal">Create Account</a>
                           <a class=" float-end mt-3" href="#" style="text-decoration: none;">forgot password</a>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

      <div class="col-lg-7 bg-success" style="height: 90.40vh;  background-image: url('../images/unnamed.jpg');  background-repeat: no-repeat;
              background-size: cover;">

      </div>
   </div>
</div>