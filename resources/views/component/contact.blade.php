@include('component.pageheader',[
    'pageTitle' => 'Liên hệ'
])

<!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                @if(session('contact_success'))
                    <div class="alert alert-success">
                        {{ session('contact_success') }}
                    </div>
                @endif
                @if(session('contact_error'))
                    <div class="alert alert-danger">
                        {{ session('contact_error') }}
                    </div>
                @endif
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Contact</h1>
                                <p class="mb-4">Liên hệ với chúng tôi để được hỗ trợ và tư vấn.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <iframe class="rounded w-100" 
                                style="height: 400px;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9543420446007!2d106.67525717408704!3d10.738002459903239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f62a90e5dbd%3A0x674d5126513db295!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgU8OgaSBHw7Ju!5e0!3m2!1svi!2s!4v1732449961810!5m2!1svi!2s" 
                                width="600" height="450" style="border:0;" 
                                allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="{{route('contact.send')}}" method="post" class="">
                                @csrf
                                    <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                    <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                    <textarea name="message" 
                                    class="w-100 form-control border-0 mb-4" 
                                    rows="5" cols="10" 
                                    placeholder="Your Message"></textarea>
                                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Địa chỉ</h4>
                                    <p class="mb-2"> 68 thôn Mỹ Yên, Đức Minh, Đăk Mil, Đăk Nông.</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p class="mb-2">trongphung020103@gmail.com</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Số điện thoại</h4>
                                    <p class="mb-2">0978314278</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->