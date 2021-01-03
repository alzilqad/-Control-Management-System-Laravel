@include('clientUser.header')

<main id="main">
  <section>
    <div class="row mt-4 justify-content-center">
      <div class="col col-xl-8 border rounded border-primary">
        <div class="border-bottom text-center">
          <label class="mt-4" for="">
            <h2><b><%=company_name%></b></h2>
          </label><br />
          <label class="mt-2" for="">Phone: <%=company_contact%></label><br />
        </div>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="row row-xl-12 justify-content-center">
        <div class="col col-4">
          <button class="active btn btn-primary btn-block">
            <a href="/client/company/<%=id%>"><span class="text-light">Details</span></a></button><br />
        </div>
        <div class="col col-4">
          <button class="btn btn-secondary btn-block">
            <a href="/client/company/<%=id%>/services"><span class="text-light">Services</span></a></button><br />
        </div>
        <div class="col col-4">
          <button class="btn btn-dark btn-block">
            <a href="/client/company/<%=id%>/chat"><span class="text-light">Chat</span></a></button><br />
        </div>
        <div class="col col-4">
          <button class="btn btn-info btn-block">
            <a href="/client/company/<%=id%>/appointments"><span class="text-light">Appoitments</span></a></button><br />
        </div>
        <div class="col col-4">
          <button class="btn btn-warning btn-block">
            <a href="/client/company/<%=id%>/notes"><span class="text-light">Notes</span></a></button><br />
        </div>
        <div class="col col-4">
          <button class="btn btn-danger btn-block">
            <a href="/client/company/<%=id%>/proposals"><span class="text-light">Proposals</span></a></button><br />
        </div>
      </div>
    </div>

    <div class="row mt-4 justify-content-center">
      <div class="col col-xl-9">
        <section id="appointments-section">
          <div class="row m-0 p-0">
            <div class="col-6 bg-primary mb-3 pt-3">
              <h5 class="text-light">Appointments</h5>
            </div>
            <div class="col-6 text-right bg-primary mb-3 pt-3">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#add-appointment-modal">
                Add a New Appointment
              </button>

              <form method="post">
                <!-- Modal -->
                <div class="modal text-left fade" id="add-appointment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Add New Appointment
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col">
                            <input class="form-control" type="date" name="date" placeholder="Date" /><br />
                            <input class="form-control" type="text" name="title" placeholder="Title" /><br />
                            <input class="form-control" type="text" name="body" placeholder="Body"></input><br />
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                          Cancel
                        </button>
                        <input type="submit" name="submit" class="btn btn-success" value="Save Changes" />
                      </div>
                    </div>
                  </div>
                </div>
              </form>

            </div>

            <div class="col-12">
              <table id="appointmentsTable" class="table table-striped table-bordered" style="width: 100%">
                <% if(error!="" && error!=null) {%>

                <a style="color: red"><%=error[0].msg%></a>

                <% } %>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Creation Date</th>
                    <th>Appointment Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <% appointment.forEach( function(std){ %>
                  <tr>
                    <td><a href="#" data-toggle="modal" data-target="#editModal"><%=std.title%></a></td>
                    <td><%=std.posted_by%></td>
                    <td>
                      <%=
                        std.creation_date.getDate()+"/"+(std.creation_date.getMonth()+1)+"/"+std.creation_date.getFullYear();%>
                    </td>
                    <td>
                      <%=
                        std.appointment_date.getDate()+"/"+(std.appointment_date.getMonth()+1)+"/"+std.appointment_date.getFullYear();%>
                    </td>

                    <td class="text-center">

                      <form action="/client/company/<%=id%>/appointments/edit/<%=std.id%>" method="post">
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editLabel">Edit Appointment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col">
                                    <input class="form-control" type="date" name="date" placeholder="Date" value="<%= std.appointment_date.getFullYear()+'-'+(std.appointment_date.getMonth() < 10 ? '0' : '')+(std.appointment_date.getMonth()+1)+'-'+(std.appointment_date.getDate() < 10 ? '0' : '')+std.appointment_date.getDate() %>" /><br />
                                    <input class="form-control" type="text" name="title" placeholder="Title" value="<%=std.title%>" /><br />
                                    <input class="form-control" type="text" name="body" placeholder="Body" value="<%=std.body%>"></input><br />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success" value="Save Changes" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

                      <%if(std.posted_by==std.username || std.posted_by==std.full_name) {%>
                      <form action="/client/company/<%=id%>/appointments/delete/<%=std.id%>" method="post">
                        <button class="btn btn-danger text-light">Delete</button>
                      </form>
                    </td>
                    <% } %>

                  </tr>
                  <% }); %>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</main>

@include('clientUser.footer')