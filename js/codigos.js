function generarCodigo1() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let codigo = "";
    for (let i = 0; i < 6; i++) {
      codigo += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo;
  }
  
  function generarCodigo2() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let codigo1 = "";
    for (let i = 0; i < 6; i++) {
      codigo1 += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo1;
  }

  function generarCodigo3() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let codigo2 = "";
    for (let i = 0; i < 6; i++) {
      codigo2 += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo2;
  }

  function generarCodigo4() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let codigo3 = "";
    for (let i = 0; i < 6; i++) {
      codigo3 += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo3;
  }
  
  function generarCodigo5() {
    let caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let codigo4 = "";
    for (let i = 0; i < 6; i++) {
      codigo4 += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return codigo4;
  }