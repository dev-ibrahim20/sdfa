<form method="POST" action="https://test.adeco.com.sa/cities/order/add">
    @csrf
    <!-- Add your form fields here -->
    <input type="text" name="refNo" placeholder="Reference Number">
    <!-- Other fields -->
    <button type="submit">Create Shipment</button>
</form>
