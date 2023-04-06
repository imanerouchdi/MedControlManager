<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('componentPage.head')
</head>

<body>
    <div class="" >
        
        
    

        <!-- Page Content -->
        <div id="page-content-wrapper">
            {{--  navBar  --}}
            @include('componentPage.navbar')
            @include('componentPage.header')

            {{--  Content   --}}
            <div class="pt-5">
                <div class="container pt-4 pt-xl-5">
                    <div class="row pt-5">
                        <div class="col-md-8 text-center text-md-start mx-auto">
                        @yield('Rendez-vous')
                        </div>
                    </div>
                </div>
            </div>
                    
                    
                    
                

            
           
        </div>
      
    </div>
   
    
    
    </div>
    {{-- footer   --}}
    @include('componentPage.footer')
    @include('componentPage.footer-script')
</body>

</html>