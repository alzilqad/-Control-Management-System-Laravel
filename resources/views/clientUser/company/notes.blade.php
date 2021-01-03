@include('clientUser.header')

<main id="main">
  <section>
    @include('clientUser.company.main')

    <div class="row mt-4 justify-content-center">
      <div class="col col-xl-9">
        <section id="notes-section">
          <div class="row m-0 p-0">
            <div class="col-6 bg-primary mb-3 pt-3">
              <h5 class="text-light">Notes</h5>
            </div>
            <div class="col-6 text-right bg-primary mb-3 pt-3">
              <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#add-notes-modal">
                Add a New Note
              </button>

              <!-- Modal -->
              <div class="modal text-left fade" id="add-notes-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="post">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Add New Note
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col">
                            <br>Title:</br>
                            <input class="form-control" type="text" name="title" placeholder="Title" /><br />
                            <br>Body:</br>
                            <input class="form-control" type="text" name="body" placeholder="Body" /><br />
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                          Cancel
                        </button>
                        <input type="submit" class="btn btn-success" name="submit" value="Save Changes" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>



            <div class="col-12">
              <table id="notesTable" class="table table-striped table-bordered" style="width: 100%">
                <% if(error!="" && error!=null) {%>

                <a style="color: red"><%=error[0].msg%></a>

                <% } %>
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Posted Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <% note.forEach( function(std){ %>
                  <tr>
                    <td><a type="button" href="#" data-toggle="modal" data-target="#show-notes-modal"><%=std.title%></a></td>
                    <td><%=std.posted_by%></td>
                    <td>
                      <%=
                        std.creation_date.getDate()+"/"+(std.creation_date.getMonth()+1)+"/"+std.creation_date.getFullYear();%>
                    </td>
                    <td>
                      <form action="/client/company/<%=id%>/appointments/edit/<%=std.id%>" method="post">
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="show-notes-modal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
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
                      <form action="/client/company/<%=id%>/notes/delete/<%=std.id%>" method="post">
                        <button class="btn btn-danger text-light">Delete</button>
                      </form>
                      <% } %>
                    </td>
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