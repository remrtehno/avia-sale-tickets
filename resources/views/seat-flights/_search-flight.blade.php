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
                                  <select
                                    name="from"
                                      class="
                                          select2
                                          select
                                      "
                                      style="width: 100%"
                                  >
                                      <option value="1" checked>
                                          City or Airport
                                      </option>
                                      <option value="2">
                                          Alaska
                                      </option>
                                      <option value="3">
                                          Bahamas
                                      </option>
                                      <option value="4">
                                          Bermuda
                                      </option>
                                      <option value="5">
                                          Canada
                                      </option>
                                      <option value="6">
                                          Caribbean
                                      </option>
                                      <option value="7">
                                          Europe
                                      </option>
                                      <option value="8">
                                          Hawaii
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="select1_wrapper">
                              <label>To:</label>
                              <div class="select1_inner">
                                  <select
                                  name="to"
                                      class="
                                          select2
                                          select
                                      "
                                      style="width: 100%"
                                  >
                                      <option value="1">
                                          City or Airport
                                      </option>
                                      <option value="2">
                                          Alaska
                                      </option>
                                      <option value="3">
                                          Bahamas
                                      </option>
                                      <option value="4">
                                          Bermuda
                                      </option>
                                      <option value="5">
                                          Canada
                                      </option>
                                      <option value="6">
                                          Caribbean
                                      </option>
                                      <option value="7">
                                          Europe
                                      </option>
                                      <option value="8">
                                          Hawaii
                                      </option>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="input1_wrapper">
                              <label>Departing:</label>
                              <div class="input1_inner">
                                  <input
                                      name="departing"
                                      type="text"
                                      class="
                                          input
                                          datepicker
                                      "
                                      placeholder="Mm/Dd/Yy"
                                  />
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-2">
                          <div class="input1_wrapper">
                              <label>Returning:</label>
                              <div class="input1_inner">
                                  <input
                                    name="returning"
                                      type="text"
                                      class="
                                          input
                                          datepicker
                                      "
                                      placeholder="Mm/Dd/Yy"
                                  />
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-4 col-md-1">
                          <div class="select1_wrapper">
                              <label>Adult:</label>
                              <div class="select1_inner">
                                  <select
                                      name="adult"
                                      class="
                                          select2
                                          select
                                          select3
                                      "
                                      style="width: 100%"
                                  >
                                      <option value="1">
                                          1
                                      </option>
                                      <option value="2">
                                          2
                                      </option>
                                      <option value="3">
                                          3
                                      </option>
                                      <option value="4">
                                          4
                                      </option>
                                      <option value="5">
                                          5
                                      </option>
                                      <option value="6">
                                          6
                                      </option>
                                      <option value="7">
                                          7
                                      </option>
                                      <option value="8">
                                          8
                                      </option>
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
                                  >
                                        <option value="0">
                                        0
                                        </option>
                                      <option value="1">
                                          1
                                      </option>
                                      <option value="2">
                                          2
                                      </option>
                                      <option value="3">
                                          3
                                      </option>
                                      <option value="4">
                                          4
                                      </option>
                                      <option value="5">
                                          5
                                      </option>
                                      <option value="6">
                                          6
                                      </option>
                                      <option value="7">
                                          7
                                      </option>
                                      <option value="8">
                                          8
                                      </option>
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