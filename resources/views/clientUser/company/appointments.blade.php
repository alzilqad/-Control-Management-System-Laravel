@include('clientUser.header')

<main id="main">
  <section>
    @include('clientUser.company.main')

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
                @csrf
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
                        <input type="submit" name="submit" class="btn btn-success" value="Create Appointment" />
                      </div>
                    </div>
                  </div>
                </div>
              </form>

            </div>

            <div class="col-12">
              <table id="appointmentsTable" class="table table-striped table-bordered" style="width: 100%">

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
                @foreach ($appointments as $appointment)
                  <tr>
                    <td><a href="#" data-toggle="modal" data-target="#editModal">{{$appointment->title}}</a></td>
                    <td>{{$appointment->posted_by}}</td>
                    <td>
                      {{$appointment->creation_date}}
                    </td>
                    <td>
                      {{$appointment->appointment_date}}
                      
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
                                    <input class="form-control" type="date" name="date" placeholder="Date" value="{{$appointment->appointment_date}}" /><br />
                                    <input class="form-control" type="text" name="title" placeholder="Title" value="{{$appointment->title}}" /><br />
                                    <input class="form-control" type="text" name="body" placeholder="Body" value="{{$appointment->body}}"></input><br />
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

                      @if($appointment->posted_by==$appointment->username || $appointment->posted_by==$appointment->full_name)
                      <form action="/client/company/<%=id%>/notes/delete/<%=std.id%>" method="post">
                      @csrf
                        <button class="btn btn-success text-light">Edit</button>
                      </form>
                      <a href="{{ route('company.appointment.delete', ['id'=> Session::get('company_id'), 'id2' => $appointment->id]) }}" method="get">
                        <button class="btn btn-danger text-light">Delete</button>
                      </a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
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