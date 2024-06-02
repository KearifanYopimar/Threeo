@extends('frontend.layout.main')
@section('content')
    <!-- Hero Section Start -->
    <section id="home" class="pt-16 dark:bg-dark">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <form action="{{ route('home.simpan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Customer</label>
                                    <input type="text" name="nama_customers" class="form-control" placeholder="Masukan nama customers">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Kategories Product</label>
                                    <select name="kategories_id" class="form-control" id="">
                                        <option value="">Pilih Kategories</option>
                                        @foreach ($kategori as $kategories)
                                            <option value="{{ $kategories->id_kategori }}">{{ $kategories->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Product</label>
                                    <select name="product_id" class="form-control" id="">
                                        <option value="">Pilih Product</option>
                                        @foreach ($prodcut as $produk)
                                            <option value="{{$produk->id_produk}}">{{$produk->Product_Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2">
                    <div class="relative mt-10 lg:right-0 lg:mt-9">
                        <img src="{{ asset('assets/img/herro.png') }}" alt="Logo-Tora"
                            class="relative z-10 mx-auto max-w-full" />
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 md:scale-125">
                            <svg class="bg-profile-1" width="500" height="500" viewBox="0 0 200 200"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#0037ff"
                                    d="M22,-35.4C35.3,-30.4,57.6,-38.3,61,-34.5C64.5,-30.7,49.3,-15.4,49.5,0.1C49.7,15.6,65.5,31.3,63.5,37.7C61.6,44.1,41.9,41.3,28.3,45.8C14.8,50.4,7.4,62.4,0.1,62.3C-7.3,62.2,-14.6,50,-21.1,41.4C-27.6,32.8,-33.3,27.6,-42.9,21.3C-52.5,15,-66.1,7.5,-62.8,1.9C-59.6,-3.7,-39.5,-7.5,-30.2,-14.3C-20.9,-21.2,-22.3,-31.2,-19.1,-42C-15.9,-52.9,-7.9,-64.5,-1.8,-61.4C4.4,-58.3,8.7,-40.4,22,-35.4Z"
                                    transform="translate(100 100) scale(1.1)" />
                            </svg>
                        </span>
                        <span class="absolute bottom-0 left-1/2 -translate-x-1/2 md:scale-125">
                            <svg class="bg-profile-2" width="550" height="550" viewBox="0 0 200 200"
                                xmlns="http://www.w3.org/2000/sv">
                                <path fill="#14b8a6"
                                    d="M12.1,-19.5C19.6,-16.6,32.4,-21.3,38,-19.3C43.7,-17.4,42.4,-8.7,38,-2.5C33.6,3.6,26.2,7.2,26.3,19.3C26.4,31.3,34.1,51.8,30.9,58.6C27.8,65.4,13.9,58.7,5.3,49.5C-3.4,40.4,-6.8,29,-16.8,26.1C-26.8,23.3,-43.5,29,-46.6,26.1C-49.7,23.1,-39.2,11.6,-33.6,3.3C-27.9,-5,-27.1,-10.1,-28.8,-21.4C-30.5,-32.7,-34.8,-50.2,-30.5,-54.9C-26.1,-59.5,-13,-51.3,-5.4,-42C2.3,-32.7,4.6,-22.3,12.1,-19.5Z"
                                    transform="translate(100 100) scale(1.1)" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog preview section-->
    <section class="py-5" style="background-color: #f6ebda;">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small">
                                        <div class="fw-bold">Admin</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
