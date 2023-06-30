<div class="modal fade" id="CModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form @submit.prevent="announce">
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">From</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     v-model="fname">

               </div>
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Message</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                     v-model="lname" style="height: 20vh; outline: 0;">

               </div>


               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>

      </div>
   </div>
</div>