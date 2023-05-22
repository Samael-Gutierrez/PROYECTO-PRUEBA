$(document).ready(()=>{
    let $selectGrupos = $('#select-grupos');
    let $formGrupos = $('#form-grupos');

    $selectGrupos.change(()=>{
        $formGrupos.submit();
    });
});
