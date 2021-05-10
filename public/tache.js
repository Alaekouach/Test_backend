$(document).ready(function(){
   
    const forms  = document.querySelectorAll('#formulaire_submit'); 
        forms.forEach( (form) => {
            form.addEventListener('change', function(event) {
                event.preventDefault(); 

                const tache_id = this.querySelector(".tacheid").value; 
                
                const data ={ 
                    tache_id:tache_id
                } 

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url:"ajout-completed-tache",
                    method:"POST",
                    data:data, 

                    success: function(){
                        console.log("il n'y a pas d'erreur")                       
                    },           
                    
                    error :function(){
                        console.log("il y a eu une erreur ");
                    }, 
                });

            }); 

        }); 
}); 




$(document).ready(function(){
   
    const forms2  = document.querySelectorAll('#supprimer_submit'); 
        forms2.forEach( (form2) => {
            form2.addEventListener('click', function(event) {
                event.preventDefault(); 

                const tache_id = this.querySelector(".tacheid").value; 
                
                const data ={ 
                    tache_id:tache_id
                } 

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url:"supprimer-tache",
                    method:"POST",
                    data:data, 

                    success: function(){
                        console.log("il n'y a pas d'erreur")                       
                    },           
                    
                    error :function(){
                        console.log("il y a eu une erreur ");
                    }, 
                });

            }); 

        }); 
}); 




$(document).ready(function(){
   
    const forms3  = document.querySelectorAll('#supprimer_all'); 
        forms3.forEach( (form3) => {
            form3.addEventListener('click', function(event) {
                // event.preventDefault(); 

                
                const data ={ 
                    tache_id:1
                } 

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url:"supprimer-all",
                    method:"POST",
                    data:data, 

                    success: function($tache){
                        console.log("il n'y a pas d'erreur");                       
                    },           
                    
                    error :function(){
                        console.log("il y a eu une erreur ");
                    }, 
                });

            }); 

        }); 
}); 