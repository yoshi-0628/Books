@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-offset-2 col-sm-8">
		<!-- Books -->

		<div class="panel panel-default">
			<div class="panel-heading">
				書籍一覧
			</div>

			<div class="panel-body">
				<form action="/bookList" method="POST" class="form-horizontal">
					{{ csrf_field() }}

					<!-- Book Name -->
					<div class="form-group">
						<label for="task-name" class="col-sm-3 control-label">書籍名</label>

						<div class="col-sm-6">
							<input type="text" name="name" id="book-name" class="form-control" value="{{ old('book') }}">
						</div>
					</div>
					<!-- Add Book Button -->
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-default">
								<i class="fa fa-plus"></i>検索する
							</button>
						</div>
					</div>
				</form>
				@if (count($books) > 0)
				<table class="table table-striped task-table">
					<thead>
						<th>書籍タイトル</th>
						<th>投稿者</th>
						<th>投稿日</th>
					</thead>
					<tbody>
						@foreach ($books as $book)
						<tr>
							<td class="table-text">
								<div>{{ $book->title }}</div>
							</td>
							<td class="table-text">
								<div>{{ $book->name }}</div>
							</td>
							<td class="table-text">
								<div>{{ $book->created_at }}</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			{{ $books->links('vendor.pagination.bootstrap-4') }}
		</div>
		@endif
	</div>
</div>
@endsection