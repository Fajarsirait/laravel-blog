@extends('back.layout.template')

@section('title', 'Dashboard -Admin')

@section('content')
    <!-- content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card text-bg-secondary mb-3" style="max-width: 100%">
                    <div class="card-header">Total Article</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_article }} Articles</h5>
                        <p class="card-text">
                            <a href="{{ url('article') }}" class="text-white">Views</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-success mb-3" style="max-width: 100%">
                    <div class="card-header">Total Categories</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_categories }} Categories</h5>
                        <p class="card-text">
                            <a href="{{ url('categories') }}" class="text-white">Views</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h4>Latest Articles</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($latest_articles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Categories->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-6">
                <h4>Popular Articles</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>View</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($popular_articles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->Categories->name }}</td>
                                <td>{{ $item->views }}x</td>
                                <td class="text-center">
                                    <a href="{{ url('article/' . $item->id) }}" class="btn btn-secondary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- end content -->
@endsection
