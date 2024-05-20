@extends('backend.layout.main')
@section('judul', 'Aplikasi Kasir')
@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <input type="text" id="input-barcode" name="barcode" class="form-control value-input"
                    placeholder="Scan Barcode" />
            </div>
        </div>
        <div class="row">
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="table-kasir">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Product rows will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label for="">Subtotal</label>
                                    <input type="text" readonly name="subtotal" id="subtotal"
                                        class="form-control text-right">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Discount (%)</label>
                                    <input type="number" min="0" max="100" name="discount" id="discount"
                                        value='0' class="form-control text-right">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Total</label>
                                    <input type="text" readonly name="total" id="total"
                                        class="form-control text-right">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {
            $('#input-barcode').on('keypress', function(e) {
                if (e.which === 13) {
                    e.preventDefault();
                    $.ajax({
                        url: '/admin/kasir/search-product',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            barcode: $(this).val()
                        },
                        success: function(data) {
                            addProductToTable(data);
                            toastr.success('Barang Berhasil masuk ke keranjang belanja',
                                'Berhasil');
                            $('#input-barcode').val('');
                        },
                        error: function() {
                            toastr.error('Barang yang dicari tidak ditemukan', 'Error');
                            $('#input-barcode').val('');
                        }
                    });
                }
            });

            function addProductToTable(product) {
                let rowExist = $('#table-kasir tbody').find('#p-' + product.barcode);
                if (rowExist.length > 0) {
                    let qty = parseInt(rowExist.find('.qty').val()) + 1;
                    rowExist.find('.qty').val(qty);
                    rowExist.find('.qty-display').text(qty);
                    rowExist.find('.total-price').text((qty * product.Price).toFixed(2));
                } else {
                    let row = `
                <tr id='p-${product.barcode}'>
                    <td>${product.barcode}</td>
                    <td>${product.Product_Name}</td>
                    <td>${product.Price}</td>
                    <td><span class="qty-display">1</span></td>
                    <td class="total-price">${product.Price}</td>
                    <input type='hidden' name='price[]' class='price' value="${product.Price}" />
                    <input type='hidden' name='qty[]' class='qty' value="1" />
                    <input type='hidden' name='id_product[]' value="${product.id}" />
                </tr>`;
                    console.log(row);
                    $('#table-kasir tbody').append(row);
                }
                calculateTotal();
            }

            function calculateTotal() {
                let subtotal = 0;
                $('#table-kasir tbody tr').each(function() {
                    let price = parseFloat($(this).find('.price').val());
                    let qty = parseInt($(this).find('.qty').val());
                    subtotal += price * qty;
                });
                let discount = parseInt($('#discount').val());
                let total = subtotal - (subtotal * discount / 100);
                $('#subtotal').val(subtotal.toFixed(2));
                $('#total').val(total.toFixed(2));
            }

            $('#discount').on('change', function() {
                calculateTotal();
            });
        });
    </script>
@endpush
