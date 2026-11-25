const formulario = document.getElementById('formulario');
const hombre = document.getElementById('hombre');
const borrar = document.getElementById('borrar');
const registrar = document.getElementById('registrar');

if(formulario.sexo.value == ''){
    hombre.checked = true;
}

// Abreviar lo que se pueda

registrar.addEventListener('click', () => {
    let dia = parseInt(formulario.dia.value);
    let mes = parseInt(formulario.mes.value);
    let anio = parseInt(formulario.anio.value);

    if(formulario.nombre.value == '' || !isNaN(formulario.nombre.value)){
        alert('El nombre está vacío o no es un nombre');
        formulario.nombre.focus();

    }else if(formulario.apellidos.value == '' || !isNaN(formulario.apellidos.value)){
        alert('Los apellidos están vacíos o no son apellidos');
        formulario.apellidos.focus();

    }else if(formulario.email.value == '' || !formulario.email.value.includes('@') || formulario.email.value.startsWith('@')){
        alert('El correo está vacío o tiene un formato incorrecto (debe contener @ y no empezar por @)');
        formulario.email.focus();

    }else if(formulario.paginaWeb.value != '' && (!formulario.paginaWeb.value.startsWith('http://') || !formulario.paginaWeb.value.includes('.'))){
        alert('La página web no tiene el formato correcto (empezra por: http://)');
        formulario.paginaWeb.focus();

    }else if(formulario.edad.value != '' && (isNaN(formulario.edad.value) || formulario.edad.value < 1 || !Number.isInteger(Number(formulario.edad.value)))){
        alert('La edad está en un formato inválido');
        formulario.edad.focus();

    }else if((formulario.dia.value != '' || formulario.mes.value != '0' || formulario.anio.value != '') &&
    (formulario.dia.value == '' || formulario.mes.value == '0' || formulario.anio.value == '')){
        alert('Debes introducir la fecha completa');
        formulario.dia.focus();

    }else if(formulario.dia.value != '' && (isNaN(dia) || dia < 1 || dia > 31)){
        alert('El día tiene un formato incorrecto');
        formulario.dia.focus();

    }else if(formulario.mes.value != '0' && (isNaN(mes) || mes < 1 || mes > 12)){
        alert('El mes tiene un formato incorrecto');
        formulario.mes.focus();

    }else if(formulario.anio.value != '' && (isNaN(anio) || anio < 1910 || anio > 2026)){
        alert('El año tiene un formato incorrecto');
        formulario.anio.focus();

    }else if(formulario.dia.value != '' && formulario.mes.value != '0' && formulario.anio.value != '' &&
        ((mes == 2 && dia > 29) || ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia > 30))){
        alert('El día no es válido para el mes seleccionado');
        formulario.dia.focus();

    }else if(formulario.dia.value != '' && formulario.mes.value != '0' && formulario.anio.value != '' && mes == 2 && dia == 29 &&
        !(anio % 400 == 0 || (anio % 4 == 0 && anio % 100 != 0))){
        alert('El día no es válido para el año seleccionado (bisiesto)');
        formulario.dia.focus();

    }else if(formulario.nomUs.value == ''){
        alert('El nombre de usuario está vacío');
        formulario.nomUs.focus();

    }else if(formulario.clave1.value == ''){
        alert('La clave 1 está vacía');
        formulario.clave1.focus();

    }else if(formulario.clave2.value == ''){
        alert('La clave 2 está vacía');
        formulario.clave2.focus();

    }else if(formulario.clave1.value != formulario.clave2.value){
        alert('Las claves no coinciden');
        formulario.clave2.focus();

    }else{
        alert('Datos introducidos correctamente');
        formulario.submit();
    }
});

borrar.addEventListener('click', () => {
    formulario.reset();
});