
    // Ruta al archivo PDF
    const pdfPath = document.getElementById("pdfViewer").getAttribute("data-mi-url");
    // "recursos/js/psicologia/FINALISTAS_missYmisster2023.pdf";

    // Opciones de configuración de PDFObject
    const options = {
        pdfOpenParams: {
            navpanes: 0,
            toolbar: 1,
            statusbar: 0,
            view: "FitH",
            pagemode: "thumbs",
            page: 1
        }
    };

    // Carga el visor de PDF con PDFObject
    PDFObject.embed(pdfPath, "#pdfViewer", options);

