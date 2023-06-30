const app = Vue.createApp({
   data(){
  
      return{
         password: "",
         fname:  "",
         lname: "",
         email: "",
         pwd: "",
         section: "",
         role: "",
         amount: "",
         message: "",
         cfname: "",
         sample: "orange"


      }
    },
   
    methods: {
         
     register(){
      axios.post('/create', { 
         fname: this.fname,
         lname: this.lname,
         section: this.section,
         email: this.email,
         password: this.pwd


        })
        .then(function(r){
       
         console.log(r.data);
        })
     },
     dologin(){
      let self =  this;
      axios.post('/login', { 
         
         email: this.email,
         password:  this.pwd


        })
        .then(function(r){
         // window.location.href ="/displayaccount"
           if(r.data == 200){
              // self.makeRequest();
            window.location.href ="/displayaccount"

           }else if(r.data == 201){
                  self.makedo(this.email,this.pwd)
           }
        })
      
      
     },
     makeRequest(){
      axios.get('/displayaccount', { 
         
      


        })
        .then(function(r){
        ///  window.location.href ="/displayaccount"
            console.log(r.data);
        })
     },
     makedo(email,pwd){
      let self = this;
      axios.post('/officers', { 
         
      
         email: self.email,
         password:  self.pwd

      })
      .then(function(r){
       window.location.href ="/officers"
      
     //console.log(r.data);
      })

     },
     editstudents(id){
      let self = this;
      axios.post('/edit', { 
         id: id,
      

       })
       .then(function(r){
      
        r.data.message.forEach(function(v){
            self.fname = v.Firstname;
            self.lname = v.Lastname;
            self.section = v.Section;
            self.email = v.email
            self.pwd = v.password
            self.id = v.id;
            console.log(r.data);
        })
      
      
       })
      
     },
     updateAccount(){
      let self  = this;
      axios.post('/update', { 
       id: self.id,
       fname: self.fname,
       lname: self.lname,
       section: self.section,
       email: self.email,
      


      })
      .then(function(r){
   
       console.log(r.data);
      })

     },
     deletestudent(id){
      axios.post('/delete', { 
        id: id,
     

      })
      .then(function(r){
       location.reload();
        console.log(r.data);
       })
    },
    promotestudent(id){
      axios.post('/promote', { 
         id: id,
      
 
       })
       .then(function(r){
       /// location.reload();
         console.log(r.data);
        })
    },
    announce(){
      let self  = this;
      axios.post('/announce', { 
       id: self.id,
         sender: self.fname,
         message: self.lname,
       
      


      })
      .then(function(r){
   
       console.log(r.data);
      })

    },
    paymentpost(){
      axios.post('/payments', { 
      
          sender: this.fname,
          message:  this.message,
          amount:  this.amount
        
       
 
 
       })
       .then(function(r){
    
        console.log(r.data);
       })
    
    },
    makeAssign(id){
      this.id = id;
    },
    announceIndividual(){
    let self  = this;
      axios.post('/individual', { 
      id:  self.id,
         sender: self.fname,
         message: self.lname,
       
      


      })
      .then(function(r){
   
       console.log(r.data);
      })
    
    },
    dogetPayment(data){
      let self =  this;
      axios.post('/paymentUser', { 
         section: data,
            
          
         
   
   
         })
         .then(function(r){
      
             self.doDisplaypayment(data);
            
         })
    },
    doDisplaypayment(data){
      axios.get('/paymentUsers/data', { 
      
            
         params: {
            Section: data,
          }
         
   
   
         })
         .then(function(r){
      
             window.location.href = "/paymentUsers/data?Section=" + encodeURIComponent(data);
        
            //console.log(r.data)
         })
        
    },
      paypapayment(){
      
      },
      doReserve(e, fname, price, apartment) {
         e.preventDefault();
        
         
       
         paypal.Buttons({
           createOrder: function(data, actions) {
             return actions.order.create({
               purchase_units: [
                 {
                   amount: {
                     value: '0.01'
                   },
                   description: apartment
                 }
               ]
             });
           },
           onApprove: function(data, actions) {
             return actions.order.capture().then(function(details) {
               const payload = {
                 payerName: details.payer.name.given_name,
                 // Add other payload data here
               };
               // Send the payload to your server using Axios
               const data = new FormData();
         data.append("choice",'reserve');
         data.append("fname",fname);
         data.append("price",price);
         data.append("apartmentname",apartment)
               axios
                 .post('index.php',data)
                 .then(function(response) {
                   // Handle the response from the server
                   Swal.fire(
                     '',
                     'You are successfully  paid',
                     'success'
                   )
                 })
                 .catch(function(error) {
                   // Handle any errors that occur during the request
                   console.error(error);
                 });
             });
           }
         }).render('#paypal-button-container');
       },
       testingMode(id){
           this.id = id;
           alert(this.id);
       },
       paymentsend(){
        axios.post('/paymentUsers', { 
          id:  this.id,
          
           
          
    
    
          })
          .then(function(r){
       
           console.log(r.data);
          })
       },
       payTest(){
        axios.post('/paymentTest', { 
          id:  this.id,
          
           
          
    
    
          })
          .then(function(r){
       
           console.log(r.data);
          })
       },
       Cnewpayment(){
        axios.post('/cpayment', { 
          fname:  this.fname,
          lname: this.lname,
          section: this.section,
          
          
           
          
    
    
          })

          .then(function(r){
       
           console.log(r.data);
          })
       },
       updatenewpayment(id){
        let self = this;
        axios.post('/updatenewpayment', { 
           id: id,
        
  
         })
         .then(function(r){
        
          r.data.message.forEach(function(v){
              self.fname = v.Firstname;
              self.lname = v.Lastname;
              self.section = v.Section;
              self.email = v.email
              self.pwd = v.password
              self.id = v.id;
              console.log(r.data);
          })
        
        
         })
       },
    
       updaterecordsUser(){
        this.sample = "new value";
       },
       edtinewpayment(){
        axios.post('/edtipayments', { 
          id: this.id,
          fname:  this.fname,
          lname: this.lname,
          section: this.section,
          
          
           
          
    
    
          })

          .then(function(r){
       
           console.log(r.data);
          })
       },
       deletepayment(id){
        axios.post('/deletepayment', { 
          id: id,
        
          
          
           
          
    
    
          })

          .then(function(r){
       
           console.log(r.data);
          })
       },
       editannounce(id){
        let self = this;
        axios.post('/announcepayment', { 
           id: id,
        
  
         })
         .then(function(r){
        
          r.data.message.forEach(function(v){
              self.id = v.id;
              self.fname = v.sender;
              self.amount = v.amount;
              self.message = v.message;
            
              console.log(r.data);
          })
        
        
         })
       },
       updateannounce(){
        axios.post('/updatepayments', { 
          id: this.id,
          sender:  this.fname,
          amount: this.amount,
          message: this.message,
          
          
           
          
    
    
          })

          .then(function(r){
       
           console.log(r.data);
          })
       },
       deleteannounce(id){
        axios.post('/deleteannounce', { 
          id: id,
        
          
          
           
          
    
    
          })

          .then(function(r){
       
           console.log(r.data);
          })
       },
       dogetrecords(data){
        let self =  this;
        axios.post('/paymentUser', { 
           section: data,
              
            
           
     
     
           })
           .then(function(r){
        
               self.doDisplayrecords(data);
              
           })
      },
      doDisplayrecords(data){
        axios.get('/paymentUsers/data', { 
        
              
           params: {
              Section: data,
            }
           
     
     
           })
           .then(function(r){
        
               window.location.href = "/paymentUsers/data?Section=" + encodeURIComponent(data);
          
              //console.log(r.data)
           })
          
      },
      getrecords(origin){
        let self =  this;
        axios.post('/listsection', { 
           section: origin,
              
            
           
     
     
           })
           .then(function(r){
        
               self.getdisplayrecords(origin);
              
           })
      },
      getdisplayrecords(origin){
        axios.get('/listsectionk/origin', { 
        
              
           params: {
              Section:  origin,
            }
           
     
    
           })
           .then(function(r){
        
              window.location.href = "/listsectionk/origin?Section=" + encodeURIComponent(origin);
          
              
           })
          
      },
      getannounceX(xsection){
        let self =  this;
        axios.post('/viewevent', { 
           section: xsection,
              
            
           
     
     
           })
           .then(function(r){
        
               self.getdisplayrecordsX(xsection);
              
           })
      },
      getdisplayrecordsX(xsection){
        axios.get('/viewevents/xsection', { 
        
              
           params: {
              Section:  xsection,
            }
           
     
    
           })
           .then(function(r){
        
              window.location.href = "/viewevents/xsection?Section=" + encodeURIComponent(xsection);
          
              
           })
          
      },

    
      editrecordsUser(id){
        this.id   = id ;
        axios.post('/editrecordsUser', { 
           id: id,
        
  
         })
         .then(function(r){
        
          r.data.message.forEach(function(v){
        
              // let fname = document.getElementById("fname").value= v.Firstname
              // self.lname = v.Lastname;
              // let lname = document.getElementById("lname").value= v.Lastname
            
              // let section = document.getElementById("section").value= v.Section
            
                self.id = v.id;
                self.fname = v.Firstname;
                self.lname = v.Lastname;
                self.section= v.Section;
              
                console.log(r.data);
            
              
          })
        
        
         })
       },
      testingPay(id){
        axios.post('/updatepaymentTest', { 
          id: id,
             
           
          
    
    
          })
          .then(function(r){
       
              console.log(r.data);
          })
      },
      originalPay(id){
        this.id = id;
      },
      dopaymentpaid(e) {
      
        e.preventDefault();
       alert(this.id)
        
       let  self =  this;
        paypal.Buttons({
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: '0.01'
                  },
                  
                }
              ]
            });
          },
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
              const payload = {
                payerName: details.payer.name.given_name,
                // Add other payload data here
              };
              // Send the payload to your server using Axios
              axios.post('/originalpaymentTest', { 
                id: self.id,
                   
                 
                
          
          
                })
                .then(function(r){
             
                    console.log(r.data);
                })
                .catch(function(error) {
                  // Handle any errors that occur during the request
                  console.error(error);
                });
            });
          }
        }).render('#paypal-button-container');
      },
      dosomething(id){
      this.id = id;
      },
      originalpaid(e) {
      
        e.preventDefault();
       alert(this.id)
        
       let  self =  this;
        paypal.Buttons({
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [
                {
                  amount: {
                    value: '0.01'
                  },
                  
                }
              ]
            });
          },
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
              const payload = {
                payerName: details.payer.name.given_name,
                // Add other payload data here
              };
              // Send the payload to your server using Axios
              axios.post('/originalpayment', { 
                id: self.id,
                   
                 
                
          
          
                })
                .then(function(r){
             
                    console.log(r.data);
                })
                .catch(function(error) {
                  // Handle any errors that occur during the request
                  console.error(error);
                });
            });
          }
        }).render('#paypal-button-container');
      },
      viewRecords(id){
        let self = this;
        axios.post('/viewRecords', { 
           id: id,
        
  
         })
         .then(function(r){
        
          r.data.message.forEach(function(v){
              self.id = v.id;
              self.fname = v.sender;
              self.lname = v.amount;
              self.section= v.section;
              self.message = v.message;
            
              console.log(r.data);
          })
        
        
         })
      }


      
    }

})
app.mount('#app')
