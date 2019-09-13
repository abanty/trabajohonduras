/*----------------------------------*
| DECLARACION DE VARIABLES GLOBALES |
.----------------------------------*/
var tabla;
var constraints;

/*---------------*
| FUNCION INICIO |
.---------------*/
function init() {
  $(window).on('load', function() {
    setTimeout(function() {
      $(".loader-page").css({
        visibility: "hidden",
        opacity: "0"
      })
    }, 1000);
  });

  mostrarform(false);

  listar();

  // sumarcampos();

  validate.extend(validate.validators.datetime, {
    parse: function(value, options) {
      return +moment.utc(value);
    }
  });

 /*------------------------------------------------------------------*
 | Estas son las restricciones utilizadas para validar el formulario |
 .------------------------------------------------------------------*/
  constraints = {

    nombre_objeto: {
      // Email is required
      presence: true
    },

    grupo: {
      // Email is required
      presence: true,
      format: {
        pattern: "^(0*[1-9][0-9,]*(\.[0-9,]+)?|0+\.[0-9]*[1-9][0-9,]*)$",
        message: ", No puede ser texto, igual o menor a 0"
      }
    },

    subgrupo: {
      // Email is required
      presence: true,
      format: {
        pattern: "^(0*[1-9][0-9,]*(\.[0-9,]+)?|0+\.[0-9]*[1-9][0-9,]*)$",
        message: ", No puede ser texto, igual o menor a 0"
      }
    },

    codigo: {
      // Email is required
      presence: true
    },
  };

  // Enlace el formulario
  var form = document.querySelector("form#formulario");

  // Validar evento SUBMIT
  form.addEventListener("submit", function(ev) {
    ev.preventDefault();
    handleFormSubmit(form);
  });

// Validar input textare y selects
  var inputs = document.querySelectorAll("input, textarea, select")
  for (var i = 0; i < inputs.length; ++i) {
    inputs.item(i).addEventListener("change", function(ev) {
      // ev.preventDefault();
      var errors = validate(form, constraints) || {};
      showErrorsForInput(this, errors[this.name])
    });
  }


  //Cargamos select selectPresupuesto_anual
  $.post("../ajax/presupuesto_disponible.php?op=selectPresupuesto_anual", function(r) {
    $("#idpresupuesto_anual").html(r);
    $('#idpresupuesto_anual').selectpicker('refresh');
  });

	//Cargamos select selectCodigo
  $.post("../ajax/presupuesto_disponible.php?op=selectCodigo", function(r) {
    $("#codigo").html(r);
    $('#codigo').selectpicker('refresh');
  });

}

/*--------------------------------*
| FUNCION COMPROBAR CAMPOS SUBMIT |
.--------------------------------*/
function handleFormSubmit(form, input) {
  // Validar el formulario contra las restricciones
  var errors = validate(form, constraints);
  // Actualizamos el formulario para reflejar los resultados
  showErrors(form, errors || {});
  if (!errors) {
    showSuccess();
  }
}

/*--------------------------------------------------------*
| FUNCION ACTUALIZA INPUTS CON LAS ERRORES DE VALIDACIÓN. |
.--------------------------------------------------------*/
function showErrors(form, errors) {
  // Recorremos todas las entradas y mostramos los errores para esa entrada
  _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
    // Dado que los errores pueden ser nulos si no se encontraron errores, debemos manejar este metodo
    showErrorsForInput(input, errors && errors[input.name]);
  });
}

/*--------------------------------------------------*
| FUNCION MOSTRAR ERRORES PARA UN INPUT ESPECÍFICO. |
.--------------------------------------------------*/
function showErrorsForInput(input, errors) {
  // Esta es la raíz de la entrada.
  var formGroup = closestParent(input.parentNode, "form-group")
    // Encuentre dónde se insertarán los mensajes de error
    messages = formGroup.querySelector(".messages");
  // Primero eliminamos los mensajes antiguos y restablecemos las clases.
  resetFormGroup(formGroup);
  // Si tenemos errores
  if (errors) {
    // Primero marcamos que el grupo tiene errores
    formGroup.classList.add("has-error");
    // Entonces agregamos todos los errores
    _.each(errors, function(error) {
      addError(messages, error);
    });
  } else {
    // Si no, simplemente lo marcamos como success
    formGroup.classList.add("has-success");
  }
}

/*-------------------------------------------------*
| FUNCION LOCALIZAR PARENT DE LA CLASE ESPECÍFICA. |
.-------------------------------------------------*/
function closestParent(child, className) {
  if (!child || child == document) {
    return null;
  }
  if (child.classList.contains(className)) {
    return child;
  } else {
    return closestParent(child.parentNode, className);
  }
}

/*--------------------------------------*
| FUNCION PARA RESETEAR INPUT VALDADOS. |
.--------------------------------------*/
function resetFormGroup(formGroup) {
  // Eliminar las clases success y error
  formGroup.classList.remove("has-error");
  formGroup.classList.remove("has-success");
  // y eliminar cualquier mensaje antiguo
  _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
    el.parentNode.removeChild(el);
  });
}

