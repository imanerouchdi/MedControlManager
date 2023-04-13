@extends('layouts.app')
@section('content')
{{--  <form>  
    <div class="mb-3">
      <h3>Informatien patient</h3>
      <div class="row">
        <div class="col">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom">
        </div>
        <div class="col">
          <label for="telephone" class="form-label">Téléphone</label>
          <input type="tel" class="form-control" id="telephone">
        </div>
      </div>
    </div>
    
    <div class="mb-3">
      <h3>Information rendez-vous</h3>
      <div class="row">
        <div class="col">
          <label for="date" class="form-label">Date rendez-vous</label>
          <input type="date" class="form-control" id="date">
        </div>
        <div class="col">
          <label for="heure" class="form-label">Heure</label>
          <input type="time" class="form-control" id="heure">
        </div>
      </div>
    </div>
    
    <div class="mb-3">
      <label for="note" class="form-label">Note</label>
      <textarea class="form-control" id="note" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
      <label for="urgent" class="form-label">Urgent</label>
      <input type="checkbox" class="form-check-input" id="urgent">
    </div>
    
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>--}}
  <main class="py-4">
    <div class="container">
      <form>
        <div class="row mb-3 d-flex justify-content justify-content-end">
            <div class="col-4">
              <input class="form-control me-2" type="search" placeholder="CIN" aria-label="Search">
            </div>
            <div class="col-2">
              <button class="btn btn-outline-success col-12" type="submit">Rechercher</button>
            </div>
            
                
        </div>
        <div class="row mb-3">
          
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom Patient</label>
            <input type="text" class="form-control" id="nom">
          </div>
          <div class="col-md-6">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone">
          </div>
        </div>
  
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="date" class="form-label">Date rendez-vous</label>
            <input type="date" class="form-control" id="date">
          </div>
          <div class="col-md-6">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" class="form-control" id="heure">
          </div>
        </div>
  
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
        
  
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>
    </div>
  </main>
  {{--  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <form class="d-flex mb-3">
      <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Rechercher</button>
    </form>
    
  </div>  --}}
  
  @endsection