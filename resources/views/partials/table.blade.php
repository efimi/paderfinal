          <table>
               <tr>
                   <th>Datum</th>
                   <th>Location</th>
                   <th>Teilnehmer</th>
                   {{-- <th>Bewertung</th> --}}
               </tr>
          
              
                 @foreach (auth()->user()->matches as $match)
                  <tr>
                    @if (empty($match))
                      <p>Du hast noch keine Matches</p>
                    @else
                     <td>{{$match->created_at->format('d.m.Y')}}</td>
                     <td><a href="{{$match->location->website}}">{{$match->location->name}}</a></td>
                     <td> 
                          @foreach ($match->users() as $user)
                          <img src="{{$user->avatarPath()}}" alt="" class="table__avatar">
                          @endforeach
                     </td>
                     {{-- <td> <star-rating></star-rating></td> --}}
                     @endif
                 </tr>
                @endforeach
               
           </table>