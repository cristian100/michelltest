<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <title>Home Page</title>
</head>

<body>

  <nav class="navbar sticky-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Phone Numbers!</a>

  </nav>


  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h1>
          Phone numbers list
        </h1>
      </div>
    </div>

    <br>

    <div id="notification" class="row">
      <div class="col-md-12">
      </div>
    </div>

    <br>

    <div class="row">
      <div class="col-md-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Create new Person
        </button>

      </div>

    </div>

    <br>

    <div class="row">
      <div class="col-md-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalLada">
          Create new LADA
        </button>
      </div>
    </div>

    <br>

    <form id="searchForm">

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="search">Serach</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Please type something...">
            <small> Press enter after typing </small>
            <br>
            <small> Press Esc after typing for refresh table </small>

          </div>

        </div>

        <div class="col-md-4">
          <div class="form-group">

            <label for="">Filter:</label>
            <br>
            <!-- <select class="form-control" name="filtro" id="filtro">
              <option value="first_name">Name</option>
              <option value="last_name">Last Name</option>
              <option value="phone_number">Phone Number</option>
            </select> -->

            <input type="checkbox" id="filter_first_name" name="first_name" value="first_name" checked> First Name <br>
            <input type="checkbox" id="filter_last_name" name="last_name" value="last_name"> Last Name <br>
            <input type="checkbox" id="filter_phone_number" name="phone_number" value="phone_number"> Phone Number <br>
            <input type="checkbox" id="filter_city" name="city" value="city"> City <br>
            <input type="checkbox" id="filter_lada" name="lada" value="lada"> Lada <br>
            <input type="checkbox" id="filter_state" name="state" value="state"> State <br>
            <input type="checkbox" id="filter_company" name="company" value="company"> Company<br>

          </div>
        </div>
      </div>

    </form>

    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-responsive">
          <tr>
            <th>
              id
            </th>

            <th>
              First Name
            </th>

            <th> Last Name </th>

            <th>
              State
            </th>

            <th>
              City
            </th>

            <th> Phone number</th>
            <th> Company</th>
            <th> Lada</th>
            <th> Activation Date</th>

            <th> Actions </th>
          </tr>


          <tbody id="bodyData">

          </tbody>

        </table>
      </div>
    </div>

    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Creating new person</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <form id="newPersonForm">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Write your name please...">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Write your last name please...">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Lada</label>

                    <select class="form-control" id="ladas" name="lada_id" id="lada_id">
                    </select>

                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Activation date</label>

                    <input type="date" name="activation_date" id="activation_date" class="form-control" placeholder="Write your company...">


                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Company</label>
                    <input type="text" name="company" id="company" class="form-control" placeholder="Write your company...">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Write your phone please...">
                  </div>
                </div>

              </div>

              <div id="empty-alert">

              </div>


              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </div>
            </form>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          </div>

        </div>
      </div>
    </div>


    <div class="modal" id="myModalLada">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title">Creating new LADA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <form id="newLadaForm">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">LADA</label>
                    <input type="text" name="lada" id="pop_lada" class="form-control" placeholder="Write your name please...">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">City</label>
                    <input type="text" name="city" id="pop_city" class="form-control" placeholder="Write your last name please...">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">State</label>
                    <input type="text" name="state" id="pop_state" class="form-control" placeholder="Write your last name please...">
                  </div>
                </div>

              </div>


              <div id="empty-alert-lada">

              </div>


              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </div>
            </form>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
          </div>

        </div>
      </div>
    </div>

  </div>




  <!-- SCRIPTS -->


  <!-- CDN -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Control Scripts -->
  <script src="assets/phoneNumbers.js"> </script>
</body>

</html>