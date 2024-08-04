@extends('admin.head')

@section('content')
    <h1 class="text-center my-4">Lập Hóa Đơn</h1>

    <div class="container">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <form action="{{ route('invoices.store') }}" method="POST" id="invoiceForm">
                    @csrf
                    <div class="form-group">
                        <label for="customer_id">Khách Hàng</label>
                        <select id="customer_id" class="form-control" name="customer_id" required>
                            <option value="">Chọn khách hàng</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->ten_khach_hang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="created_at">Ngày Lập</label>
                        <input type="date" id="created_at" class="form-control" name="created_at" value="{{ date('Y-m-d') }}" readonly>
                    </div>

                    <h4 class="mt-5 text-center text-uppercase">Thêm Sản Phẩm</h4>
                    <div id="product-section">
                        <div class="form-group mt-3">
                            <label for="product_id">Sản Phẩm</label>
                            <select id="product_id" class="form-control" name="product_id">
                                <option value="">Chọn sản phẩm</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->SanPhamId }}" data-price="{{ $product->GiaSanPham }}">{{ $product->TenSanPham }} - Giá: {{ number_format($product->GiaSanPham) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="quantity">Số Lượng</label>
                            <input type="number" id="quantity" class="form-control" name="quantity" min="1" value="1">
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary mb-3" id="addProduct">Thêm Sản Phẩm</button>

                    <h4 class="text-center mt-5 text-uppercase">Chi Tiết Sản Phẩm</h4>
                    <table class="table table-striped table-bordered" id="product-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody id="product-details"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><strong>Tổng Cộng:</strong></td>
                                <td><strong id="total-amount">0</strong></td>
                            </tr>
                        </tfoot>
                    </table>

                    <input type="hidden" name="total_amount" id="hidden-total-amount" value="0">

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Xuất Hóa Đơn</button>
                        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addProductButton = document.getElementById('addProduct');
            const productTable = document.getElementById('product-details');
            const totalAmountElement = document.getElementById('total-amount');
            const invoiceForm = document.getElementById('invoiceForm');
            let totalAmount = 0;

            addProductButton.addEventListener('click', function() {
                const productSelect = document.getElementById('product_id');
                const quantityInput = document.getElementById('quantity');

                const productId = productSelect.value;
                const quantity = parseInt(quantityInput.value);
                const productName = productSelect.options[productSelect.selectedIndex].text.split(' - Giá: ')[0];
                const productPrice = parseInt(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));

                if (!productId || quantity <= 0) {
                    alert('Vui lòng chọn sản phẩm và nhập số lượng hợp lệ.');
                    return;
                }

                const total = quantity * productPrice;
                totalAmount += total;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${productName}<input type="hidden" name="product_id[]" value="${productId}"></td>
                    <td>${quantity}<input type="hidden" name="quantity[]" value="${quantity}"></td>
                    <td>${productPrice.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</td>
                    <td>${total.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'})}</td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-product">Xóa</button></td>
                `;

                productTable.appendChild(row);
                totalAmountElement.textContent = totalAmount.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
                document.getElementById('hidden-total-amount').value = totalAmount;

                // Reset fields for next entry
                productSelect.selectedIndex = 0;
                quantityInput.value = 1;
            });

            productTable.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('remove-product')) {
                    const row = e.target.closest('tr');
                    const productTotal = parseInt(row.cells[3].innerText.replace(/\D/g, ''));
                    totalAmount -= productTotal;
                    row.remove();
                    totalAmountElement.textContent = totalAmount.toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
                    document.getElementById('hidden-total-amount').value = totalAmount;
                }
            });

            // Kiểm tra trước khi submit form
            invoiceForm.addEventListener('submit', function(e) {
                if (productTable.rows.length === 0) {
                    e.preventDefault();
                    alert('Hóa đơn phải có ít nhất một sản phẩm.');
                }
            });
        });
    </script>
@endsection
