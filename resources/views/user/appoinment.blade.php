<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{ url('create-appointment') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" name="name" placeholder="Full name" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" class="form-control" name="email" placeholder="Email address..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="appointmentDate" class="form-control" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select" required>
                        <option value="">-- Select --</option>
                        @foreach ($doctor as $doctors)
                        <option value="{{ $doctors->id }}">Dr. {{ $doctors->name }} --Specialist-- {{ $doctors->specialist}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number.." required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" name="description" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div> <!-- .page-section -->
