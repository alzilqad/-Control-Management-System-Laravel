<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>CRM Spot</title>
        <meta content="" name="descriptison" />
        <meta content="" name="keywords" />

        <link href="{{ asset('img/favicon.png') }}" rel="icon" />
        <link
            href="{{ asset('img/apple-touch-icon.png') }}"
            rel="apple-touch-icon"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />
        <link
            href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('/vendor/icofont/icofont.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('vendor/remixicon/remixicon.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('vendor/venobox/venobox.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{
                asset('vendor/owl.carousel/assets/owl.carousel.min.css')
            }}"
            rel="stylesheet"
        />
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"
        />

        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
            type="text/css"
            rel="stylesheet"
        />
        <link
            href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
            rel="stylesheet"
            id="bootstrap-css"
        />
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body onload="clientBodyLoader();">
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="/home">CRM Spot</a></h1>

                <!-- <form
        method="post"
        class="input-group mr-auto md-form form-sm form-1 pl-0"
        style="width: 40%"
      >
        <input
          class="form-control my-0 py-1"
          name="searchInput"
          type="text"
          placeholder="...search company"
          aria-label="Search"
        />
        <input
          class="btn btn-primary"
          type="submit"
          name="search"
          value="Search"
        />
      </form> -->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="/client">Dashboard</a></li>
                        <li><a href="/companylist">Company</a></li>
                        <li><a href="/proposallist">Proposal</a></li>
                        <li><a href="/servicelist">Service History</a></li>
                        <li><a href="/client/profile">Profile</a></li>
                        <li><a href="/chat">Chat</a></li>
                        <li><a href="/logout">Sign Out</a></li>
                    </ul>
                </nav>
                <!-- .nav-menu -->

                <a href="/registration" class="get-started-btn scrollto"
                    >Get Started</a
                >
            </div>
        </header>
        <!-- End Header -->
    </body>

    <main id="main">
        <section>
            <div class="row mt-4 justify-content-center">
                <div class="col col-xl-8 border rounded border-primary">
                    <div class="border-bottom text-center">
                        <label class="mt-4" for=""
                            ><h2><b><%=company_name%></b></h2></label
                        ><br />
                        <label class="mt-2" for=""
                            >Phone: <%=company_contact%></label
                        ><br />
                    </div>
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                <div class="col col-2">
                    <button class="active btn btn-primary btn-block">
                        <a href="/companylist/<%=id%>"
                            ><span class="text-light">Details</span></a
                        ></button
                    ><br />
                </div>
                <div class="col col-2">
                    <button class="btn btn-secondary btn-block">
                        <a href="/companylist/<%=id%>/services"
                            ><span class="text-light">Services</span></a
                        ></button
                    ><br />
                </div>
                <div class="col col-2">
                    <button class="btn btn-info btn-block">
                        <a href="/companylist/<%=id%>/proposals"
                            ><span class="text-light">Proposals</span></a
                        ></button
                    ><br />
                </div>
                <div class="col col-2">
                    <button class="btn btn-dark btn-block">
                        <a href="/companylist/<%=id%>/chat"
                            ><span class="text-light">Chat</span></a
                        ></button
                    ><br />
                </div>
            </div>

            <div class="row mt-4 justify-content-center">
                <div class="col col-xl-9">
                    <section id="proposals-section">
                        <div class="row m-0 p-0">
                            <div class="col-6 bg-primary mb-3 pt-3">
                                <h5 class="text-light">Proposals</h5>
                            </div>
                            <div class="col-6 text-right bg-primary mb-3 pt-3">
                                <button
                                    type="button"
                                    class="btn btn-success mb-3"
                                    data-toggle="modal"
                                    data-target="#add-proposal-modal"
                                >
                                    Create a New Proposal
                                </button>

                                <!-- Modal -->
                                <div
                                    class="modal text-left fade"
                                    id="add-proposal-modal"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true"
                                >
                                    <form method="post">
                                        <div
                                            class="modal-dialog"
                                            role="document"
                                        >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5
                                                        class="modal-title"
                                                        id="exampleModalLabel"
                                                    >
                                                        Add New Proposal
                                                    </h5>
                                                    <button
                                                        type="button"
                                                        class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                    >
                                                        <span aria-hidden="true"
                                                            >&times;</span
                                                        >
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="title"
                                                                placeholder="Title"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="subject"
                                                                placeholder="Subject"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="body"
                                                                placeholder="Body"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="customer_name"
                                                                placeholder="Customer"
                                                            /><br />
                                                            <td>
                                                                Starting Date
                                                            </td>
                                                            <input
                                                                class="form-control"
                                                                type="date"
                                                                name="starting_date"
                                                                placeholder="Date"
                                                            /><br />
                                                            <td>
                                                                Deadline Date
                                                            </td>
                                                            <input
                                                                class="form-control"
                                                                type="date"
                                                                name="deadline_date"
                                                                placeholder="Deadline Date"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="address"
                                                                placeholder="Address"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="city"
                                                                placeholder="City"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="state"
                                                                placeholder="State"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="country"
                                                                placeholder="Country"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="zip_code"
                                                                placeholder="Zip Code"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="email"
                                                                placeholder="Email"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="phone"
                                                                placeholder="Phone"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="item"
                                                                placeholder="Select Item"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="quantity"
                                                                placeholder="Quantity"
                                                            /><br />
                                                            <input
                                                                class="form-control"
                                                                type="text"
                                                                name="rate"
                                                                placeholder="Price Rate Pcs"
                                                            /><br />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-warning"
                                                        data-dismiss="modal"
                                                    >
                                                        Cancel
                                                    </button>
                                                    <input
                                                        type="submit"
                                                        class="btn btn-success"
                                                        name="submit"
                                                        value="Save Changes"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12">
                                <table
                                    id="proposalsTable"
                                    class="table table-striped table-bordered"
                                    style="width: 100%"
                                >
                                    <% if(error!="" && error!=null) {%>

                                    <a style="color: red"><%=error[0].msg%></a>

                                    <% } %>
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Proposed By</th>
                                            <th>Proposed Date</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <% proposal.forEach( function(std){ %>
                                        <tr>
                                            <td>
                                                <a
                                                    href="#"
                                                    data-toggle="modal"
                                                    data-target="#editModal"
                                                    ><%=std.title%></a
                                                >
                                            </td>
                                            <td><%=std.posted_by%></td>
                                            <td>
                                                <%=
                                                std.starting_date.getDate()+"/"+(std.starting_date.getMonth()+1)+"/"+std.starting_date.getFullYear();%>
                                            </td>
                                            <td>
                                                <%=
                                                std.deadline_date.getDate()+"/"+(std.deadline_date.getMonth()+1)+"/"+std.deadline_date.getFullYear();%>
                                            </td>
                                            <td><%=std.status%></td>

                                            <div
                                                class="modal text-left fade"
                                                id="editModal"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="exampleModalLabel"
                                                aria-hidden="true"
                                            >
                                                <div
                                                    class="modal-dialog"
                                                    role="document"
                                                >
                                                    <div class="modal-content">
                                                        <div
                                                            class="modal-header"
                                                        >
                                                            <h5
                                                                class="modal-title"
                                                                id="exampleModalLabel"
                                                            >
                                                                Add New Proposal
                                                            </h5>
                                                            <button
                                                                type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                                aria-label="Close"
                                                            >
                                                                <span
                                                                    aria-hidden="true"
                                                                    >&times;</span
                                                                >
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div
                                                                    class="col"
                                                                >
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="title"
                                                                        placeholder="Title"
                                                                        value="<%=std.title%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="subject"
                                                                        placeholder="Subject"
                                                                        value="<%=std.subject%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="body"
                                                                        placeholder="Body"
                                                                        value="<%=std.body%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="customer_name"
                                                                        placeholder="Customer"
                                                                        value="<%=std.customer_name%>"
                                                                    /><br />
                                                                    Starting
                                                                    Date:<br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="date"
                                                                        name="starting_date"
                                                                        placeholder="Date"
                                                                        value="<%= std.starting_date.getFullYear()+'-'+(std.starting_date.getMonth() < 10 ? '0' : '')+(std.starting_date.getMonth()+1)+'-'+(std.starting_date.getDate() < 10 ? '0' : '')+std.starting_date.getDate()%>"
                                                                    /><br />
                                                                    Deadline
                                                                    Date:<br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="date"
                                                                        name="deadline_date"
                                                                        placeholder="Deadline Date"
                                                                        value="<%= std.deadline_date.getFullYear()+'-'+(std.deadline_date.getMonth() < 10 ? '0' : '')+(std.deadline_date.getMonth()+1)+'-'+(std.deadline_date.getDate() < 10 ? '0' : '')+std.deadline_date.getDate()%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="address"
                                                                        placeholder="Address"
                                                                        value="<%=std.address%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="city"
                                                                        placeholder="City"
                                                                        value="<%=std.city%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="state"
                                                                        placeholder="State"
                                                                        value="<%=std.state%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="country"
                                                                        placeholder="Country"
                                                                        value="<%=std.country%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="zip_code"
                                                                        placeholder="Zip Code"
                                                                        value="<%=std.zip_code%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="email"
                                                                        placeholder="Email"
                                                                        value="<%=std.email%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="phone"
                                                                        placeholder="Phone"
                                                                        value="<%=std.phone%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="item"
                                                                        placeholder="Select Item"
                                                                        value="<%=std.item%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="quantity"
                                                                        placeholder="Quantity"
                                                                        value="<%=std.quantity%>"
                                                                    /><br />
                                                                    <input
                                                                        class="form-control"
                                                                        type="text"
                                                                        name="rate"
                                                                        placeholder="Price Rate Pcs"
                                                                        value="<%=std.rate%>"
                                                                    /><br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="modal-footer"
                                                        >
                                                            <button
                                                                type="button"
                                                                class="btn btn-warning"
                                                                data-dismiss="modal"
                                                            >
                                                                Cancel
                                                            </button>
                                                            <button
                                                                type="button"
                                                                class="btn btn-success"
                                                            >
                                                                Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td class="text-center">
                                                <%
                                                if(std.posted_by==std.username)
                                                {%> <%
                                                if(std.status.toLowerCase()=="active")
                                                {%>
                                                <form
                                                    action="/companylist/<%=std.company_id%>/proposals/optup/<%=std.id%>"
                                                    method="post"
                                                >
                                                    <button
                                                        class="btn btn-danger"
                                                    >
                                                        Opt Up
                                                    </button>
                                                </form>
                                                <%}} else
                                                if(std.status.toLowerCase()=="inactive")
                                                {%>
                                                <form
                                                    action="/companylist/<%=std.company_id%>/proposals/approve/<%=std.id%>"
                                                    method="post"
                                                >
                                                    <button
                                                        class="btn btn-danger"
                                                    >
                                                        Approve
                                                    </button>
                                                </form>
                                                <%}%>
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

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>CRM Spot</span></strong
                    >. All Rights Reserved
                </div>
                <div class="credits">Designed by <a href="#">APWT G7</a></div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"
                    ><i class="bx bxl-instagram"></i
                ></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{
            asset('vendor/bootstrap/js/bootstrap.bundle.min.js')
        }}"></script>
    <script src="{{
            asset('vendor/jquery.easing/jquery.easing.min.js')
        }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{
            asset('vendor/waypoints/jquery.waypoints.min.js')
        }}"></script>
    <script src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{
            asset('vendor/owl.carousel/owl.carousel.min.js')
        }}"></script>
    <script src="{{
            asset('vendor/isotope-layout/isotope.pkgd.min.js')
        }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/clientProfile.js') }}"></script>

    <script>
        function printFile(a, e) {
            var restorePage = document.body.innerHTML;
            document.getElementById(a).style.display = "none";
            var printContent = document.getElementById(e);
            window.print();
            document.getElementById(a).style.display = "block";
            document.body.innerHTML = restorePage;
        }
    </script>

    <script>
        $(document).ready(function () {
            $("#companyTable").DataTable();
            $("#servicesTable").DataTable();
            $("#appointmentsTable").DataTable();
            $("#notesTable").DataTable();
            $("#proposalsTable").DataTable();
        });
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
    </script>

    <!-- <script>
$(document).ready(function(){
setInterval(function(){
$("#messaging").load('messaging')
}, 2000);
});
</script> -->

    <script>
        const goBtn = document.getElementById("btn1");
        goBtn.addEventListener("click", (e) => {
            e.preventDefault();

            let text1 = document.getElementById("text1").value;

            $.ajax({
                type: "POST",
                url: window.location.pathname,
                contentType: "application/json",
                data: JSON.stringify({
                    text: text1,
                }),
                success: (data) => {
                    document.getElementById("loaddiv").innerHTML = data;
                },
            });
        });
    </script>
</html>
