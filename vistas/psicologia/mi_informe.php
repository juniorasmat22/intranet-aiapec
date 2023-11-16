<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="?c=psicologia">Psicología</a></li>
                    <li class="breadcrumb-item active">Informes</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php $mi_informe=$respuesta->resultado;
$tipo = ($mi_informe->tipoInforme=='1') ? 'Informe Psicológico' : 'Informe de Orientación Vocacional' ;
?>
<div class="card">
    <div class="card-body">
        <h4 class="header-title"><?php echo $tipo?></h4>
        <p class="text-muted font-14 mb-3">
         Estimado(a) <?php echo $_SESSION['name'] ?> a continuación te presentamos tu informe para que lo revises a detalle.
        </p>
        <div class="row">
           <!-- Utilizando la función de visualización de documentos de Office Online para SharePoint -->
           <div id="pdfViewer" style="width: 100%; height: 800px;" sandbox="allow-scripts allow-same-origin" data-mi-url="http://localhost/intranet-administrativa/<?php echo $mi_informe->urlInforme ?>"></div>

        </div> <!-- end row-->
    </div>
</div>
