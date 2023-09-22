
  document.addEventListener("DOMContentLoaded", function () {
    var selectTipo = document.getElementById("tipo");
    var tipmSelect = document.getElementById("TIPM");
    var valorInput = document.getElementById("VA");
    var unidadInput = document.getElementById("UME");
    var valorUnitarioInput = document.getElementById("valorUnitarioM");
    var cantidadInput = document.getElementById("cantidadM");
    var valorTotalSpan = document.getElementById("valorTotalM");
    var form=document.getElementById("form-m");
    var formulario = document.getElementById("formT");



      selectTipo.addEventListener("change", function() {
    if (selectTipo.value === "Herramienta") {
      form.style.display="block";
      tipmSelect.disabled=true;
      valorInput.disabled=true;
      unidadInput.disabled=true;
    } else if (selectTipo.value === "Material") {
      form.style.display="block";
      valorInput.disabled=false;
      unidadInput.disabled=false;
      tipmSelect.disabled=false;
    }else if(selectTipo.value === "nada"){
      form.style.display="none";
      formulario.reset();
      valorTotalSpan.textContent=0;
    }
  });

    tipmSelect.addEventListener('change',function(){
      if(tipmSelect.value==="masa"){
        unidadInput.value='kg';
      }else if(tipmSelect.value==="area"){
        unidadInput.value='m2';
      }else if(tipmSelect.value==="volumen"){
        unidadInput.value='L';
      }
    });


      

    cantidadInput.addEventListener("input", function () {
        var valorUnitario = parseFloat(valorUnitarioInput.value);
        var cantidad = parseFloat(cantidadInput.value);
        var numeroInput = document.getElementById("numeroInput");
        var valorTotal = isNaN(valorUnitario) || isNaN(cantidad) ? 0 : valorUnitario * cantidad;
        valorTotalSpan.textContent = valorTotal.toFixed(2);
        numeroInput.value = valorTotal.toFixed(2);
      });

      cantidadInput.value = input.value.replace(/\D/g, ''); // Elimina cualquier carácter que no sea un número
    
    
  });