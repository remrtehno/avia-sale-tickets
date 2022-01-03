 
<div class="tabs_wrapper tabs1_wrapper">
  <div class="tabs tabs1">
      <div class="tabs_tabs tabs1_tabs">
          <ul>
              <li class="active flights">
                  <a href="#tabs-1">Flights</a>
              </li>
          </ul>
      </div>
      <div class="tabs_content tabs1_content">
          <div id="tabs-1">
              <form action="{{ $route }}" method="get" class="form1">
                  <div class="row">
                      <div class="col-sm-4 col-md-2">
                          <div class="select1_wrapper">
                              <label>Flying from:</label>
                              <div class="select1_inner">
                                @if(isSet($search_list_cities))
                                <select-component 
                                    name="from"  
                                    class-name="select2 select" 
                                    options="{{ $search_list_cities }}"
                                    pluck="from"
                                    value="{{ request('from') }}"
                                    >
                                </select-component>  
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="select1_wrapper">
                              <label>To:</label>
                              <div class="select1_inner">
                                @if(isSet($search_list_cities))
                                <select-component 
                                    name="to"  
                                    class-name="select2 select" 
                                    options="{{ $search_list_cities }}"
                                    pluck="to"
                                    value="{{ request('to') }}"
                                    >
                                </select-component>  
                                @endif
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="input1_wrapper">
                              <label>Departing:</label>
                              <div class="input1_inner">
                                <v-date-picker 
                                name="departure"
                                class="input" 
                                locale="ru"
                                value="{{ request('departure') }}"
                                ></v-date-picker>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="input1_wrapper">
                              <label>Returning:</label>
                              <div class="input1_inner">
                                <v-date-picker
                                name="returning"
                                class="input" 
                                locale="ru"
                                value="{{ request('returning') }}"
                                months="1"
                                ></v-date-picker>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-1">
                          <div class="select1_wrapper">
                              <label>Adult:</label>
                              <div class="select1_inner">
                                  <select
                                      class="
                                          select2
                                          select
                                          select3
                                      "
                                      style="width: 100%"
                                      data-value="{{ request('adult') }}"
                                      name="adult"
                                  >
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-1">
                          <div class="select1_wrapper">
                              <label>Child:</label>
                              <div class="select1_inner">
                                  <select
                                      class="
                                          select2
                                          select
                                          select3
                                      "
                                      style="width: 100%"
                                      data-value="{{ request('child') }}"
                                      name="child"
                                  >
                                    <option value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="button1_wrapper">
                              <button
                                  type="submit"
                                  class="
                                      btn-default
                                      btn-form1-submit
                                  "
                              >
                                  Search
                              </button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<x-errors></x-errors>