/*---------------------------------------*
| FUNCION PARA AGREGAR ERROR A ELEMENTO. |
.---------------------------------------*/
function addError(messages, error) {
  var block = document.createElement("p");
  block.classList.add("help-block");
  block.classList.add("error");
  block.innerText = error;
  messages.appendChild(block);
}

/*--------------------------------------------*
| FUNCION PARA VALIDAR EXITO Y GUARDAR DATOS. |
.--------------------------------------------*/
function showSuccess() {
  guardaryeditar();
  // alert("Success!");
}


/*------------------------------------------*
| FUNCION PARA REALIZAR CALCULOS DE ADICION |
.------------------------------------------*/
function valida_campo_fondos_disponibles() {
      var form = document.querySelector("form#formulario");
      var errors = validate(form, constraints);
        _.each(form.querySelectorAll("#fondos_disponibles"), function(input) {
          // Dado que los errores pueden ser nulos si no se encontraron errores, debemos manejar este metodo
          showErrorsForInput(input, errors && errors[input.name]);
        });

}

/*----------------*
| FUNCION LIMPIAR |
.----------------*/
function limpiar() {
  $("#nombre_objeto").val("");
  $("#grupo").val("");
  $("#subgrupo").val("");
  $("#codigo").val("");
  $("#idpresupuesto_disponible").val("");
}

/*---------------------------------*
| FUNCION LIMPIAR CAMPOS VALIDADOS |
.---------------------------------*/
function limpiar_campos_validados() {
  var form = document.querySelector("form#formulario");
  _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
    var formGroup = closestParent(input.parentNode, "form-group")
    resetFormGroup(formGroup);
  });
}

/*---------------------------*
| FUNCION MOSTRAR FORMULARIO |
.---------------------------*/
function mostrarform(flag) {

	limpiar_campos_validados();
  limpiar();

  if (flag) {
    $("#listadoregistros").hide();
		$(".mytext").show();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled", false);
    $("#btnagregar").hide();
  } else {
		$(".mytext").hide();
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnagregar").show();
  }
}

/*-----------------*
| FUNCION CANCELAR |
.-----------------*/
function cancelarform() {

  limpiar_campos_validados();
  limpiar();
  mostrarform(false);
}

/*---------------*
| FUNCION LISTAR |
.---------------*/
function listar() {
  tabla = $('#tbllistado').dataTable({
    "aProcessing": true, //Activamos el procesamiento del datatables
    "aServerSide": true, //Paginación y filtrado realizados por el servidor
    dom: 'Bfrtip', //Definimos los elementos del control de tabla
    buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdf'
    ],
    "ajax": {
      url: '../ajax/presupuesto_disponible.php?op=listar',
      type: "get",
      dataType: "json",
      error: function(e) {
        console.log(e.responseText);
      }
    },
    "bDestroy": true,
    "iDisplayLength": 10,
    "order": [
      [0, "asc"]
    ] //Ordenar (columna,orden)
  }).DataTable();
}

/*-------------------------*
| FUNCION GUARDAR Y EDITAR |
.-------------------------*/
function guardaryeditar() {
  // e.preventDefault();
  $("#btnGuardar").prop("disabled", true);
  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "../ajax/presupuesto_disponible.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,

    success: function(datos) {
      bootbox.alert(datos);
      mostrarform(false);
      tabla.ajax.reload(null, false);
    }

  });
  limpiar();
}

/*----------------*
| FUNCION MOSTRAR |
.----------------*/
function mostrar(idpresupuesto_disponible) {
  $.post("../ajax/presupuesto_disponible.php?op=mostrar", {
    idpresupuesto_disponible: idpresupuesto_disponible
  }, function(data, status) {
    data = JSON.parse(data);
    mostrarform(true);

    $("#nombre_objeto").val(data.nombre_objeto);
    $("#grupo").val(data.grupo);
    $("#subgrupo").val(data.subgrupo);
    $("#codigo").val(data.codigo);
    $("#idpresupuesto_disponible").val(data.idpresupuesto_disponible);

  })
}


/*----------------------------------*
| FUNCION PARA DESACTIVAR REGISTROS |
.----------------------------------*/
function desactivar(idpresupuesto_disponible) {
  bootbox.confirm("¿Está Seguro de desactivar el Renglon Presupuestario?", function(result) {
    if (result) {
      $.post("../ajax/presupuesto_disponible.php?op=desactivar", {
        idpresupuesto_disponible: idpresupuesto_disponible
      }, function(e) {
        bootbox.alert(e);
        tabla.ajax.reload(null, false);
      });
    }
  })
}

/*-------------------------------*
| FUNCION PARA ACTIVAR REGISTROS |
.-------------------------------*/
function activar(idpresupuesto_disponible) {
  bootbox.confirm("¿Está Seguro de activar el Renglon Presupuestario?", function(result) {
    if (result) {
      $.post("../ajax/presupuesto_disponible.php?op=activar", {
        idpresupuesto_disponible: idpresupuesto_disponible
      }, function(e) {
        bootbox.alert(e);
        tabla.ajax.reload(null, false);
      });
    }
  })
}

init();
