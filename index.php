<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

  <title>Main Page here!</title>
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
      <div class="col-md-6">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Create new Person
        </button>

      </div>
    </div>

    <br>

    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
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
                    <label for="">Company</label>
                    <input type="text" name="company" id="company" class="form-control" placeholder="Write your company...">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Write your phone please...">
                  </div>
                </div>

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