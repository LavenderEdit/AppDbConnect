let tableNameAdded = false;

export function addTableName() {
  const container = document.getElementById("table-name-container");
  let input = document.getElementById("tableNameInput");

  if (!tableNameAdded) {
    if (!input) {
      input = document.createElement("input");
      input.type = "text";
      input.name = "table_name";
      input.id = "tableNameInput";
      input.classList.add("form-control", "mb-3");
      input.placeholder = "Ingrese el nombre de la tabla";
      container.appendChild(input);
    }
    tableNameAdded = true;
  } else {
    input.remove();
    tableNameAdded = false;
  }
}

export function addInput() {
  const container = document.getElementById("fields");

  const fieldWrapper = document.createElement("div");
  fieldWrapper.classList.add("mb-3", "row", "align-items-center");

  const nameDiv = document.createElement("div");
  nameDiv.classList.add("col-sm-4");
  const nameInput = document.createElement("input");
  nameInput.type = "text";
  nameInput.name = "campo_nombre[]";
  nameInput.classList.add("form-control");
  nameInput.placeholder = "Nombre del campo";
  nameInput.required = true;
  nameDiv.appendChild(nameInput);

  const valueDiv = document.createElement("div");
  valueDiv.classList.add("col-sm-4");
  const valueInput = document.createElement("input");
  valueInput.type = "text";
  valueInput.name = "campo_valor[]";
  valueInput.classList.add("form-control");
  valueInput.placeholder = "Valor/Texto";
  valueInput.required = true;
  valueDiv.appendChild(valueInput);

  const typeDiv = document.createElement("div");
  typeDiv.classList.add("col-sm-3");
  const typeSelect = document.createElement("select");
  typeSelect.name = "campo_tipo[]";
  typeSelect.classList.add("form-select");

  const options = ["varchar", "blob", "int", "file"];
  options.forEach((option) => {
    const opt = document.createElement("option");
    opt.value = option;
    opt.textContent = option;
    typeSelect.appendChild(opt);
  });

  typeSelect.addEventListener("change", function () {
    if (this.value === "file") {
      valueInput.type = "file";
      valueInput.value = ""; //CAMBIO
      valueInput.placeholder = "Seleccione archivo";
    } else {
      valueInput.type = "text";
      valueInput.placeholder = "Valor/Texto";
    }
  });

  typeDiv.appendChild(typeSelect);

  fieldWrapper.appendChild(nameDiv);
  fieldWrapper.appendChild(valueDiv);
  fieldWrapper.appendChild(typeDiv);

  container.appendChild(fieldWrapper);
}

export function enableValidation() {
  var forms = document.querySelectorAll(".needs-validation");

  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
}
