<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <title>Liste des Taches</title>

</head>
<body class="container mb-5 col-md-8 border">
    
        <form id="form-submit" action="{{ route('addtache.page') }}" method="post" >
            @csrf
            <div class="form-group m-4 col-md-10 mx-auto text-center" >
                <h2>Todo List</h2>
                <input type="text" name="tache" placeholder="What needs to be done ?" style="width:65%" id="tache"> 
                <input type="submit" name="envoyer" value="+" class="btn-sm btn-primary">  
            </div>     
        </form>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <ul class="list-group m-4 col-md-10 mx-auto">
                    @if(isset($alltache))
                        @foreach($alltache as $element)
                            <li class="list-group-item d-flex col-md-8 mx-auto">
                                <form id="formulaire_submit" method="post" action="" class="col-md-2">
                                    @csrf
                                    <input type="checkbox" <?php if($element->etat == 1) echo('checked') ?> > 
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form>    
                                <div class="col-md-8 text-center">{{ $element->tache }}</div> 
                                <form id="supprimer_submit" method="post" action="" class="col-md-2" style="text-align:end">
                                    @csrf
                                    <div class="ml-5 sup" style="cursor:pointer;background:lightgrey;border-radius:50%;width:28px;height:28px;">
                                        <div class="text-white" style="position:absolute;margin-left:10px">X</div>
                                    </div>
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form> 
                            </li>
                        @endforeach 
                    @endif
                </ul>
                @if(isset($alltache))
                    <div class="col-md-7 mx-auto">{{ count($alltache) }} items left</div>  
                @endif                  
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <ul class="list-group m-4 col-md-10 mx-auto">
                    @if(isset($activetache))
                        @foreach($activetache as $element)
                            <li class="list-group-item d-flex col-md-8 mx-auto">
                                <form id="formulaire_submit" method="post" action="" class="col-md-2">
                                    @csrf
                                    <input type="checkbox" > 
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form>    
                                <div class="col-md-8 text-center">{{ $element->active }}</div> 
                                <form id="supprimer_submit" method="post" action="" class="col-md-2" style="text-align:end">
                                    @csrf
                                    <div class="ml-5 sup" style="cursor:pointer;background:lightgrey;border-radius:50%;width:28px;height:28px;">
                                        <div class="text-white" style="position:absolute;margin-left:10px">X</div>
                                    </div>
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form> 
                            </li>
                        @endforeach
                    @endif
                </ul>
                @if(isset($activetache))
                    <div class="col-md-7 mx-auto">{{ count($activetache) }} items left</div>                    
                @endif
            </div>

            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <ul class="list-group m-4 col-md-10 mx-auto">
                    @if(isset($completedtache))
                        @foreach($completedtache as $element)
                            <li class="list-group-item d-flex col-md-8 mx-auto">
                                <form id="formulaire_submit" method="post" action="" class="col-md-2">
                                    @csrf
                                    <input type="checkbox" checked> 
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form>    
                                <div class="col-md-8 text-center">{{ $element->completed }}</div> 
                                <form id="supprimer_submit" method="post" action="" class="col-md-2" style="text-align:end">
                                    @csrf
                                    <div class="ml-5 sup" style="cursor:pointer;background:lightgrey;border-radius:50%;width:28px;height:28px;">
                                        <div class="text-white" style="position:absolute;margin-left:10px">X</div>
                                    </div>
                                    <input type="hidden" name="tache_id" value="{{$element->id}}" class="tacheid">
                                </form> 
                            </li>
                        @endforeach
                    @endif
                </ul>
                @if(isset($completedtache))
                    <div class="col-md-7 mx-auto">{{ count($completedtache) }} items left</div>                    
                @endif
            </div>
        </div>

        
       
        <div class="col-md-7 mx-auto d-flex justify-content-around" style="postion:absolute;margin-top:-30px;padding-left:110px">
            <ul class="nav nav-pills mb-3 ml-4" id="pills-tab" role="tablist" >
                    <li class="nav-item">                    
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">                   
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Active</a>
                    </li>
                    <li class="nav-item">                    
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Completed</a>
                    </li>
            </ul>
        
            <form id="supprimer_all" method="post" action="" class="col-md-4" style="text-align:end">
                @csrf
                <div class="mt-2" style="cursor:pointer">clear completed</div>
            </form> 
            <!-- <button style="">clear completed</button> -->

        </div>
        
        
       





        <script src=" {{ asset('tache.js') }} "></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       

</body>
</html>