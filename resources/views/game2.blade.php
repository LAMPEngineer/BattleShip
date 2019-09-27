<!-- Stored in resources/views/game.blade -->

@extends('layouts.layout')
@section('title')
	Play Game
@stop

@section('content')
	<p>BattelShip Game!</p>

	<!-- 	<div style="display: inline">
		    <div style="width:70%; display: inline-block; float:left;"> -->
		    		<!-- <pre>
						<p>{{ $message }}</p>

						<table>
							@foreach($layout as $rows => $cols)	

							    <tr>			    	
							        @foreach ($cols as $col)
				    					<td>{{ $col }}</td>
									@endforeach
							    </tr>
							
							@endforeach
						</table>
						{{ $messageWin }}
					</pre> -->

		    <!-- </div>
		    <div style="width: 29%; display: inline-block;"> -->Player 2
		    	<pre>
					<p>{{ $message }}</p>

					<table>
						@foreach($layout as $rows => $cols)	

						    <tr>			    	
						        @foreach ($cols as $col)
			    					<td>{{ $col }}</td>
								@endforeach
						    </tr>
						
						@endforeach
					</table>
					{{ $messageWin }}
				</pre>

<!-- 		    </div>
		</div> -->

	<p>	    
	    <form method="post" action="/player2">
	    	@csrf
	        Enter dimension to fire, e.g. B3 <input name="pos" type="text" size="2" maxlength="2" /> <button type="submit">Shot</button>
	    </form>
	</p>

	<p>
	    <form method="post" action="/player1">
	    	@csrf
	        <input type="submit" value="Player 1 Turn">
	    </form>
	</p>

	<p>
	    <form method="post" action="/reset">
	    	@csrf
	        <input type="submit" value="Reset Game">
	    </form>
	</p>
@stop

