<!-- Stored in resources/views/game.blade -->

@extends('layouts.layout')
@section('title')
	Play Game
@stop

@section('content')
	<p>BattelShip Game!</p>

		<div style="display: inline">
		    <div style="width:50%; display: inline-block; float:left;">Player 1
		    		<pre>
						<p>{{ $message1 }}</p>

						<table>
							@foreach($layout1 as $rows => $cols)	

							    <tr>			    	
							        @foreach ($cols as $col)
				    					<td>{{ $col }}</td>
									@endforeach
							    </tr>
							
							@endforeach
						</table>
						{{ $messageWin1 }}
					</pre>

		    </div>
		    <div style="width: 49%; display: inline-block;">Player 2
		    	<pre>
					<p>{{ $message2 }}</p>

					<table>
						@foreach($layout2 as $rows => $cols)	

						    <tr>			    	
						        @foreach ($cols as $col)
			    					<td>{{ $col }}</td>
								@endforeach
						    </tr>
						
						@endforeach
					</table>
					{{ $messageWin2 }}
				</pre>

		    </div>
		</div>

	<p>	    
	    <form method="post" action="/player1">
	    	@csrf
	        Enter dimension to fire, e.g. B3 <input name="pos" type="text" size="2" maxlength="2" /> <button type="submit">Shot</button>
	    </form>
	</p>

	<p>
	    <form method="post" action="/reset">
	    	@csrf
	        <input type="submit" value="Reset Game">
	    </form>
	</p>
@stop

