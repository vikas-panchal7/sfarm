@include('user.includes.header')
@include('user.includes.nav')

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Bills</span></p>
          <h1 class="mb-0 bread">Farmer Bills</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section" style="padding: 3em">
    <div class="container" style="width: 100%">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title bg-transparent text-center">Farmer Bills</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="mt-2 table">
                                <thead>
                                    <tr>
                                        <th>Sr NO</th>
                                        <th>Bill No </th>
                                        <th>Agent Name</th>
                                        <th>Date</th>
                                        <th>View Sale Product</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $srNo = 1;
                                    @endphp
                                    @foreach ($agentBills as $p)
                                        <tr>
                                            <td>{{ $srNo++ }}</td>
                                            <td>{{ $p->id }}</td>
                                            <td>{{ $p->agent->first_name }}  {{ $p->agent->last_name }}</td>
                                            <td>{{ Date($p->created_at) }}</td>
                                            <td><a class="btn-sm btn btn-info" href="/billdetails?id={{$p->id}}">View</a></td>


                                            {{-- <td><img src="{{ asset('uploads/' . $p->subproduct->image) }}"
                                                    alt="Subproduct Image" style="width: 50px;"></td>
                                            
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModal{{ $p->subproduct->id }}">Delete</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
  </section>


@include('user.includes.footer')