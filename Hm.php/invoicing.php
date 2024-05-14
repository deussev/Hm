<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoicing System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        #invoice-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #generate-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        #invoice-preview {
            display: none;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div id="invoice-form">
        <h1>Create Invoice</h1>
        <label for="client-name">Client Name:</label>
        <input type="text" id="client-name" required>

        <label for="invoice-date">Invoice Date:</label>
        <input type="date" id="invoice-date" required>

        <label for="invoice-number">Invoice Number:</label>
        <input type="text" id="invoice-number" required>

        <table>
            <tr>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Unit Price ($)</th>
                <th>Total ($)</th>
            </tr>
            <tr>
                <td><input type="text" class="item-description"></td>
                <td><input type="number" class="item-quantity" min="1" value="1"></td>
                <td><input type="number" class="item-price" min="0.01" step="0.01" value="0.00"></td>
                <td><span class="item-total">0.00</span></td>
            </tr>
        </table>

        <button onclick="addItem()">Add Item</button>
        <hr>
        <button id="generate-btn" onclick="generateInvoice()">Generate Invoice</button>
    </div>

    <div id="invoice-preview">
        <h1>Invoice Preview</h1>
        <div id="preview-content"></div>
        <button onclick="downloadInvoice()">Download Invoice</button>
    </div>

    <script>
        let items = [];

        function addItem() {
            const itemDescription = document.querySelector('.item-description').value;
            const itemQuantity = parseFloat(document.querySelector('.item-quantity').value);
            const itemPrice = parseFloat(document.querySelector('.item-price').value);

            if (itemDescription && itemQuantity && itemPrice) {
                const total = (itemQuantity * itemPrice).toFixed(2);
                items.push({ description: itemDescription, quantity: itemQuantity, price: itemPrice, total: total });

                // Clear input fields
                document.querySelector('.item-description').value = '';
                document.querySelector('.item-quantity').value = 1;
                document.querySelector('.item-price').value = '0.00';

                displayItems();
            }
        }

        function displayItems() {
            const previewContent = document.getElementById('preview-content');
            previewContent.innerHTML = '';

            const table = document.createElement('table');
            table.innerHTML = `
                <tr>
                    <th>Item Description</th>
                    <th>Quantity</th>
                    <th>Unit Price ($)</th>
                    <th>Total ($)</th>
                </tr>
            `;

            items.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.description}</td>
                    <td>${item.quantity}</td>
                    <td>${item.price}</td>
                    <td>${item.total}</td>
                `;
                table.appendChild(row);
            });

            previewContent.appendChild(table);
            document.getElementById('invoice-preview').style.display = 'block';
        }

        function generateInvoice() {
            const clientName = document.getElementById('client-name').value;
            const invoiceDate = document.getElementById('invoice-date').value;
            const invoiceNumber = document.getElementById('invoice-number').value;

            let invoiceContent = `
                <p><strong>Client Name:</strong> ${clientName}</p>
                <p><strong>Invoice Date:</strong> ${invoiceDate}</p>
                <p><strong>Invoice Number:</strong> ${invoiceNumber}</p>
                <h3>Items:</h3>
            `;

            items.forEach(item => {
                invoiceContent += `
                    <p>${item.description} - Quantity: ${item.quantity}, Unit Price: $${item.price}, Total: $${item.total}</p>
                `;
            });

            document.getElementById('preview-content').innerHTML = invoiceContent;
        }

        function downloadInvoice() {
            const invoiceContent = document.getElementById('preview-content').innerHTML;
            const invoiceBlob = new Blob([invoiceContent], { type: 'text/html' });
            const url = URL.createObjectURL(invoiceBlob);

            const a = document.createElement('a');
            a.href = url;
            a.download = 'invoice.html';
            a.click();

            URL.revokeObjectURL(url);
        }
    </script>
</body>
</html>
