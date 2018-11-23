<!DOCTYPE html>
    <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My To Do List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" media="none" onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" media="none" onload="if(media!='all')media='all'">
	  </head>

      <body id="dark">

        <section id="main">
          <div class="container p-4">
            <div class="row">
              <div class="title col-12 mb-4">
                <h3 class="text-center">My To Do List</h3>
              </div>              
              <div class="form-group col">
                <input type="text" class="form-control" id="newList" placeholder="Add To Do List">
              </div>
              <div class="parent-btn col-2" id="addButton">
                <button type="button" class="btn add-btn btn-success w-100">Add</button>
              </div>

              <div class="col-12 justify-content-end" id="clearDataButton">
                <button type="button" class="btn btn-link clear-btn pull-right">Clear Data</button>
              </div>

              

              <!-- contentnya -->
              <div class="tab-content col-12" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="title1-tab">                  
                  <div class="card card-body no-border row m-0">
                    <div class="col-12 add-to-do">

                      


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('/js/custom.js') }}"></script>

      </body>
    </html>