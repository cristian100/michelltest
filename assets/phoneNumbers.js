/**
 * Evento ejecutado al registrar una nueva persona en el formulario
 * #newPersonForm
 */
$('#newPersonForm').on('submit', function (e) {

  e.preventDefault();

  $first_name = $('#first_name').val();
  $last_name = $('#last_name').val();
  $company = $('#company').val();
  $phone_number = $('#phone_number').val();


  if (!$first_name || !$last_name || !$company || !$phone_number) {

    $('#empty-alert').append(`

    <p style="color: red;"> * Debe llenar todos los campos</p>

    `);

    setTimeout(e => {
      $('#empty-alert').empty();
    }, 2000);


  } else {

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
        $('#newPersonForm').trigger('reset');
        $('#myModal').modal('hide');

      }
    });

  }

});



/**
 * Evento para crear una nueva lada
 */
$('#newLadaForm').on('submit', function (e) {

  e.preventDefault();

  $lada = $('#pop_lada').val();
  $city = $('#pop_city').val();
  $state = $('#pop_state').val();


  if (!$lada || !$city || !$state) {

    $('#empty-alert-lada').append(`

    <p style="color: red;"> * Debe llenar todos los campos</p>

    `);

    setTimeout(e => {
      $('#empty-alert-lada').empty();
    }, 2000);


  } else {

    $data = $('#newLadaForm').serializeArray();

    $.ajax({
      url: 'api/Ladas.php',
      method: 'POST',
      data: $data,
      success: function (result) {
        $('#ladas').empty();
        getLadas();
        refreshAndNotificate();
        $('#newLadaForm').trigger('reset');
        $('#myModalLada').modal('hide');

      }
    });

  }

});

/**
 * Evento realizado al presionar escape para poder refrescar la
 * tabla de las personas
 */
$('#search').on('keyup', function (key) {

  if (key.code === 'Escape') {
    $('#search').val('');
    $('#bodyData').empty();
    getPeople();

  }
});

/**
 * Evento realizado al hacer submit en el input de busqueda #search
 */
$('#searchForm').on('submit', function (e) {
  e.preventDefault();


  $.ajax({
    url: 'api/People.php',
    method: 'POST',
    data: {
      search: $('#search').val(),
      method: 'search',
      first_name: $('#filter_first_name').is(":checked") ? $('#filter_first_name').val() : '',
      last_name: $('#filter_last_name').is(":checked") ? $('#filter_last_name').val() : '',
      phone_number: $('#filter_phone_number').is(":checked") ? $('#filter_phone_number').val() : '',
      city: $('#filter_city').is(":checked") ? $('#filter_city').val() : '',
      lada: $('#filter_lada').is(":checked") ? $('#filter_lada').val() : '',
      state: $('#filter_state').is(":checked") ? $('#filter_state').val() : '',
      company: $('#filter_company').is(":checked") ? $('#filter_company').val() : ''
    },
    success: function (result) {
      $('#bodyData').empty();

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
          <td> ${e.activation_date} </td>
          <td> <button class="btn btn-danger" onclick="deletePerson(${e.id})"> <i class="fa fa-trash"> </i> </button>  </td>
          </tr>
        `);

      });
    }
  });
});

/**
 * Se obtienen las ladas para poder mostrarlas en el
 * combobox de nueva persona
 */
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

/**
 * Functión para hacer petición y mostrar la tabla de personas
 */
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
          <td> ${e.activation_date} </td>
          <td> <button class="btn btn-danger" onclick="deletePerson(${e.id})"> <i class="fa fa-trash"> </i> </button>  </td>
          </tr>
        `);

      });

    }
  })

}


/**
 * Función para realizar la petición para eliminar un registro
 * @param {*} id del registro a eliminar
 */
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

/**
 * Refresca la notificación al momento de realizar una acción de eliminar o crear correctamente 
 */
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

/**
 * Llamado a funcionees para obtener los datos al cargar la pagina
 */
getPeople();
getLadas();