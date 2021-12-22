@extends('layout')


@section('content')
<x-banner>
</x-banner>


<x-breadcrumbs>
  {{ $seat_flight->title }}
</x-breadcrumbs>



<div id="content">
  <div class="container">

      <div class="row">
          <div class="col-sm-3">
              <div class="sidebar-block">
                  <form action="javascript:void(0);">
                      <h3>Prague To New-York</h3>
                      <span class="similar">Round-trip</span>

                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label>Flying from:</label>

                              <div class="input2_inner">
                                  <input type="text" class="input" value="Prague, Vaclav Havel ">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label>To:</label>

                              <div class="input2_inner">
                                  <input type="text" class="input" value="New-York, John F. Kennedy Intl.">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label>Departing:</label>

                              <div class="input1_inner">
                                  <input type="text" class="input datepicker" value="16/07/2014">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label>Returning:</label>

                              <div class="input1_inner">
                                  <input type="text" class="input datepicker" value="26/07/2014">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input2_wrapper">
                              <label class="col-md-6" style="padding-left:0;padding-top:12px;">Adults:</label>

                              <div class="input2_inner col-md-6" style="padding-right:0;padding-left:0;">
                                  <input type="text" class="form-control" value="2">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label class="col-md-6" style="padding-left:0;padding-top:12px;">Children:</label>

                              <div class="input2_inner col-md-6" style="padding-right:0;padding-left:0;">
                                  <input type="text" class="input" value="0">
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="select1_wrapper">
                              <label>Cabin:</label>

                              <div class="select1_inner">
                                  <select class="select2 select" style="width: 100%">
                                      <option value="1">Economy</option>
                                      <option value="2">Premium Economy</option>
                                      <option value="3">Business</option>
                                      <option value="4">First</option>

                                  </select>
                              </div>
                          </div>
                      </div>

                      <div class="clearfix"></div>
                      <div class="col-sm-12 no-padding margin-top">
                          <div class="input1_wrapper">
                              <label class="col-md-6"
                                     style="padding-left:0;padding-top:12px;font-weight:500;color:#464646;font-size:13px;">Total
                                  Booking:</label>

                              <div class="col-md-6 price-total-left" style="padding-right:0;padding-left:0;">
                                  <span class="red">$729</span>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="no-padding margin-top text-center" style="margin-top:30px;">
                          <a href="booking-flights-page.html" class="btn btn-default btn-cf-submit3"
                             style="width:100%;">BOOKING
                              NOW</a>
                      </div>
                      <div class="clearfix"></div>

                  </form>

              </div>

              <div class="clearfix"></div>
              <div class="margin-top"></div>
              <div class="sm_slider sm_slider1">
                  <a class="sm_slider_prev" href="#"></a>
                  <a class="sm_slider_next" href="#"></a>

                  <div class="">
                      <div class="carousel-box">
                          <div class="inner">
                              <div class="carousel main">
                                  <ul>
                                      <li>
                                          <div class="sm_slider_inner">
                                              <div class="txt1">Lorem ipsum dolor sit amet, consectetuer
                                                  adipiscing elit, sed diam
                                                  nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                  erat volutpat. Ut
                                                  wisi enim ad minim veniam.
                                              </div>
                                              <div class="txt2">George Smith</div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="sm_slider_inner">
                                              <div class="txt1">Lorem ipsum dolor sit amet, consectetuer
                                                  adipiscing elit, sed diam
                                                  nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                  erat volutpat. Ut
                                                  wisi enim ad minim veniam.
                                              </div>
                                              <div class="txt2">Adam Parker</div>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
          <div class="col-sm-9">
              <div class="blog_content">


                  <div class="post post-full">
                      <h3 class="hch">{{ $seat_flight->title }}</h3>

                      <div class="clearfix"></div>
                      <p class="address">Vaclav Havel (PRG) / John F. Kennedy Intl. (JFK)</p>

                      <div class="post-story">
                          <hr>

                          <div class="post-story-body clearfix">


                              <h3>Apr 20, 2017</h3>
                              <ul>

                                  <li>From: Vaclav Havel (PRG)</li>
                                  <li>To: John F.Kennedy lntl. (JFK)</li>

                              </ul>
                              <h5>2:25pm (PRG) -> 7:25pm (JFK)</h5>
                              <hr>
                              <h4>Details:</h4>
                              <h5>2:25pm -> 4:00pm / 1h 35m</h5>
                              <ul>
                                  <li>From Vaclav Havel (PRG)</li>
                                  <li>To Schiphol (AMS)</li>
                                  <li>KLM 1356</li>
                                  <li>BOEING 737-800 (WINGLETS) PASSENGER | Snack</li>
                                  <li>Economy/Coach (L)</li>
                                  <li><a href="">Preview availability</a></li>
                                  <li>Total distance: 439 mi</li>
                                  <li><b>1h 20m stop / in Amsterdam (AMS)</b></li>
                              </ul>
                              <h5>5:20pm -> 7:25pm / 8h 5m</h5>
                              <ul>
                                  <li>From: Schiphol (AMS)</li>
                                  <li>To: John F. Kennedy Intl. (JFK)</li>
                                  <li>KLM 643</li>
                                  <li>BOEING 787-9 | Meal</li>
                                  <li>Economy/Coach (R)</li>
                                  <li><a href="">Preview availability</a></li>
                                  <li>Total distance: 3,632 mi</li>

                              </ul>
                              <p>
                                  BAG FEES: Baggage fees when purchased at the airport (Prices may be cheaper if
                                  purchased online
                                  with KLM) </p>
                              <ul>
                                  <li>Carry on: No fee</li>
                                  <li>1st checked bag: No fee up to 23 kg</li>
                                  <li>2nd checked bag: $91.00 up to 23 kg</li>
                                  <li>How to pay: KLM</li>
                              </ul>
                              <hr>
                              <h3>May 20, 2017</h3>
                              
                          </div>
                         
                      </div>
                  </div>


              </div>
          </div>
      </div>


  </div>
</div>




@endsection