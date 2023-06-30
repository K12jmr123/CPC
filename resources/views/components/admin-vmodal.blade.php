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