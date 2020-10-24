@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-offset-2 col-sm-8">
		<!-- Books -->
		@if (count($books) > 0)
		<div class="panel panel-default">
			<div class="panel-heading">
				書籍一覧
			</div>

			<div class="panel-body">
				<table class="table table-striped task-table">
					<thead>
						<th>書籍タイトル</th>
						<th>投稿者</th>
					</thead>
					<tbody>
						@foreach ($books as $book)
						<tr>
							<td class="table-text">
								<div>{{ $book->title }}</div>
							</td>

							<!-- Task Delete Button -->
							<td class="table-text">
								<div>{{ $book->name }}</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection