@extends('layouts.app', ['activePage' => 'challenge', 'title' => 'G-22 INTERNATIONAL', 'navName' => 'Challenges', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-black mt-4 mb-5 pb-2">
                                       Challenge ID : C001 
                                    </h5>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <div class="me-4" >
                                                <p  class="text-black text-sm opacity-8 mb-0">Challenge Admin</p>
                                                <h6 class="text-black mb-0" >Jack Peterson</h6>
                                            </div>
                                            
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fas fa-landmark opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Duration</h6>
                                        <span class="text-xs">Total Time for each</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">20 Minutes</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fab fa-paypal opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Attempts</h6>
                                        <span class="text-xs">Number of attempts within 20 minutes</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">3 Times</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    New Challenge
                                </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="javascript:;">&nbsp;&nbsp;Add New Challenge</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row ">
                                           
                                            <h6 class="text-center mb-0">Add New Questions</h6>
                                            <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">

                                            <h6 class="text-center mb-0">Modify Questions</h6>
                                            <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Challenges Completed</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div>
                        </div>
                    </div> 
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">Challenge 1</h6>
                                    <span class="text-xs">#C001</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Challenge 2</h6>
                                    <span class="text-xs">#C002</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Challenge 3</h6>
                                    <span class="text-xs">#C003</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Challenge 4</h6>
                                    <span class="text-xs">#C004</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Challenge 5</h6>
                                    <span class="text-xs">#C005</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Questions To Add</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Question 1</h6>
                                    <span class="mb-2 text-xs">Three  children  went  home  from  a  party  with  four  balloons  each,  and  four
                                     children went home with three balloons each. How many balloons is that altogether?
                                     <br><br>
                                       A.  3            <br>             B.  4          <br>              C.  12           <br>           D.  24          <br>            E.  36	
                                    <span>
                                    <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>   
                               </div>  
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Question 2</h6>
                                    <span class="mb-2 text-xs">How many grams of jam are there in this full jam jar?
                                        <br><br>
                                      A.  0.4 grams        <br>          B.  4 grams          <br>           C.  40 grams  <br> D.  400 grams         <br>        E.  4000 grams			
                                    <span>
                                        
                                
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Question 3</h6>
                                    <span class="mb-2 text-xs">In one of the five words below, every letter has rotational symmetry.
                                         Which word?<br><br>
                                        A.  ONION   <br>      B.  BISON    <br>     C.  DOZEN    <br>    D.  SAXON   <br>     E.  CHINO	
                                    <span>
                                         
                                
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Challenges Stock </h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">29 June 2024, at 05:00 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                    Pending
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">29 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    Timed Out
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                 
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">29 June 2024, at 04:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                   Within Time
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">28 June 2024, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">28 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                   
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">28 June 2024, at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">28 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    Timed Out
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Last 5 Days</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                   
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">27 June 2024, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                   
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">27 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                  
                                
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">26 June 2024, at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                Within Time
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">26 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    Timed Out
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                  
                                
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Challenge Closed</h6>
                                        <span class="text-xs">25 June 2024, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    Timed Out
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>

    


@endsection

