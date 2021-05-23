document.addEventListener("DOMContentLoaded", () => {

    const $boton = document.querySelector("#btnCrearPdf");
    $boton.addEventListener("click", () => {
        const $elementoParaConvertir = document.getElementById('factura');
        html2pdf()
            .set({
                margin: 1,
                filename: 'miFactura.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 4,
                    letterRendering: true,
                },
                jsPDF: {
                    unit: "cm",
                    format: "a2",
                    orientation: 'portrait'
                }
            })
            .from($elementoParaConvertir)
            .save()
            .catch(err => console.log(err));
    });
});
