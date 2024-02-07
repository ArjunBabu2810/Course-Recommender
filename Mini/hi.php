<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table to PDF</title>
    <!-- Load jsPDF library using script tag -->
    <script src="jspdf.umd.min.js"></script>
    <script src="jspdf.plugin.autotable.js"></script>

    <!-- Your script with the generatePDF function -->
    <script>
        window.jsPDF = window.jspdf.jsPDF;
        function generatePDF() {
            // Initialize jsPDF
            const doc = new jsPDF();

            // Get the table element
            const table = document.getElementById('myTable');

            doc.autoTable({ html: table });

            doc.save('table.pdf');
        }
    </script>
</head>

<body>
    <!-- Your table goes here -->
    <table id="myTable">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 2</th>
                <th>Column 2</th>
                <th>Column 2</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 2</td>
                <td>Data 2</td>
                <td>Data 2</td>
                <td>Data 2</td>

                
                <!-- Add more data rows as needed -->
            </tr>
        </tbody>
    </table>

    <!-- Add a button to trigger PDF generation -->
    <button onclick="generatePDF()">Generate PDF</button>

</body>

</html>
