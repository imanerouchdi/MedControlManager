<div id="calendar-container">
    <h2 id="calendar-title"></h2>
    <table id="calendar-table">
      <!-- Code pour afficher les jours de la semaine et les jours du mois -->
    </table>
    <div id="calendar-buttons">
      <button id="previous-month-btn">Mois précédent</button>
      <button id="current-month-btn">Mois courant</button>
      <button id="next-month-btn">Mois suivant</button>
    </div>
  </div>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Lundi</th>
        <th>Mardi</th>
        <th>Mercredi</th>
        <th>Jeudi</th>
        <th>Vendredi</th>
        <th>Samedi</th>
        <th>Dimanche</th>
      </tr>
    </thead>
    <tbody id="calendar-body"></tbody>
    <tr>
        {{--  @foreach ($currentDate as $time => $t) 
            <td>
                <button type="button" id="btn_hours" class="btn btn-primary mt-2 border rounded-1 bg-light fw-bold">{{$t}}</button>  
            </td>
        @endforeach   --}}
    </tr>
  </table>