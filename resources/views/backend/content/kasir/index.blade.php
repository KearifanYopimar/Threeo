@extends('backend/layout/main')
@section('judul', 'Aplikasi Kasir')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="float-left">
                        <h4>List Data Kasir</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="search" id="input-barcode" name="barcode" class="form-control value-input"
                                   placeholder="Scan Barcode"/>
                        </div>
                    </div>
                    <form method="post" action="{{route('kasir.insert')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8 mt-3">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover" id="table-cart">
                                            <thead>
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Nama Produk</th>
                                                <th>@</th>
                                                <th>Qty</th>
                                                <th>SubTotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-3">
                                <div class="card shadow">
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
                                                    <label for="">Discount</label>
                                                    <input type="number" min="0" max="100" name="discount"
                                                           id="discount" class="form-control text-right">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function () {
            $('#input-barcode').on('keypress', function (e) {
                if (e.which === 13) {
                    console.log('Enter di klik');
                    //pencarian data via ajax
                    $.ajax({
                        url: '/admin/kasir/search-product',
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            barcode: $(this).val()
                        },
                        success: function (data) {
                            addProductToTable(data);
                            Toast.fire({
                                icon: "success",
                                title: "Berhasil mendapatkan data Product."
                            });
                            $('#input-barcode').val('');
                        },
                        error: function () {
                            Toast.fire({
                                icon: "error",
                                title: "Sorry, Data tidak ditemukan"
                            });
                            $('#input-barcode').val('');
                        }
                    });
                }
            });
        });


        function addProductToTable(product) {
            let rowExist = $('#table-cart tbody').find('#p-' + product.barcode);
            if (rowExist.length > 0) {
                let qty = parseInt(rowExist.find('.qty').eq(0).val());
                qty += 1;
                rowExist.find('.qty').eq(0).val(qty);
                rowExist.find('td').eq(3).text(qty);
                rowExist.find('td').eq(4).text((qty * product.price));
            } else {
                let row = '';
                row += `<tr id='p-${product.barcode}'>`;
                row += `<td>${product.barcode}</td>`;
                row += `<td>${product.Product_Name}</td>`;
                row += `<td>${product.Price}</td>`;
                row += `<input type='hidden' name='price[]' class='price' value="${product.Price}" />`;
                row += `<input type='hidden' name='qty[]' class='qty' value="1" />`;
                row += `<input type='hidden' name='id_product[]' value="${product.id_produk}" />`;
                row += `<td>1</td>`;
                row += `<td>${product.Price}</td>`;
                row += `</tr>`;
                $('#table-cart tbody').append(row);
            }
            hitungTotalBelanja();
        }

        function hitungTotalBelanja() {
            let subtotal = 0;
            $('.price').each(function (index, obj) {
                let price = parseFloat($(this).val());
                let qty = parseFloat($('.qty').eq(index).val());
                subtotal += price * qty;
            });
            let discount = parseInt($('#discount').val());
            let total = subtotal - (subtotal * discount / 100);
            $('#subtotal').val(subtotal.toFixed(2));
            $('#total').val(total.toFixed(2));
        }

        $(document).ready(function () {
            hitungTotalBelanja();
            $('#discount').on('input', function () {
                hitungTotalBelanja();
            });

            $('.price, .qty').on('input', function () {
                hitungTotalBelanja();
            });
        });
    </script>
@endpush
