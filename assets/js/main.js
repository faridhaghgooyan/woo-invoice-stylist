const WooInvoiceStylist = {
    id : '#woo-invoice-stylist',
    Print(event){
        const printContent = document.querySelector(this.id).outerHTML;
        const originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    },
    SaveAsPDF(event){
        const element = document.querySelector(this.id);
        // Create a html2pdf instance
        const pdf = html2pdf();

        // Set the options for the PDF
        pdf.set({
            margin: [10, 10],
            filename: 'my-pdf.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });

        // Add the element to the PDF
        pdf.from(element).save();
    }
}