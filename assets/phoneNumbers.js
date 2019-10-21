$('#newPersonForm').on('submit', function (e) {

  e.preventDefault();

  $data = $('#newPersonForm').serializeArray();

  $data.push({
    name: 'method',
    value: 'create'
  });

  $.ajax({
    url: 'api/People.php',
    method: 'POST',
    data: $data,
    success: function (result) {
      refreshAndNotificate();
      $('#myModal').modal('hide');

    }
  });
});

function getLadas() {

  $.ajax({
    url: 'api/Ladas.php',
    method: 'GET',
    success: function (result) {
      
      result.forEach(e => {
        $('#ladas').append(`
          <option value="${e.id}"> ${e.state} - ${e.city}: ${e.lada} </option>
        `);

      });
      
    }
  })
}

function getPeople() {

  $.ajax({
    url: 'api/People.php',
    method: 'GET',
    success: function (result) {

      result.forEach(e => {
        $('#bodyData').append(`
          <tr>
          <td> ${e.id} </td>
          <td> ${e.first_name} </td>
          <td> ${e.last_name} </td>
          <td> ${e.state} </td>
          <td> ${e.city} </td>
          <td> ${e.phone_number} </td>
          <td> ${e.company} </td>
          <td> ${e.lada} </td>
          <td> <button class="btn btn-danger" onclick="deletePerson(${e.id})"> <i class="fa fa-trash"> </i> </button>  </td>
          </tr>
        `);

      })

    }
  })

}


function deletePerson(id) {
  $.ajax({
    url: 'api/People.php',
    data: {
      id: id,
      method: 'delete'
    },
    method: 'POST',
    success: function (result) {

      refreshAndNotificate();
    }
  })
}

function refreshAndNotificate() {
  $('#notification').append(`
      
      <div class="alert alert-success col-md-12" role="alert">
        Success!
      </div>

      `);

  $('#bodyData').empty();
  getPeople();

  setTimeout(e => {
    $('#notification').empty();
  }, 2000);
}

getPeople();

getLadas();