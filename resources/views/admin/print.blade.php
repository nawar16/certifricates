@extends('admin.index')
  
@section('content')

<div class="content">
        <div class="container-fluid">
          <h4 style="font-weight:bold">Choose layout option:<h4>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="/certificate/do_print/{{$id}}">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Option1</p>
                  <h3 class="card-title">
                    <small></small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
              </a>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Option2</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Option3</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Option4</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


     
@endsection